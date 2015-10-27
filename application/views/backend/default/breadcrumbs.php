<?php // var_dump($text_method); echo $this->_method;exit;   ?> 
<!-- #section:basics/content.breadcrumbs -->
<div class="breadcrumbs" id="breadcrumbs">
    <script type="text/javascript">
        try {
            ace.settings.check('breadcrumbs', 'fixed')
        } catch (e) {
        }
    </script>

    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="<?php echo site_url('admin'); ?>">Home</a>
        </li>
        <?php if (isset($text_method)) { ?>
            <li>
                <a href = "<?php echo site_url('admin/' . $this->_class . '/' . $this->_method); ?>"><?php echo ucfirst($text_class); ?></a>
            </li>
            <li class="active"><?php echo ucfirst($text_method); ?></li>
        <?php } else { ?>
            <li class="active"><?php echo ucfirst($text_class); ?></li>
        <?php } ?>
    </ul><!-- /.breadcrumb -->

    <!-- #section:basics/content.searchbox -->
    <div class="nav-search" id="nav-search">
        <form class="form-search">
            <span class="input-icon">
                <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                <i class="ace-icon fa fa-search nav-search-icon"></i>
            </span>
        </form>
    </div><!-- /.nav-search -->

    <!-- /section:basics/content.searchbox -->
</div>