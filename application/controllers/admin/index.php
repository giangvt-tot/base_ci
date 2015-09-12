<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends My_controller {

    public function __construct() {
        parent::__construct();
    }

    function setting_class() {
        $this->setting = array(
            'class' => 'index',
            'model' => 'm_user',
            'view' => 'user',
            'title' => 'Dashboard',
            'field_table' => array(
                'id' => 'ID',
                'name' => 'Tên đăng nhập',
                'email' => 'Email',
                'phone' => 'Số điện thoại',
                'age' => 'Tuổi'
            ),
            'field_form' => array(),
            'field_rule' => array()
        );
    }

    public function get_form() {
//        $data = $this->input->post();
//        $result = $this->_check_unique($data);
//        var_dump($result);
        $this->insert();
    }

//    public function index() {
//        $data['data_header'] = json_encode($this->load->view('backend/default/demo_ajax', '', TRUE));
//        $head = $this->get_head();
//        $header = $this->get_header();
//        $left_page = $this->get_left_page();
//        $right_page = $this->get_right_page($data);
//        $breadcrumbs = $this->get_breadcrumbs();
//        $footer = $this->get_footer();
//        $this->master_page($head, $header, $left_page, $breadcrumbs, $right_page, $footer);
//    }

}
