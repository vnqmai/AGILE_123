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

    
    
}
