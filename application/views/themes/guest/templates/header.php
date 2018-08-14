<!DOCTYPE html>
<html>
    <head>
        <title><?= $title ?></title>
        <?= link_tag('public/assets/css/fontmanager.css') ?>
        <?= link_tag('public/assets/css/static.css') ?>
        <?= link_tag('public/assets/css/theme_guest.css') ?>
        <?= link_tag('public/assets/css/style.css') ?>
        <?= link_tag('public/assets/css/grid.css') ?>
        <?= link_tag('public/assets/css/responsive.css') ?>
        <?= link_tag('public/assets/fonts/FontAwesome/css/fontawesome-all.css') ?>
        <script type='text/javascript' src="<?php echo base_url(); ?>public/assets/js/menu_controller.js" defer="defer"></script>
        <script type='text/javascript' src="<?php echo base_url(); ?>public/assets/js/modals.js"></script>
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
                        <?php if(user_logged_in()) { ?>
                        <div class="header_user">
                            <div class="header_user-item">
                                <a href="<?= site_url('platform') ?>">
                                <?= $this->session->userdata('username'); ?>
                                </a>
                            </div>
                            <div class="header_user_menu">
                            </div>
                        </div>
                        <?php } ?>
                        <div class="header_menu">
                            <ul class="menu-list">
                            <?php foreach($menu_items_header as $item) { ?>
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
                            <?php $menu_items_header = array_reverse($menu_items_header); foreach($menu_items_header as $item) { ?>
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
                <main class="main">
                    <div class="content-grid">
