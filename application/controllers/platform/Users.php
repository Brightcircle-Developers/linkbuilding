<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Users extends LB_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function users() {
        //Load models
        $this->load->model('user_model');

        //Check if user is logged in
        if(!user_logged_in()) {
            //Redirect user
            redirect('login');
        }

        //Form results
        $this->user_model->user_add();

        //Modal data
        $data['userlevels'] = $this->user_model->get_levels();
        $data['userlevels_form'] = $this->user_model->get_levels_dropdown_options($data['userlevels']);

        //Set page
        $view = 'users/users';
        $subview = 'users';
        $page = 'users';

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
