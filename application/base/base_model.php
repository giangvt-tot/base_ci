<?php

/**
 * Description of my_database
 *
 * @author: giangvt.sami@gmail.com
 * @version: 1.0.0
 */
abstract class Base_model extends CI_Model {

    /**
     * dữ liệu được khai báo từ trong model
     * @var $_table: Tên bảng
     * @var $_field: Các trường của bảng
     * @var $_key: khóa chính của bảng
     * @var $_unique: các field có thuộc tính duy nhất (ko có 2 giá trị nào trùng nhau)
     * @var $_foreign[boolean]: tăng tính bảo mật khi insert, update data. TRUE nếu đồng ý khai báo sai data, FALSE nếu không đồng ý
     * @var $_field_search[array]: Khai báo các trường dữ liệu được tìm kiếm bằng string
     */
    var $_table = '';
    var $_field = array();
    var $_key = '';
    var $_unique = array();
    var $_foreign = true;
    var $_field_search = array();

    public function __construct() {
        parent::__construct();
        $this->setting_table();
    }

    abstract function setting_table();

    /*
     * function: Cài đặt table cho các hàm get_one, get_list, get_one_***, get_list_***
     */

    private function setting_select() {
        $this->db->select("m.*");
        $this->db->from($this->_table . " AS m");
    }

    /*
     * function: lấy dữ liệu từ bảng
     * @param $where-[int, array]: điều kiện để select.
     * return [object]: trả về 1 object
     */

    public function get_one($where) {
        $this->setting_select();
        if (is_int($where)) {
            $this->db->where($this->_key, $where);
        } else if (is_array($where)) {
            $this->db->where($where);
        } else {
            return FALSE;
        }
        $result = $this->db->get();
        return $result->first_row();
    }

    /*
     * function: lấy dữ liệu từ bảng
     * @param $where-[int, array]: điều kiện để select.
     * @param $limit-[int]: số bản ghi được trả về.
     * @param $start-[int]: bản ghi bắt đầu limit.
     * @param $order-[string('DESC', 'ASC')]: kiểu sắp xếp.
     * return [array]: trả về 1 array
     */

    public function get_list($where = NULL, $limit = 0, $start = 0, $order = NULL, $like = array()) {
        $this->setting_select();
        if (is_array($where)) {
            foreach ($where as $key => $value) {
                if (is_array($value)) {
                    $this->db->where_in($key, $value);
                } else {
                    $this->db->where($key, $value);
                }
            }
        } else if (intval($where) > 0) {
            $this->db->where("m." . $this->_key_name, $where);
        }
        if (is_array($like)) {
            foreach ($like as $key_like => $value_like) {
                if (is_array($value_like)) {
                    foreach ($value_like as $field) {
                        $this->db->or_like($field, $key_like);
                    }
                } else {
                    $this->db->like($value_like, $key_like);
                }
            }
        }
        if ($limit && $limit > 0) {
            $this->db->limit($limit, $start);
        }
        if ($order) {
            $this->db->order_by($order);
        }
        $query = $this->db->get();
        return $query->result();
    }

    /*
     * function: đếm số record thỏa mãn $where, $like
     * @param $where-[int, array]: điều kiện để select.
     * return [array]: trả về 1 int
     */

    public function get_count($where = NULL, $like = array()) {
        if (is_array($where)) {
            foreach ($where as $key => $value) {
                if (is_array($value)) {
                    $this->db->where_in($key, $value);
                } else {
                    $this->db->where($key, $value);
                }
            }
        } else if (intval($where) > 0) {
            $this->db->where("m." . $this->_key_name, $where);
        }
        if (is_array($like)) {
            foreach ($like as $key_like => $value_like) {
                if (is_array($value_like)) {
                    foreach ($value_like as $field) {
                        $this->db->or_like($field, $key_like);
                    }
                } else {
                    $this->db->like($value_like, $key_like);
                }
            }
        }
        $this->db->from($this->_table);
        return $this->db->count_all_results();
    }

    /**
     * function: Kiểm tra dữ liệu đã tồn tại chưa trước khi insert vào database
     * 
     * @ param $data-[array]: dữ liệu kiểm tra
     * return: Trả về mảng dữ liệu phù hợp với data truyền vào
     */
    public function check_unique($data) {
        $this->setting_select();
        foreach ($data as $key => $value) {
            $this->db->or_where($key, $value);
        }
        return $this->db->get()->result();
    }

    /*
     * function: Insert 1 bản ghi vào bảng
     * @param $data-[array]: dữ liệu insert
     * return: Trả về Id bản ghi vừa được insert
     */

    public function insert($data) {
        $data_insert = $this->filter_insert_one($data);
        $this->db->insert($this->_table, $data_insert);
        return $this->db->insert_id();
    }

    /*
     * function: Insert nhiều bản ghi vào bảng
     * @param $data-[array]: dữ liệu insert
     * return [Int]: Trả về số bản ghi được insert
     */

    public function insert_multi($data) {
        $data_insert = $this->filter_insert_multi($data);
        $this->db->insert_batch($data_insert);
        return $this->db->affected_rows();
    }

