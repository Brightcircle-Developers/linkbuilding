<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Sisters extends LB_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function sisters() {
        //Load models
        $this->load->model('sisters_model');

        //Check if user is logged in
        if(!user_logged_in()) {
            //Redirect user
            redirect('login');
        }

        //Set page
        $view = 'sisters/sisters';
        $subview = 'my-sisters';
        $page = 'sisters';

        //Set controller
        $data['controller'] = 'platform';

        //Model data
        $data['sisters'] = $this->sisters_model->get_sisters();

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

    public function add() {
        //Load models
        $this->load->model('sisters_model');

        //Check if user is logged in
        if(!user_logged_in()) {
            //Redirect user
            redirect('login');
        }

        //Set page
        $view = 'sisters/add';
        $subview = 'add';
        $page = 'sisters';

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

    public function sister($sister_name_slug) {
        //Load models
        $this->load->model('sisters_model');

        //Model data
        $data['sister'] = $this->sisters_model->get_sister_name($sister_name_slug);

        //Check if user is logged in
        if(!user_logged_in()) {
            //Redirect user
            redirect('login');
        }
        elseif($data['sister']['user_id'] != $this->session->userdata('id')) {
            //Redirect user
            redirect('platform/sisters');
        }

        //Form results
        $this->sisters_model->topic_new($data['sister']['id']);

        //Model data
        $data['topics'] = $this->sisters_model->get_topics($data['sister']['id']);

        $data['topics_form'] = $this->sisters_model->get_topics_dropdown_options($data['topics']);

        $this->sisters_model->backlink_new($data['sister']['id'], $this->session->userdata('id'));

        //Set page
        $view = 'sisters/sister';
        $subview = 'sister';
        $page = 'sisters';

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
