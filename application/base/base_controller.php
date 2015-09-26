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

    var $_unique = array();
    var $_foreign = true;

    /**
     * Biến var $_display_table để custom hiển thị mặc định table
     */
    var $_display_table = array(
        'limit' => 10,
        'total_page' => 0,
        'start' => 0,
        'search_string' => '',
        'begin_time' => '',
        'end_time' => ''
    );

    /**
     * Biến var $_field_search search datatable theo 1 string
     */
    var $_field_search = array();

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
        $data_nav = $this->_get_nav_data();
        $head = $this->get_head();
        $header = $this->get_header();
        $nav = $this->get_nav($data_nav);
        $content = $this->get_content($this->setting);
        $breadcrumbs = $this->get_breadcrumbs($data_nav);
        $footer = $this->get_footer();
        $modal_form = $this->get_modal();
        $this->master_page($head, $header, $nav, $breadcrumbs, $content, $footer, $modal_form);
    }

    public function manager() {
        $this->master_page();
    }

    public function _get_header_data() {
        
    }

    public function _get_content_data($data = array()) {
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

    public function ajax_list_data($data = array()) {
        if (!$data) {
            $data = $this->input->post();
            $where = array();
            $limit = $data['length'];
            $start = $data['start'];
            $order = NULL;
            $like = $data['search']['value'];
        } else {
            $data = $this->session->userdata('display_table');
            $where = array();
            $limit = $data['limit'];
            $start = $data['start'];
            $order = NULL;
            $like = $data['search_string'];
        }
        $query = $this->table->get_list($where, $limit, $start, $order, $like);
        $temp = array();
        $count_total = $this->table->get_count($where, $like);
        $data_return = array(
//            'draw' => $data['draw'],
            'recordsTotal' => $count_total,
            'recordsFiltered' => $count_total,
        );

        $i = 0;
        //Lọc dữ liệu theo field_table để trả dữ liệu về sever
        foreach ($query as $value) {
            foreach ($this->setting['field_table'] as $key => $val) {
                $temp[$i][$key] = $value->$key;
            }
            $i++;
        }
//        echo '<pre>';
//        var_dump($temp);
//        exit;
        //Thêm ô checkbox + action vào mỗi bản ghi
        foreach ($temp as $key => $value) {
            $data_return['data'][$key][] = '<label class="pos-rel"><input type="checkbox" class="ace" data-id="' . $value['id'] . '" /><span class="lbl"></span></label>';
            foreach ($value as $key2 => $val2) {
                $data_return['data'][$key][] = $val2;
            }
            $data_return['data'][$key][] = $this->load->view($this->_view . '_action_table', array('data' => $value['id']), TRUE);
        }

        echo json_encode($data_return);
//        echo '<pre>';
//        var_dump($data_return);
//        exit;
    }

    public function ajax_form($data = array()) {
        if (!$data) {
            $data = $this->input->post();
        }

        //Kiểm tra dữ liệu gửi lên có đúng là 1 trong 3 action: insert, view, edit
        if ($data['action'] == 'insert') {
            $data_return = $this->insert($data);
        } elseif ($data['action'] == 'view') {
            
        } elseif ($data['action'] == 'edit') {
            
        } else {
            $data_return['status'] = 0;
            $data_return['msg'] = 'Dữ liệu gửi lên không hợp lệ';
        }

        if (!isset($data_return['callback'])) {
            $data_return['callback'] = 'custom_function';
        }

        echo json_encode($data_return);
        return TRUE;
    }

    public function insert($data = array()) {
        $this->_action = site_url('admin/' . $this->_class . '/insert_save/');
        $data_return['status'] = 1;
        $data_return['msg'] = 'hsuhgeks';
        $data_return['url'] = $this->_action;
        return $data_return;
    }

    public function insert_save() {
        
    }

    public function delete($data = array()) {
        
    }

    public function really_delete() {
        
    }

    public function view($data = array()) {
        
    }

    public function edit($data = array()) {
        
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

    public function get_modal($data = array()) {
        $data_return = $this->load->view($this->_view . 'modal.php', $data, TRUE);
        return $data_return;
    }

}
