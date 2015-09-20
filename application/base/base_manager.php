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
abstract class Base_manager extends CI_Controller {

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

    abstract function setting_class();

    public function index() {
        $data_title = $this->_get_nav_data();
        $head = $this->get_head();
        $header = $this->get_header();
        $nav = $this->get_nav($this->setting);
        $content = $this->get_content($this->setting);
        $breadcrumbs = $this->get_breadcrumbs($data_title);
        $footer = $this->get_footer();
        $this->master_page($head, $header, $nav, $breadcrumbs, $content, $footer);
    }

    public function _setting_nav() {
        
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

    public function _get_nav_data($data = array()) {
        $data[] = array(
            'text' => 'Dashboard',
            'icon' => 'fa-tachometer',
            'url' => site_url('admin'),
            'class' => 'index'
        );
        $data[] = array(
            'text' => 'Quản lý thành viên',
            'icon' => 'fa-user',
            'url' => site_url('admin'),
            'class' => 'user',
            'child' => array(
                array(
                    'text' => 'Đm đm',
                    'url' => site_url('admin/user/demo'),
                    'method' => 'demo',
                    'class_html' => 'e_ajax_link'
                ),
                array(
                    'text' => 'Danh sách thành viên',
                    'url' => site_url('admin/user'),
                    'method' => 'index',
                ),
            )
        );

        //Kiểm tra data để in ra breadcrumb
        foreach ($data as $key => $val) {
            if ($val['class'] == $this->_class) {
                $data_return['text_class'] = $val['text'];
                if (isset($val['child'])) {
                    foreach ($val['child'] as $key_child => $val_child) {
                        $data_return['text_method'] = $val_child['method'] == $this->_method ? $val_child['text'] : '';
                    }
                }
            } else {
                continue;
            }
        }
        $data_return['data'] = $data;
        return $data_return;
    }

    public function get_nav($data = array()) {
        $data_return = $this->load->view($this->_view . 'nav', $data, TRUE);
        return $data_return;
    }

    public function _get_content_data($data = array()) {
        return $data;
    }

    public function get_content($data = array()) {
        $data_return = file_exists(APPPATH . 'views/backend/' . $this->setting['view'] . '/content.php') ? $this->load->view($this->_view_custom . 'content', $data, TRUE) : $this->load->view($this->_view . 'content', $data, TRUE);
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

    public function master_page($head, $header, $nav, $breadcrumbs, $content, $footer) {
        $data = array();
        $data['head'] = $head;
        $data['header'] = $header;
        $data['nav'] = $nav;
        $data['breadcrumbs'] = $breadcrumbs;
        $data['content'] = $content;
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
