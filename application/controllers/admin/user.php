<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Base_manager {

    public function __construct() {
        parent::__construct();
    }

    function setting_class() {
        $this->setting = array(
            'class' => 'index',
            'model' => 'm_user',
            'view' => 'user',
            'title' => 'Quản lý thành viên',
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

    public function demo() {
        parent::index();
    }

}
