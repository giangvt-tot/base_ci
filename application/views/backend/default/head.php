<title><?php echo $this->_title; ?> - HỌC THÀNH TÀI</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="hocthanhtai.com.vn nơi chia sẻ kiến thức và thủ thuật sử dụng PHP, hướng dẫn học HTML CSS JAVASCRIP">
<meta name="keywords" content="HTML,CSS,XML,JavaScript,Codeigniter">
<meta name="author" content="giangvt.sami">
<meta name="description" content="overview &amp; stats" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
<link href="<?php echo $this->_favicon; ?>" rel="shortcut icon">


<!-- bootstrap & fontawesome -->
<link rel="stylesheet" href="<?php echo $this->_themes_lib; ?>/css/bootstrap.css" />
<link rel="stylesheet" href="<?php echo $this->_themes_lib; ?>/css/font-awesome.css" />

<!-- page specific plugin styles -->

<!-- text fonts -->
<link rel="stylesheet" href="<?php echo $this->_themes_lib; ?>/css/ace-fonts.css" />

<!-- ace styles -->
<link rel="stylesheet" href="<?php echo $this->_themes_lib; ?>/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />

<!-- ace settings handler -->
<script src="<?php echo $this->_themes_lib; ?>/js/ace-extra.js"></script>

<!--[if !IE]> -->
<script type="text/javascript">
    window.jQuery || document.write("<script src='<?php echo $this->_themes_lib; ?>/js/jquery.js'>" + "<" + "/script>");
</script>

<script type="text/javascript">
    if ('ontouchstart' in document.documentElement)
        document.write("<script src='<?php echo $this->_themes_lib; ?>/js/jquery.mobile.custom.js'>" + "<" + "/script>");
</script>
<script src="<?php echo $this->_themes_lib; ?>/js/bootstrap.js"></script>

<!-- page specific plugin scripts -->
<script src="<?php echo $this->_themes_lib; ?>/js/dataTables/jquery.dataTables.js"></script>
<script src="<?php echo $this->_themes_lib; ?>/js/dataTables/jquery.dataTables.bootstrap.js"></script>
<script src="<?php echo $this->_themes_lib; ?>/js/dataTables/extensions/TableTools/js/dataTables.tableTools.js"></script>
<script src="<?php echo $this->_themes_lib; ?>/js/dataTables/extensions/ColVis/js/dataTables.colVis.js"></script>

