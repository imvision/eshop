<?php
class Products extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('products_model');
                $this->load->helper('url_helper');
        }

        public function index()
        {
                $data['products'] = $this->products_model->get_products();
                $data['title'] = 'Store';

                $this->load->view('templates/header', $data);
                $this->load->view('products/index', $data);
                $this->load->view('templates/footer');
        }

        public function view($slug = NULL)
        {
                $data['products_item'] = $this->products_model->get_products($slug);

                if (empty($data['products_item']))
                {
                        show_404();
                }

                $data['title'] = $data['products_item']['title'];

                $this->load->view('templates/header', $data);
                $this->load->view('products/view', $data);
                $this->load->view('templates/footer');
        }
}