<?php

/**
 * Description of my_manager
 *
 * 
 * @author: giangvt.sami@gmail.com
 * @version: 1.0.0
 * 
 * @param: bao gồm các function có nhiệm vụ xuất dữ liệu ra view
 * @param: các function có tiền tố "_function" để kiểm tra điều kiện, ko tương tác trực tiếp với view
 */
class My_manager extends CI_Controller {

    /**
     *
     * Khai báo biến mặc định
     * @var $_view: folder chứa file view mặc định
     * @var $_themes_lib: folder chứa các file img, css, js mặc định
     * @var $_themes_custom: folder chứa các file img, css, js của người khác thêm vào
     * @var $_logo: đường dẫn đến file logo 
     * @var $_favicon: đường dẫn đến file .ico 
     */
    var $_view = '';
    var $_view_custom = '';
    var $_themes_lib = '';
    var $_themes_custom = '';
    var $_logo = '';
    var $_favicon = '';
    var $_data_themes = array();
    var $_title = '';

    /**
     * Khai báo action default của form
     * Kiểm tra class + method hiện tại
     */
    var $_class = '';
    var $_method = '';
    var $_action = '';

    /**
     * Biến để tạo session
     * @var $_user_data: đường dẫn đến file logo 
     * @var $_user_custom: đường dẫn đến file logo 
     */
    var $_user_data = array();
    var $_user_custom = array();

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $this->_setting_config();
    }

    public function index() {
        $head = $this->get_head();
        $header = $this->get_header();
        $left_page = $this->get_left_page();
        $right_page = $this->get_right_page();
        $breadcrumbs = $this->get_breadcrumbs();
        $footer = $this->get_footer();
        $this->master_page($head, $header, $left_page, $breadcrumbs, $right_page, $footer);
    }

    public function _setting_config() {
        //Chạy hàm setting_class() để lấy dữ liệu khai báo từ controller
        $this->setting_class();

        $this->_view = 'backend/default/';
        $this->_view_custom = (!empty($this->setting['view']) && file_exists(APPPATH . 'views/backend/' . $this->setting['view'])) ? 'backend/' . $this->setting['view'] . '/' : $this->_view;

        $this->_themes_lib = base_url('themes/libs/');
        $this->_themes_custom = base_url('themes/backend/');

        $this->_title = $this->setting['title'];
        $this->_logo = base_url('themes/libs/images/logo/logo.png');
        $this->_favicon = base_url('themes/libs/images/logo/favicon.ico');

        $this->_class = $this->router->fetch_class();
        $this->_method = $this->router->fetch_method();
    }

    public function _validate() {
        
    }

    public function _check_permission() {
        
    }

    public function get_head($data = array()) {
        $data_return = $this->load->view($this->_view . 'head', $data, TRUE);
        $data_return .= (!empty($this->setting['view']) && file_exists(APPPATH . 'views/backend/' . $this->setting['view'] . '/head.php')) ? $this->load->view($this->_view_custom . 'head', $data, TRUE) : '';
        return $data_return;
    }

    public function get_header($data = array()) {
        $data_return = $this->load->view($this->_view . 'header', $data, TRUE);
        return $data_return;
    }

    public function get_left_page($data = array()) {
        $data_return = $this->load->view($this->_view . 'left_page', $data, TRUE);
        return $data_return;
    }

    public function get_right_page($data = array()) {
        $data_return = file_exists(APPPATH . 'views/backend/' . $this->setting['view'] . '/right_page.php') ? $this->load->view($this->_view_custom . 'right_page', $data, TRUE) : $this->load->view($this->_view . 'right_page', $data, TRUE);
        return $data_return;
    }

    public function get_breadcrumbs($data = array()) {
        $data_return = $this->load->view($this->_view . 'breadcrumbs', $data, TRUE);
        return $data_return;
    }

    public function get_footer($data = array()) {
        $data_return = $this->load->view($this->_view . 'footer', $data, TRUE);
        return $data_return;
    }

    public function master_page($head, $header, $left_page, $breadcrumbs, $right_page, $footer) {
        $data = array();
        $data['head'] = $head;
        $data['header'] = $header;
        $data['left_page'] = $left_page;
        $data['breadcrumbs'] = $breadcrumbs;
        $data['right_page'] = $right_page;
        $data['footer'] = $footer;
        $this->load->view($this->_view . 'master_page', $data);
    }

    /**
     * Hàm kiểm tra có là email hay không?
     * @param String $email địa chỉ email cần kiểm tra
     * @return boolean
     */
    protected function _is_email($email) {
        return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)) ? FALSE : TRUE;
    }

}

/**
 * Copyright © 2014-2015 trongpd@topica.edu.vn
 * Copyright © 2014-2015 ACE Admin 1.3.3
 */