<!-- ace scripts -->
<script src="<?php echo $this->_themes_lib; ?>/js/ace/elements.scroller.js"></script>
<script src="<?php echo $this->_themes_lib; ?>/js/ace/elements.colorpicker.js"></script>
<script src="<?php echo $this->_themes_lib; ?>/js/ace/elements.fileinput.js"></script>
<script src="<?php echo $this->_themes_lib; ?>/js/ace/elements.typeahead.js"></script>
<script src="<?php echo $this->_themes_lib; ?>/js/ace/elements.wysiwyg.js"></script>
<script src="<?php echo $this->_themes_lib; ?>/js/ace/elements.spinner.js"></script>
<script src="<?php echo $this->_themes_lib; ?>/js/ace/elements.treeview.js"></script>
<script src="<?php echo $this->_themes_lib; ?>/js/ace/elements.wizard.js"></script>
<script src="<?php echo $this->_themes_lib; ?>/js/ace/elements.aside.js"></script>
<script src="<?php echo $this->_themes_lib; ?>/js/ace/ace.js"></script>
<script src="<?php echo $this->_themes_lib; ?>/js/ace/ace.ajax-content.js"></script>
<script src="<?php echo $this->_themes_lib; ?>/js/ace/ace.touch-drag.js"></script>
<script src="<?php echo $this->_themes_lib; ?>/js/ace/ace.sidebar.js"></script>
<script src="<?php echo $this->_themes_lib; ?>/js/ace/ace.sidebar-scroll-1.js"></script>
<script src="<?php echo $this->_themes_lib; ?>/js/ace/ace.submenu-hover.js"></script>
<script src="<?php echo $this->_themes_lib; ?>/js/ace/ace.widget-box.js"></script>
<script src="<?php echo $this->_themes_lib; ?>/js/ace/ace.settings.js"></script>
<script src="<?php echo $this->_themes_lib; ?>/js/ace/ace.settings-rtl.js"></script>
<script src="<?php echo $this->_themes_lib; ?>/js/ace/ace.settings-skin.js"></script>
<script src="<?php echo $this->_themes_lib; ?>/js/ace/ace.widget-on-reload.js"></script>
<script src="<?php echo $this->_themes_lib; ?>/js/ace/ace.searchbox-autocomplete.js"></script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
    jQuery(function ($) {
        //initiate dataTables plugin
        var oTable1 =
                $('#dynamic-table').dataTable({
            bAutoWidth: false,
            "aoColumns": [
                {"bSortable": false},
                null, null, null, null, null,
                {"bSortable": false}
            ],
            "aaSorting": [],
            //,
            //"sScrollY": "200px",
            //"bPaginate": false,

            //"sScrollX": "100%",
            //"sScrollXInner": "120%",
            //"bScrollCollapse": true,
            //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
            //you may want to wrap the table inside a "div.dataTables_borderWrap" element

            //"iDisplayLength": 50
            //"pagingType": "full_numbers",
            "processing": true,
            "serverSide": true,
//            "ajax": "http://localhost/hoc-thanh-tai/admin/demo_ajax",
            "ajax": {
//                "url": "http://localhost/hoc-thanh-tai/admin/demo_ajax_2",
                "url": $('table#dynamic-table').attr('url-ajax'),
                "type": "POST"
            },
            "columns": [
                {"data": "first_name"},
                {"data": "last_name"},
                {"data": "position"},
                {"data": "office"},
                {"data": "start_date"},
                {"data": "salary"},
                {"data": "action"}
            ]
        });
        //oTable1.fnAdjustColumnSizing();


        //TableTools settings
        TableTools.classes.container = "btn-group btn-overlap";
        TableTools.classes.print = {
            "body": "DTTT_Print",
            "info": "tableTools-alert gritter-item-wrapper gritter-info gritter-center white",
            "message": "tableTools-print-navbar"
        }

        //initiate TableTools extension
        var tableTools_obj = new $.fn.dataTable.TableTools(oTable1, {
            "sSwfPath": "<?php echo $this->_themes_lib; ?>/js/dataTables/extensions/TableTools/swf/copy_csv_xls_pdf.swf", //in Ace demo <?php echo $this->_themes_lib; ?> will be replaced by correct assets path

            "sRowSelector": "td:not(:last-child)",
            "sRowSelect": "multi",
            "fnRowSelected": function (row) {
                //check checkbox when row is selected
                try {
                    $(row).find('input[type=checkbox]').get(0).checked = true
                } catch (e) {
                }
            },
            "fnRowDeselected": function (row) {
                //uncheck checkbox
                try {
                    $(row).find('input[type=checkbox]').get(0).checked = false
                } catch (e) {
                }
            },
            "sSelectedClass": "success",
            "aButtons": [
                {
                    "sExtends": "copy",
                    "sToolTip": "Copy to clipboard",
                    "sButtonClass": "btn btn-white btn-primary btn-bold",
                    "sButtonText": "<i class='fa fa-copy bigger-110 pink'></i>",
                    "fnComplete": function () {
                        this.fnInfo('<h3 class="no-margin-top smaller">Table copied</h3>\
                                                        <p>Copied ' + (oTable1.fnSettings().fnRecordsTotal()) + ' row(s) to the clipboard.</p>',
                                1500
                                );
                    }
                },
                {
                    "sExtends": "csv",
                    "sToolTip": "Export to CSV",
                    "sButtonClass": "btn btn-white btn-primary  btn-bold",
                    "sButtonText": "<i class='fa fa-file-excel-o bigger-110 green'></i>"
                },
                {
                    "sExtends": "pdf",
                    "sToolTip": "Export to PDF",
                    "sButtonClass": "btn btn-white btn-primary  btn-bold",
                    "sButtonText": "<i class='fa fa-file-pdf-o bigger-110 red'></i>"
                },
                {
                    "sExtends": "print",
                    "sToolTip": "Print view",
                    "sButtonClass": "btn btn-white btn-primary  btn-bold",
                    "sButtonText": "<i class='fa fa-print bigger-110 grey'></i>",
                    "sMessage": "<div class='navbar navbar-default'><div class='navbar-header pull-left'><a class='navbar-brand' href='#'><small>Print preview</small></a></div></div>",
                    "sInfo": "<h3 class='no-margin-top'>Print view</h3>\
                                                          <p>Please use your browser's print function to\
                                                          print this table.\
                                                          <br />Press <b>escape</b> when finished.</p>",
                }
            ]
        });
        //we put a container before our table and append TableTools element to it
        $(tableTools_obj.fnContainer()).appendTo($('.tableTools-container'));

        //also add tooltips to table tools buttons
        //addding tooltips directly to "A" buttons results in buttons disappearing (weired! don't know why!)
        //so we add tooltips to the "DIV" child after it becomes inserted
        //flash objects inside table tools buttons are inserted with some delay (100ms) (for some reason)
        setTimeout(function () {
            $(tableTools_obj.fnContainer()).find('a.DTTT_button').each(function () {
                var div = $(this).find('> div');
                if (div.length > 0)
                    div.tooltip({container: 'body'});
                else
                    $(this).tooltip({container: 'body'});
            });
        }, 200);



        //ColVis extension
        var colvis = new $.fn.dataTable.ColVis(oTable1, {
            "buttonText": "<i class='fa fa-search'></i>",
            "aiExclude": [0, 6],
            "bShowAll": true,
            //"bRestore": true,
            "sAlign": "right",
            "fnLabel": function (i, title, th) {
                return $(th).text();//remove icons, etc
            }

        });

        //style it
        $(colvis.button()).addClass('btn-group').find('button').addClass('btn btn-white btn-info btn-bold')

        //and append it to our table tools btn-group, also add tooltip
        $(colvis.button())
                .prependTo('.tableTools-container .btn-group')
                .attr('title', 'Show/hide columns').tooltip({container: 'body'});

        //and make the list, buttons and checkboxed Ace-like
        $(colvis.dom.collection)
                .addClass('dropdown-menu dropdown-light dropdown-caret dropdown-caret-right')
                .find('li').wrapInner('<a href="javascript:void(0)" />') //'A' tag is required for better styling
                .find('input[type=checkbox]').addClass('ace').next().addClass('lbl padding-8');



        /////////////////////////////////
        //table checkboxes
        $('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);

        //select/deselect all rows according to table header checkbox
        $('#dynamic-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function () {
            var th_checked = this.checked;//checkbox inside "TH" table header

            $(this).closest('table').find('tbody > tr').each(function () {
                var row = this;
                if (th_checked)
                    tableTools_obj.fnSelect(row);
                else
                    tableTools_obj.fnDeselect(row);
            });
        });

        //select/deselect a row when the checkbox is checked/unchecked
        $('#dynamic-table').on('click', 'td input[type=checkbox]', function () {
            var row = $(this).closest('tr').get(0);
            if (!this.checked)
                tableTools_obj.fnSelect(row);
            else
                tableTools_obj.fnDeselect($(this).closest('tr').get(0));
        });




        $(document).on('click', '#dynamic-table .dropdown-toggle', function (e) {
            e.stopImmediatePropagation();
            e.stopPropagation();
            e.preventDefault();
        });


        //And for the first simple table, which doesn't have TableTools or dataTables
        //select/deselect all rows according to table header checkbox
        var active_class = 'active';
        $('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function () {
            var th_checked = this.checked;//checkbox inside "TH" table header

            $(this).closest('table').find('tbody > tr').each(function () {
                var row = this;
                if (th_checked)
                    $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
                else
                    $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
            });
        });

        //select/deselect a row when the checkbox is checked/unchecked
        $('#simple-table').on('click', 'td input[type=checkbox]', function () {
            var $row = $(this).closest('tr');
            if (this.checked)
                $row.addClass(active_class);
            else
                $row.removeClass(active_class);
        });



        /********************************/
        //add tooltip for small view action buttons in dropdown menu
        $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});

        //tooltip placement on right or left
        function tooltip_placement(context, source) {
            var $source = $(source);
            var $parent = $source.closest('table')
            var off1 = $parent.offset();
            var w1 = $parent.width();

            var off2 = $source.offset();
            //var w2 = $source.width();

            if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2))
                return 'right';
            return 'left';
        }

    })
