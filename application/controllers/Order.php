<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */

class Order extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->model('Bill_detail_model');
        $this->load->model('Order_bill_model');
        session_start();
    } 
     

    /*
     * Listing of product
     */
    function index()
    {
        $data['product'] = $this->Product_model->get_all_product();
        
        $data['_view'] = 'dashboard';
        $this->load->view('userlayouts/main',$data);
    }

    function billDetail()
    {
        $bill_latest = $this->Order_bill_model->get_bill_latest_by_user_id($_SESSION['user']->id);
        $data['bill_detail'] = $this->Bill_detail_model->get_all_bill_detail_by_user_id($bill_latest['id'],$_SESSION['user']->id);
        // debug($data['bill_detail']); exit;
        $data['bill'] = $this->Order_bill_model->get_bill($bill_latest['id']);
        $data['_view'] = 'bill_detail/bill_detail';
        $this->load->view('userlayouts/main',$data);
        // $this->load->view('layouts/main',$data);
    }

    
    
}
