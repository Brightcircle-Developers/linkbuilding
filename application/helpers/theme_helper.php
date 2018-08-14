<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * load_page()
 *
 * Loads the page with the correct layout and output
 *
 * @param   array  $data
 * @return  void
 */

if(!function_exists('load_page')) {

    function load_page(array $data = array()) {
        $ci = get_instance();

        $ci->load->view('themes/'.$data['theme'].'/templates/header', $data);
        $ci->load->view($data['controller'].'/'.$data['view']);
        $ci->load->view('themes/'.$data['theme'].'/templates/footer');
    }
}

/**
 * make_slug()
 *
 * Makes the given input string into a slugified version
 * removes:
 *    -whitespace
 *    -spaces to _
 *    -- to _
 *
 * @param   array  $data
 * @return  void
 */

if(!function_exists('make_slug')) {

    function make_slug(string $str) {
        $str = strtolower($str);
        $str = trim($str);
        $str = str_replace(' ', '_', $str);
        $str = str_replace('-', '_', $str);
        return $str;
    }
}

/**
 * make_valid_name()
 *
 * Removes excessive whitespace of an input string
 * removes:
 *    -whitespace
 *
 * @param   array  $data
 * @return  void
 */

if(!function_exists('make_valid_name')) {

    function make_valid_name(string $str) {
        $str = trim($str);
        return $str;
    }
}

/**
 * load_header_menu_public()
 *
 * Loads the page with the correct layout and output
 *
 * @param   array  $data
 * @return  void
 */

if(!function_exists('load_header_menu_public')) {

    function load_header_menu_items_public() {
        $ci = get_instance();

        $menu_pages = array(
            'home' => array(
                'name' => 'home',
                'display_name' => _e('menuitem-home'),
                'slug' => 'menuitem-home',
                'site_url' => 'home',
                'permissions' => array()
            ),
            'sisters' => array(
                'name' => 'sisters',
                'display_name' => _e('menuitem-sisters'),
                'slug' => 'menuitem-sisters',
                'site_url' => 'sisters',
                'permissions' => array()
            )
        );

        if(!user_logged_in()) {
            $menu_pages['login'] = array(
                'name' => 'login',
                'display_name' => _e('menuitem-login'),
                'slug' => 'menuitem-login',
                'site_url' => 'login',
                'permissions' => array()
            );
        }

        $menu_items = array();

        foreach($menu_pages as $item) {

            $menu_items[$item['name']] = $item;
        }

        return array_reverse($menu_items);
    }
}

/**
 * load_sidebar_menu_platform()
 *
 * Loads the page with the correct layout and output
 *
 * @param   array  $data
 * @return  void
 */

if(!function_exists('load_sidebar_menu_platform')) {

    function load_sidebar_menu_items_platform() {
        $ci = get_instance();

        $menu_pages = array(
            'dashboard' => array(
                'name' => 'dashboard',
                'display_name' => _e('menuitem-dashboard'),
                'slug' => 'menuitem-dashboard',
                'site_url' => 'platform/dashboard',
                'icon' => 'home',
                'permissions' => array(),
                'submenu' => array()
            ),
            'sisters' => array(
                'name' => 'sisters',
                'display_name' => _e('menuitem-sisters'),
                'slug' => 'menuitem-sisters',
                'site_url' => 'platform/sisters',
                'icon' => 'user',
                'permissions' => array(),
                'submenu' => array(
                    'my-sisters' => array(
                        'name' => 'my-sisters',
                        'display_name' => _e('menuitem-sisters-sub-my-sisters'),
                        'slug' => 'menuitem-my-sisters',
                        'site_url' => 'platform/sisters',
                        'permissions' => array()
                    ),
                    'add' => array(
                        'name' => 'add',
                        'display_name' => _e('menuitem-sisters-sub-add'),
                        'slug' => 'menuitem-add',
                        'site_url' => 'platform/sisters/add',
                        'permissions' => array()
                    )
                )
            ),
            'users' => array(
                'name' => 'users',
                'display_name' => _e('menuitem-users'),
                'slug' => 'menuitem-users',
                'site_url' => 'platform/users',
                'icon' => 'users',
                'permissions' => array('view_all_users'),
                'submenu' => array(
                    'all' => array(
                        'name' => 'all-users',
                        'display_name' => _e('menuitem-users-sub-all-users'),
                        'slug' => 'menuitem-all-users',
                        'site_url' => 'platform/users/',
                        'permissions' => array()
                    )
                )
            )
        );

        $menu_items = array();

        foreach($menu_pages as $item) {
            if(has_permissions($item['permissions'])) {
                $menu_items[$item['name']] = $item;
            }
        }

        //print_r($ci->session->userdata());

        return array_reverse($menu_items);
    }
}

/**
 * load_settings_menu_platform()
 *
 * Loads the user settings menu items
 *
 * @return  void
 */

if(!function_exists('load_user_menu_items_platform')) {

    function load_user_menu_items_platform() {
        $ci = get_instance();

        $menu_pages = array(
            'profile' => array(
                'name' => 'profile',
                'display_name' => _e('menuitem-profile'),
                'slug' => 'menuitem-profile',
                'site_url' => 'platform/user',
                'icon' => 'user',
                'permissions' => array()
            ),
            'usersettings' => array(
                'name' => 'usersettings',
                'display_name' => _e('menuitem-usersettings'),
                'slug' => 'menuitem-usersettings',
                'site_url' => 'platform/user/settings',
                'icon' => 'cog',
                'permissions' => array()
            ),
            'logout' => array(
                'name' => 'logout',
                'display_name' => _e('menuitem-logout'),
                'slug' => 'menuitem-logout',
                'site_url' => 'logout',
                'icon' => 'sign-out-alt',
                'permissions' => array()
            )
        );

        $menu_items = array();

        foreach($menu_pages as $item) {
            if(has_permissions($item['permissions'])) {
                $menu_items[$item['name']] = $item;
            }
        }

        return $menu_items;
    }
}

/**
 * modal_add()
 *
 * Adds a model to the modal queue
 *
 * @param   array  $data
 * @return  void
 */

$modal_requests = array();

if(!function_exists('modal_add')) {

    function modal_add(string $title, string $name, string $type, int $displayTime, string $message) {
        $ci = get_instance();

        $modal_requests = $ci->config->item('modal_requests');
        $modal_requests[] = array($title, $name, $type, $displayTime, $message);
        $ci->config->set_item('modal_requests', $modal_requests);
    }

    function modals_show() {
        $ci = get_instance();

        $modal_requests = $ci->config->item('modal_requests');

        foreach($modal_requests as $modal) {
            $title = $modal[0];
            $name = $modal[1];
            $type = $modal[2];
            $displayTime = $modal[3];
            $message = $modal[4];
            ?><script defer="defer">addModal('<?= "$title', '$name', '$type', '$displayTime', '$message" ?>');</script><?php
        }
    }
}
