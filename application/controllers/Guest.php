<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Guest extends LB_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function home() {
        //Set page
        $view = 'home';
        $page = 'home';

        //Set controller
        $data['controller'] = 'guest';

        //Set public configuration
        $data['theme'] = 'guest';
        $data['title'] = _e('page-'.$page);
        $data['menu_items_header'] = load_header_menu_items_public();
        $data['view'] = $view;
        $data['page'] = $page;

        //Load page
        load_page($data);
    }

    public function sisters() {
        //Load models
        $this->load->model('sisters_model');

        //Set page
        $view = 'sisters';
        $page = 'sisters';

        //Set controller
        $data['controller'] = 'guest';

        //Model data
        $data['sisters'] = $this->sisters_model->get_sisters_index();


        //Set public configuration
        $data['theme'] = 'guest';
        $data['title'] = _e('page-'.$page);
        $data['menu_items_header'] = load_header_menu_items_public();
        $data['view'] = $view;
        $data['page'] = $page;

        //Load page
        load_page($data);
    }

    public function login() {
        //Load models
        $this->load->model('login_model');

        //Form results
        $this->login_model->user_login();

        //Check if user is logged in
        if(user_logged_in()) {
            //Redirect user
            redirect('home');
        }

        //Set page
        $view = 'login';
        $page = 'login';

        //Set controller
        $data['controller'] = 'guest';

        //Set public configuration
        $data['theme'] = 'guest';
        $data['title'] = _e('page-'.$page);
        $data['menu_items_header'] = load_header_menu_items_public();
        $data['view'] = $view;
        $data['page'] = $page;

        //Load page
        load_page($data);
    }

    public function logout() {

        //Check if user is logged in
        if(!user_logged_in()) {
            //Redirect user
            redirect('home');
        }

        //Modal functions
        logout_user();

        //Load page
        redirect('home');
    }

    public function register() {
        //Load models
        $this->load->model('login_model');

        //Model data
        $this->login_model->user_register();

        if(user_logged_in()) {
            redirect('home');
        }

        //Set page
        $view = 'register';
        $page = 'register';

        //Set controller
        $data['controller'] = 'guest';

        //Set public configuration
        $data['theme'] = 'guest';
        $data['title'] = _e('page-'.$page);
        $data['menu_items_header'] = load_header_menu_items_public();
        $data['view'] = $view;
        $data['page'] = $page;

        //Load page
        load_page($data);
    }
}
