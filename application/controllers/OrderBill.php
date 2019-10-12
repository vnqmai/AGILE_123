<?php
 
class OrderBill extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Order_bill_model');
        $this->load->model('Bill_detail_model');
        $this->load->model('User_model');
    } 

    
    function index()
    {
        $data['order_bill'] = $this->Order_bill_model->get_all_bill();
        $data['_view'] = 'order_bill/index';
        $this->load->view('layouts/main',$data);
    }

}