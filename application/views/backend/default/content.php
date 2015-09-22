<div class="page-content">

    <!-- /section:settings.box -->
    <div class="page-header">
        <h1>
            <?php echo isset($text_method) ? ucfirst($text_method) : ucfirst($text_class); ?>
        </h1>
    </div><!-- /.page-header -->

    <!-- PAGE CONTENT BEGINS -->

    <div class="row">
        <div class="col-xs-12">

            <div class="clearfix">
                <div class="pull-right tableTools-container"></div>
            </div>
            <div class="table-header">
                Results for "Latest Registered Domains"
            </div>

            <!-- div.table-responsive -->

            <!-- div.dataTables_borderWrap -->
            <div>
                <table id="dynamic-table" class="table table-striped table-bordered table-hover display" url-ajax="<?php echo site_url('admin/' . $this->_class . '/ajax_list_data'); ?>">
                    <thead>
                        <tr>
                            <th class="center">
                                <label class="pos-rel">
                                    <input type="checkbox" class="ace" />
                                    <span class="lbl"></span>
                                </label>
                            </th>
                            <?php foreach ($field_table as $key => $value) { ?>
                                <th><?php echo $value; ?></th>
                            <?php } ?>
                            <th></th>
                        </tr>
                    </thead>


                </table>
            </div>
        </div>
    </div>


</div><!-- /.page-content -->
