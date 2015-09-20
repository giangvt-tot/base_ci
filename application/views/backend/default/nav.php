<?php
//echo '<pre>';
//var_dump($this->_class);
//exit();
?>
<!-- #section:basics/sidebar -->
<div id="sidebar" class="sidebar                  responsive">
    <script type="text/javascript">
        try {
            ace.settings.check('sidebar', 'fixed')
        } catch (e) {
        }
    </script>

    <div class="sidebar-shortcuts" id="sidebar-shortcuts"></div>
    <!-- /.sidebar-shortcuts -->

    <ul class="nav nav-list">
        <?php
        foreach ($data as $key => $value) {
            if (!isset($value['child'])) {
                ?>
                <li class="<?php echo ($value['class'] == $this->_class) ? 'active' : ''; ?>">
                    <a href="<?php echo $value['url']; ?>">
                        <i class="menu-icon fa <?php echo $value['icon']; ?>"></i>
                        <span class="menu-text"> <?php echo $value['text']; ?> </span>
                    </a>
                    <b class="arrow"></b>
                </li>

            <?php } else {
                ?>
                <li class="<?php echo ($value['class'] == $this->_class) ? 'active' : ''; ?>">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa <?php echo $value['icon']; ?>"></i>
                        <span class="menu-text"> <?php echo $value['text']; ?> </span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">
                        <?php foreach ($value['child'] as $key_ => $value_) { ?>
                            <li class="<?php echo ($value_['method'] == $this->_method && $value['class'] == $this->_class) ? 'active' : ''; ?>">
                                <a href="<?php echo $value_['url']; ?>" class="<?php echo (isset($value_['class_html'])) ? ' ' . $value_['class_html'] . ' ' : ''; ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    <?php echo $value_['text']; ?>
                                </a>
                                <b class="arrow"></b>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
                <?php
            }
        }
        ?>
    </ul><!-- /.nav-list -->

    <!-- #section:basics/sidebar.layout.minimize -->
    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>

    <!-- /section:basics/sidebar.layout.minimize -->
    <script type="text/javascript">
        try {
            ace.settings.check('sidebar', 'collapsed')
        } catch (e) {
        }
    </script>
</div>