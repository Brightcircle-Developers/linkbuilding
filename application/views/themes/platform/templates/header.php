<!DOCTYPE html>
<html>
    <head>
        <title><?= $title ?></title>
        <?= link_tag('public/assets/css/fontmanager.css') ?>
        <?= link_tag('public/assets/css/static.css') ?>
        <?= link_tag('public/assets/css/theme_platform.css') ?>
        <?= link_tag('public/assets/css/style.css') ?>
        <?= link_tag('public/assets/css/grid.css') ?>
        <?= link_tag('public/assets/css/responsive.css') ?>
        <?= link_tag('public/assets/fonts/FontAwesome/css/fontawesome-all.css') ?>
        <script type='text/javascript' src="<?php echo base_url(); ?>public/assets/js/jquery.min.js"></script>
        <script type='text/javascript' src="<?php echo base_url(); ?>public/assets/js/menu_controller.js" defer="defer"></script>
        <script type='text/javascript' src="<?php echo base_url(); ?>public/assets/js/modals.js"></script>
        <script type='text/javascript' src="<?php echo base_url(); ?>public/assets/js/ajaxCom.js"></script>
        <script type='text/javascript' src="<?php echo base_url(); ?>public/assets/js/user.js"></script>
    </head>
    <body>
        <div id="page_modals" class="page_modals">
        </div>
        <?php modals_show(); ?>
        <div class="page_wrapper">
            <header class="header">
                <div class="header-flat">
                    <div class="header-top">
                    </div>
                    <div class="header-bottom">
                    </div>
                </div>
                <div class="header-responsive">
                    <div class="header-top">
                    </div>
                    <div class="header-bottom">
                        <div class="menu-button" onclick="header_toggle()">
                            <div class="menu_button-style">
                                <div class="menu_button-line" id="menu-line1"></div>
                                <div class="menu_button-line" id="menu-line2"></div>
                                <div class="menu_button-line" id="menu-line3"></div>
                            </div>
                        </div>
                    </div>
                    <div class="header-menu" id="header-responsive-menu">
                        <div class="header-menu-menu">
                            <ul class="menu-list">
                            <?php $menu_items_sidebar = array_reverse($menu_items_sidebar); foreach($menu_items_sidebar as $item) { ?>
                                <li class="menuitem">
                                    <a href="<?= site_url($item['site_url']); ?>">
                                        <div>
                                            <?= $item['display_name'] ?>
                                        </div>
                                    </a>
                                </li>
                            <?php } ?>
                            </ul>
                        </div>
                        <div class="header-menu-line-outer">
                            <div class="header-menu-line-inner">
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div class="page_content">
                <div class="sidebar">
                    <div class="sidebar-user">
                        <div class="user-image">
                            <div class="image theme-border-outer">
                                <div class="image-inner theme-border-inner" style="background-image: url(<?= 'data:image/png;base64,'.base64_encode($this->session->userdata('image')) ?>);">
                                </div>
                            </div>
                        </div>
                        <div class="user-options">
                            <div class="option-guest">
                                <a href="<?= site_url('home') ?>">
                                    <i class="fas fa-home"></i>
                                </a>
                            </div>
                            <div class="option-inbox">
                                <a href="<?= site_url('platform/inbox') ?>">
                                    <i class="fas fa-inbox"></i>
                                    <div class="option-inbox-count">
                                        5
                                    </div>
                                </a>
                            </div>
                            <div class="option-user">
                                <a href="<?= site_url('platform/user') ?>">
                                    <i class="fas fa-user-circle"></i>
                                </a>
                                <div class="option-user-menu">
                                    <div class="user-menu-arrow">
                                    </div>
                                    <div class="user-menu">
                                        <ul class="menu-list">
                                        <?php foreach($menu_items_user as $item) { ?>
                                            <li class="menuitem">
                                                <div class="menuitem-inner">
                                                    <a href="<?= site_url($item['site_url']) ?>">
                                                        <div class="menuitem-icon">
                                                            <i class="fas fa-<?= $item['icon'] ?>"></i>
                                                        </div>
                                                        <div class="menuitem-title">
                                                            <?= $item['display_name'] ?>
                                                        </div>
                                                    </a>
                                                </div>
                                            </li>
                                        <?php } ?>
                                        </ul>
                                        <div class="theme-lines-outer">
                                            <div class="theme-lines-inner">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="theme-lines-outer">
                            <div class="theme-lines-inner">
                            </div>
                        </div>
                    </div>
                    <ul class="menu-list">
                    <?php foreach($menu_items_sidebar as $item) { ?>
                        <li class="menuitem <?php if($page == $item['name']){echo 'current';} ?>">
                            <div class="menuitem-inner">
                                <a href="<?= site_url($item['site_url']) ?>">
                                    <div class="menuitem-icon">
                                        <i class="fas fa-<?= $item['icon'] ?>"></i>
                                    </div>
                                    <div class="menuitem-title">
                                        <?= $item['display_name'] ?>
                                    </div>
                                </a>
                            </div>
                            <div class="submenu-inline">
                                <ul class="submenu-list">
                                <?php foreach($item['submenu'] as $subitem) { ?>
                                    <li class="menuitem-sub">
                                        <a href="<?= site_url($subitem['site_url']) ?>">
                                            <div class="menuitem-sub-title <?php if(isset($subview) && $subview == $subitem['name']) {echo 'current';} ?> ">
                                                <?= $subitem['display_name'] ?>
                                            </div>
                                        </a>
                                    </li>
                                <?php } ?>
                                </ul>
                            </div>
                        </li>
                    <?php } ?>
                    </ul>
                </div>
                <div class="content-wrapper">
                    <main class="main">
                        <div class="content-grid">
