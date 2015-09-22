<?php

class Demo_ajax_2 extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = $this->input->post();
//        echo '<pre>';var_dump($data);exit;
        $data_return = array(
            'draw' => $data['draw'],
            'recordsTotal' => 57,
            'recordsFiltered' => 57,
            'data' => array(
                array('<label class="pos-rel"><input type="checkbox" class="ace" /><span class="lbl"></span></label>',
                    'sdf', 'sdfs', 'gdfg', 'sdg', 'sdg',
                    '<div class="hidden-sm hidden-xs action-buttons text-center">
                                            <a class="blue" href="#">
                                                <i class="ace-icon fa fa-search-plus bigger-130"></i>
                                            </a>

                                            <a class="green" href="#">
                                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                                            </a>

                                            <a class="red" href="#">
                                                <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                            </a>
                                        </div>

                                        <div class="hidden-md hidden-lg">
                                            <div class="inline pos-rel">
                                                <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                                    <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                                </button>

                                                <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                                    <li>
                                                        <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                                                            <span class="blue">
                                                                <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                                            </span>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                                                            <span class="green">
                                                                <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                            </span>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                                            <span class="red">
                                                                <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                            </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>'
                ),
                array('', 'ssdfdf', 'sdfs', 'gdfg', 'sdg', 'sdg', ''),
                array('', 'eehsdf', 'sdfs', 'gdfg', 'sdg', 'sdg', ''),
                array('', 'dhdhjtsdf', 'sdfs', 'gdfg', 'sdg', 'sdg', ''),
                array('', 'yjsdf', 'sdfs', 'gdfg', 'sdg', 'sdg', ''),
                array('', 'fjjsdf', 'sdfs', 'gdfg', 'sdg', 'sdg', ''),
            ),
        );
        $data_return['data'][6] = array('', 'aaa', 'sdfs', 'gdfg', 'sdg', 'sdg', '');
        echo json_encode($data_return);
    }

}
