<?php

/**
 * Description of my_controller
 *
 * @author: giangvt.sami@gmail.com
 * @version: 1.0.0
 * 
 * @param: bao gồm các function xử lý các tính toán logic
 * @param: thường dùng để quản lý, tương tác với database
 */
abstract class Base_controller extends Base_manager {

    /**
     * Mảng config setting được dùng trong các hàm quản lý
     * Biến này được mô tả chi tiết trong các lớp kế thừa
     * Cấu trúc mảng:
     * Array (
     *      "class"         => "", String: Tên class
     *      "view"          => "", String: Tên view
     *      "model"         => "", String: Tên model
     *      "title"         => "", String: Tiêu đề hiển thị
     *      'field_table'   => array()    : các cột có trong bảng hiển thị
     *      'field_form'    => array()    : các trường có trong form insert + view + eidt
     *      'field_rule'    => array()    : 
     * )
     * @var Array
     */
    var $setting = Array(
        'class' => '',
        'view' => '',
        'model' => '',
        'title' => '',
        'field_table' => array(),
        'field_form' => array(),
        'field_rule' => array(),
    );
    var $_unique = array();
    var $_foreign = true;

    /**
     * Biến var $_display_table để custom hiển thị mặc định table
     */
    var $_display_table = array(
        'limit' => 10,
        'total_page' => 0,
        'curent_page' => 0,
        'start' => 0,
        'search_string' => '',
        'begin_time' => '',
        'end_time' => ''
    );

    /**
     * Biến var $_field_search search datatable theo 1 string
     */
    var $_field_search = array();

    abstract function setting_class();

    public function __construct() {
        parent::__construct();
        $this->load->model($this->setting['model'], 'table');
        $this->_unique = $this->table->get_unique();
        $this->_foreign = $this->table->get_foreign();
        $this->_field_search = $this->table->get_field_search();

        $this->_display_table['begin_time'] = date('d/m/Y') . ' 00:00:00';
        $this->_display_table['end_time'] = date('d/m/Y') . ' 23:59:59';
        $display_table = $this->_display_table;
        $this->session->set_userdata('display_table', $display_table);
    }

    public function index() {
        $head = $this->get_head();
        $header = $this->get_header();
        $left_page = $this->get_left_page($this->_get_left_page_data());
        $right_page = $this->get_right_page($this->setting);
        $breadcrumbs = $this->get_breadcrumbs();
        $footer = $this->get_footer();
        $this->master_page($head, $header, $left_page, $breadcrumbs, $right_page, $footer);
    }

    public function manager() {
        $this->master_page();
    }

    public function _get_header_data() {
        
    }

    public function _get_right_page_data($data = array()) {
        if (!$data) {
            $data = $this->session->userdata('display_table');
        }
        if ($this->_field_search && $data['search_string']) {
            $like = array($data['search_string'] => $this->_field_search);
        } else {
            $like = '';
        }
        $limit = $data['limit'];
        $start = $data['start'];
        $data_return['data'] = $this->table->get_list('', $limit, $start, '', $like);
        return $data_return['data'];
    }

    public function _add_colum_action($data = array()) {
        $data['check_box'] = true;
        $data['action'] = true;
        return $data;
    }

    public function ajax_list_data() {
        
    }

    public function insert() {
        $this->_action = site_url('admin/' . $this->_class . '/insert_save/');
        echo $this->_action;
    }

    public function insert_save() {
        
    }

    public function delete() {
        
    }

    public function really_delete() {
        
    }

    public function view() {
        
    }

    public function edit() {
        
    }

    public function edit_save() {
        
    }

    public function search() {
        
    }

    public function _check_unique($data = array()) {
        $unique = $this->_unique;
        $data_check = array();
        $data_return = array();
        //Nếu ko có trường dữ liệu nào cần check trùng thì return true
        if (!count($unique)) {
            $data_return['status'] = 1;
            $data_return['msg'] = '';
            return $data_return;
        }
        foreach ($unique as $key => $value) {
            if (isset($data[$value])) {
                $data_check[$value] = $data[$value];
            }
        }
        $result = $this->table->check_unique($data_check);
        if (!count($result)) {
            $data_return['status'] = 1;
            $data_return['msg'] = '';
            return $data_return;
        }
        $data_return['status'] = 0;
        $data_return['msg'] = 'Dữ liệu đã tồn tại trong hệ thống.';
        return $data_return;
    }

}