</script>

<!-- the following scripts are used in demo only for onpage help and you don't need them -->
<link rel="stylesheet" href="<?php echo $this->_themes_lib; ?>/css/ace.onpage-help.css" />
<link rel="stylesheet" href="<?php echo $this->_themes_lib; ?>/docs/assets/js/themes/sunburst.css" />

<script type="text/javascript"> ace.vars['base'] = '<?php echo $this->_themes_lib; ?>';</script>
<script src="<?php echo $this->_themes_lib; ?>/js/ace/elements.onpage-help.js"></script>
<script src="<?php echo $this->_themes_lib; ?>/js/ace/ace.onpage-help.js"></script>
<script src="<?php echo $this->_themes_lib; ?>/docs/assets/js/rainbow.js"></script>
<script src="<?php echo $this->_themes_lib; ?>/docs/assets/js/language/generic.js"></script>
<script src="<?php echo $this->_themes_lib; ?>/docs/assets/js/language/html.js"></script>
<script src="<?php echo $this->_themes_lib; ?>/docs/assets/js/language/css.js"></script>
<script src="<?php echo $this->_themes_lib; ?>/docs/assets/js/language/javascript.js"></script>


<!--My css + js-->
<link rel="stylesheet" href="<?php echo $this->_themes_lib; ?>/css/style.css" />