    /*
     * function: update dữ liệu trên 1 hoặc bản ghi
     * @param $where-[int, array]: điều kiện để update
     * @param $data-[array]; dữ liệu được update
     * @return [Int]: Số bản ghi được update
     */

    public function update($where, $data) {
        if (is_int($where)) {
            $this->db->where($this->_key, $where);
        } else if (is_array($where)) {
            $this->db->where($where);
        } else {
            return FALSE;
        }
        if ($this->db->field_exists('edit', $this->_table)) {
            $this->db->where('edit', 1);
        }
        $this->db->update($this->_table, $data);
        return $this->db->affected_rows();
    }

    /*
     * function: update dữ liệu trên nhiều bản ghi
     * @param $where-[array]: điều kiện để update (1 mảng các id của bảng cần update)
     * @param $data-[array]; dữ liệu được update
     * @return [Int]: Số bản ghi được update
     */

    public function update_list($where, $data) {
        if ($this->db->field_exists('edit', $this->_table)) {
            $this->db->where('edit', 1);
        }
        if (!$this->db->field_exists('status', $this->_table)) {
            return FALSE;
        }
        if (is_array($where)) {
            $this->db->where_in($this->_key, $where);
        }
        $this->db->update($this->_table, $data);
        return $this->db->affected_rows();
    }

    /*
     * function: Xóa dữ liệu của 1 hoặc nhiều row (chỉ là đổi status = 0)
     * @param $where-[int, array]: điều kiện để xóa
     * @return [Int]: Số bản ghi được xóa
     */

    public function del_by_custom($where) {
        if ($this->db->field_exists('edit', $this->_table)) {
            $this->db->where('edit', 1);
        }
        if (!$this->db->field_exists('status', $this->_table)) {
            return FALSE;
        }
        if (is_int($where)) {
            $this->db->where($this->_key, $where);
        } else if (is_array($where)) {
            $this->db->where($where);
        } else {
            return FALSE;
        }
        $this->db->update($this->_table, array('status' => 1));
        return $this->db->affected_rows();
    }

    /*
     * function: Xóa dữ liệu của nhiều row (đổi status = 0)
     * @param $where-[int, array]: điều kiện để xóa
     * @return [Int]: Số bản ghi được xóa
     */

    public function del_by_id($where) {
        if ($this->db->field_exists('edit', $this->_table)) {
            $this->db->where('edit', 1);
        }
        if (!$this->db->field_exists('status', $this->_table)) {
            return FALSE;
        }
        if (is_int($where)) {
            $this->db->where($this->_key, $where);
        } else if (is_array($where)) {
            $this->db->where_in($this->_key, $where);
        } else {
            return FALSE;
        }
        $this->db->update($this->_table, array('status' => 1));
        return $this->db->affected_rows();
    }

    /*
     * !!!!!!!!!!!!!!!!!!!!!!!!!!!!!
     * function: Xóa thực sự 1 hoặc nhiều bản ghi.
     * @param $where-[int, array]: điều kiện để xóa
     * @return [Int]: Số bản ghi được xóa
     */

    public function really_del_by_custom($where) {
        if ($this->db->field_exists('edit', $this->_table)) {
            $this->db->where('edit', 1);
        }
        if (is_int($where)) {
            $this->db->where($this->_key, $where);
        } else if (is_array($where)) {
            $this->db->where($where);
        } else {
            return FALSE;
        }
        $this->db->delete($this->_table);
        return $this->db->affected_rows();
    }

    /*
     * !!!!!!!!!!!!!!!!!!!!!!!!!!!!!
     * function: Xóa thực sự 1 hoặc nhiều bản ghi.
     * @param $where-[int, array]: điều kiện để xóa
     * @return [Int]: Số bản ghi được xóa
     */

    public function really_del_by_id($where) {
        if ($this->db->field_exists('edit', $this->_table)) {
            $this->db->where('edit', 1);
        }
        if (is_int($where)) {
            $this->db->where($this->_key, $where);
        } else if (is_array($where)) {
            $this->db->where_in($this->_key, $where);
        } else {
            return FALSE;
        }
        $this->db->delete($this->_table);
        return $this->db->affected_rows();
    }

    /**
     * Hàm lấy thông tin để tạo form
     * @return String tên của table
     */
    function get_table() {
        return $this->_table;
    }

    /**
     * Hàm lấy thông tin để tạo form
     * @return Boolean 
     */
    public function get_unique() {
        return $this->_unique;
    }

    /**
     * Hàm lấy thông tin schema của bảng
     * @return Array Mảng schema của bảng
     */
    public function get_foreign() {
        return $this->_foreign;
    }

    /**
     * Hàm lấy thông tin schema của bảng
     * @return Array Mảng schema của bảng
     */
    function get_field() {
        return $this->_field;
    }

    /**
     * Hàm lấy thông tin để tạo form
     * @return Array Mảng các mảng chứa thông tin để tạo form
     */
    function get_key() {
        return $this->_key;
    }

    function get_field_search() {
        return $this->_field_search;
    }

}
