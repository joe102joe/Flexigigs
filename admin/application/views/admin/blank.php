<!DOCTYPE html>
<html lang="en" dir="rtl">
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title> Admin Dashboard </title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #2 for statistics, charts, recent events and reports" name="description" />
        <meta content="" name="author" />
        <link rel="shortcut icon" href="<?= base_url() ?>assets/global/img/favicon.png" /> 
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
	    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
        <link href="<?= base_url() ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="<?= base_url() ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" />
        <link href="<?= base_url() ?>assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet" />
        <link href="<?= base_url() ?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css" rel="stylesheet" />
        
        <link href="<?= base_url() ?>assets/global/plugins/bootstrap-sweetalert/sweetalert.css" rel="stylesheet" />
        <link href="<?= base_url() ?>assets/global/css/components-rtl.min.css" rel="stylesheet" id="style_components" />
        <link href="<?= base_url() ?>assets/global/css/plugins-rtl.min.css" rel="stylesheet" />

        <link href="<?= base_url() ?>assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" />
        <link href="<?= base_url() ?>assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" />

        <link href="<?= base_url() ?>assets/layouts/layout2/css/layout-rtl.min.css" rel="stylesheet" />
        <link href="<?= base_url() ?>assets/layouts/layout2/css/themes/grey-rtl.min.css" rel="stylesheet" id="style_color" />

        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?= base_url() ?>assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" />
        <link href="<?= base_url() ?>assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css" rel="stylesheet" />
        <!-- END PAGE LEVEL PLUGINS -->
    
<?php if (@$css_files): ?>
<?php foreach($css_files as $file): ?>
        <link href="<?= $file; ?>" rel="stylesheet" />
<?php endforeach; ?>
<?php endif ?>
        <link href="<?= base_url() ?>assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" />
        <link href="<?= base_url() ?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" />
        <link href="<?= base_url() ?>assets/grocery_crud/admin-custom.css" rel="stylesheet" />

        <script src="<?= base_url() ?>assets/grocery_crud/js/jquery-2.1.0.min.js"></script>

<?php if (@$js_files): ?>
<?php foreach($js_files as $file): ?>
        <script src="<?= $file; ?>"></script>
<?php endforeach; ?>
<?php endif ?>
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?= base_url() ?>assets/global/scripts/app.min.js"></script>
        <script src="<?= base_url() ?>assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js"></script>
        <script src="<?= base_url() ?>assets/pages/scripts/ui-sweetalert.min.js"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <script src="<?= base_url() ?>assets/global/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="<?= base_url() ?>assets/global/plugins/jquery.blockui.min.js"></script>

        <script src="<?= base_url() ?>assets/global/plugins/select2/js/select2.full.min.js"></script>
        <script src="<?= base_url() ?>assets/pages/scripts/components-select2.min.js"></script>

        <script src="<?= base_url() ?>assets/global/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?= base_url() ?>assets/pages/scripts/ui-modals.min.js"></script>

        <script src="<?= base_url() ?>assets/global/plugins/js.cookie.min.js"></script>
        <script src="<?= base_url() ?>assets/layouts/layout2/scripts/layout.min.js"></script>
        <script src="<?= base_url() ?>assets/layouts/layout2/scripts/demo.min.js"></script>
        <script src="<?= base_url() ?>assets/layouts/global/scripts/quick-sidebar.min.js"></script>
        <script src="<?= base_url() ?>assets/layouts/global/scripts/quick-nav.min.js"></script>
        
        <script src="<?= base_url() ?>assets/global/scripts/datatable.js"></script>
        <script src="<?= base_url() ?>assets/global/plugins/datatables/datatables.min.js"></script>
        <script src="<?= base_url() ?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js"></script>
        <script src="<?= base_url() ?>assets/pages/scripts/table-datatables-editable.min.js"></script>

        <script src="<?= base_url() ?>assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
        <script src="<?= base_url() ?>assets/global/plugins/typeahead/handlebars.min.js"></script>
        <script src="<?= base_url() ?>assets/global/plugins/typeahead/typeahead.bundle.min.js"></script>
        <script src="<?= base_url() ?>assets/pages/scripts/components-bootstrap-tagsinput.min.js"></script>

 <style>
   .input-group-btn.add-where {top: 24px;} a:hover {text-decoration: none;}
   @media only screen and (max-width: 991px) {.input-group-btn.add-where {top: 5px;}} 
  *{font-family:cairo;} h1,h2,h3,h4,h5,h6,p{font-family:cairo !important;} 
 </style>       
        </head>
    <!-- END HEAD -->
    <body class="page-sidebar-closed-hide-logo page-container-bg-solid">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-static-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="<?= base_url() ?>">
                        <img src="<?= base_url() ?>assets/global/img/logo.jpg" alt="logo" class="logo-default" /> </a>     <!-- /global/img/logo.png" -->
                    <div class="menu-toggler sidebar-toggler">
                        <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
                    </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN PAGE TOP -->
                <div class="page-top">
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <img alt="" class="img-circle" src="<?= base_url() ?>assets/layouts/layout2/img/avatar3_small.jpg" />
                                    <span class="username username-hide-on-mobile"> 
                                        <?=$this->session->login_data->username?> 
                                    </span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <!-- <li>
                                        <a href="page_user_profile_1.html">
                                            <i class="icon-user"></i> My Profile </a>
                                    </li>
                                    <li class="divider"> </li> -->
                                    <li>
                                        <a href="<?=base_url()?>users/logout">
                                            <i class="icon-key"></i> خروج </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                            <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-extended quick-sidebar-toggler">
                                <span class="sr-only">Toggle Quick Sidebar</span>
                                <!-- <i class="icon-logout"></i> -->
                            </li>
                            <!-- END QUICK SIDEBAR TOGGLER -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END PAGE TOP -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- END SIDEBAR -->
                <div class="page-sidebar navbar-collapse collapse">
                    <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu page-sidebar-menu-compact" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                        <li class="nav-item start active open">
                            <a href="<?=base_url()?>creator/" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">الرئيسية</span>
                                <span class="selected"></span>
                                <span class="arrow open"></span>
                            </a>
                        </li>
                    <?php $get_menu = get_table('module');
                          foreach ( $get_menu as $menu ) : ?>
                        <li class="nav-item  ">
                            <a href="<?= base_url() . 'admin/' . $menu->url ?>" class="nav-link nav-toggle">
                                <i class="icon-<?=$menu->icon_name?>"></i>
                                <span class="title"><?= $menu->the_name ?></span>
                                <span class="arrow"></span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                        
                        <li class="nav-item  ">
                            <a href="<?=base_url('creator/admins')?>" class="nav-link nav-toggle">
                                <i class="icon-settings"></i>
                                <span class="title">المشرفين</span>
                                <span class="arrow"></span>
                            </a>
                        </li> 
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <h1 class="page-title"> لوحة التحكم</h1>
                    <div class="page-bar">
                        <div class="page-toolbar"></div>
                    </div>
                    <!-- END PAGE HEADER-->
                    <div class="row">
                         <div class="col-sm-12 col-xs-12">
                                <?=@$output; ?>
                                <?php if (@$main_content) { $this->load->view($main_content); } ?>
                         </div>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
            <a href="javascript:;" class="page-quick-sidebar-toggler">
                <i class="icon-login"></i>
            </a>
            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner"> 2016 &copy; Metronic Theme By
                <div class="scroll-to-top">
                    <i class="icon-arrow-up"></i>
                </div>
            </div>
            <!-- END FOOTER -->
    </body>
</html>