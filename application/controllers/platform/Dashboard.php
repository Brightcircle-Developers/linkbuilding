<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends LB_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function dashboard() {
        //Check if user is logged in
        if(!user_logged_in()) {
            //Redirect user
            redirect('login');
        }

        //Set page
        $view = 'dashboard';
        $subview = 'dashboard';
        $page = 'dashboard';

        //Set controller
        $data['controller'] = 'platform';

        //Set public configuration
        $data['theme'] = 'platform';
        $data['title'] = _e('page-title-'.$page);
        $data['menu_items_sidebar'] = load_sidebar_menu_items_platform();
        $data['menu_items_user'] = load_user_menu_items_platform();
        $data['view'] = $view;
        $data['subview'] = $subview;
        $data['page'] = $page;

        //Load page
        load_page($data);
    }
}
