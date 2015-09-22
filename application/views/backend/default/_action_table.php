<div class="hidden-sm hidden-xs action-buttons text-center">
    <a class="blue e_view" href="#" data-id="<?php echo $data; ?>">
        <i class="ace-icon fa fa-search-plus bigger-130"></i>
    </a>

    <a class="green e_edit" href="#" data-id="<?php echo $data; ?>">
        <i class="ace-icon fa fa-pencil bigger-130"></i>
    </a>

    <a class="red e_delete" href="#" data-id="<?php echo $data; ?>">
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
                <a href="#" class="tooltip-info e_view" data-rel="tooltip" title="View" data-id="<?php echo $data; ?>">
                    <span class="blue">
                        <i class="ace-icon fa fa-search-plus bigger-120"></i>
                    </span>
                </a>
            </li>

            <li>
                <a href="#" class="tooltip-success e_edit" data-rel="tooltip" title="Edit" data-id="<?php echo $data; ?>">
                    <span class="green">
                        <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                    </span>
                </a>
            </li>

            <li>
                <a href="#" class="tooltip-error e_delete" data-rel="tooltip" title="Delete" data-id="<?php echo $data; ?>">
                    <span class="red">
                        <i class="ace-icon fa fa-trash-o bigger-120"></i>
                    </span>
                </a>
            </li>
        </ul>
    </div>
</div>