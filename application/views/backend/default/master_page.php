<!DOCTYPE html>
<html>
    <head>
        <?php echo $head; ?>
    </head>
    <body class="no-skin">
        <!-- Header -->
        <div id="navbar" class="navbar navbar-default">
            <?php echo $header; ?>
        </div>

        <!--content-->
        <div class="main-container" id="main-container">

            <?php echo $nav; ?>

            <!-- /section:basics/sidebar -->
            <div class="main-content">
                <div class="main-content-inner">
                    <?php echo $breadcrumbs; ?>

                    <?php echo $content; ?>
                </div>
            </div><!-- /.main-content -->

            <?php echo $footer; ?>

            <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
                <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
            </a>
        </div><!-- /.main-container -->
    </body>
</html>