<?php

session_start();
if(isset($_SESSION["isadmin"])){
    if($_SESSION["isadmin"]!=1){
        header('Location: localhost/agile/auth');
        exit();
    }        
}
else if (!isset($_SESSION["isadmin"])){
    header('Location: http://'.$_SERVER['HTTP_HOST'].'/agile/auth');
    exit();
}   

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

    
    function add()
    {   
        $this->form_validation->set_rules('totalPrice',"totalPrice",'required');
        if($this->form_validation->run())
        {
            $params = array(
                'userId' => $_SESSION['user']->id,
                'totalPrice' => $this->input->post('totalPrice'),
				'status' => $this->input->post('status'),
                'description' => $this->input->post('description'),
                'timestamp' =>date('Y-m-d H:i:s'),
                'id'            => ObjectId()
            );
        
            $bill_id = $this->Order_bill_model->add_bill($params);
            return redirect(base_url().'bill/index');
        }
        else
        {                   
            $data['user'] = $this->User_model->get_all_users();
            $data['_view'] = 'order_bill/add';
            $this->load->view('layouts/main',$data);
        }
        
    }  

    /*
     * Editing a bill
     */
    function edit($id)
    {   
        $this->form_validation->set_rules('totalPrice',"totalPrice",'required');
       
        // check if the bill exists before trying to edit it
        $data['bill'] = $this->Order_bill_model->get_bill($id);
        
        if(isset($data['bill']['id']))
        {
            if($this->form_validation->run())    
            {   
                $params = array(
                    'totalPrice' => $this->input->post('totalPrice'),
					'userId' => $_SESSION['user']->id,
					'status' => $this->input->post('status'),
                    'description' => $this->input->post('description'),
                    'timestamp' =>date('Y-m-d H:i:s'),
                );

                $this->Order_bill_model->update_bill($id,$params);            
                return redirect(base_url().'bill/index');
            }
            else
            {
                $data['user'] = $this->User_model->get_all_users();
                $data['_view'] = 'order_bill/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The bill you are trying to edit does not exist.');
    } 

    function remove($id)
    {
        $bill = $this->Order_bill_model->get_bill($id);
        // check if the class exists before trying to delete it
        try{
            if(isset($bill['id']))
            {
               $params = array(
                    'del' => 1,
                );
                $this->Order_bill_model->update_bill($id,$params);           
                return $this->Success(array(
                        'message' => 'Xóa thành công!'
                    ));
                // return redirect(base_url().'classes');
            }
            throw new Exception('Không tìm thấy hóa đơn!');
        }
        catch(Exception $e){
            return $this->Success(array(
                'isSuccess' => false,
                'message' => $e->getMessage()
            ));
        }
        
    }

    function add_order_bill()
    {   
        if(isset($_POST) && count($_POST) > 0){
                $dt=$_POST['data'];
            
                $totalPrice=0;
                foreach($dt as $key=>$item){
                    if($item['Amount']){
                        $totalPrice+= $item['Amount']*$item['Price'];
                    }
                }
               
                    $bill_Id=ObjectId();
                    $params = array(
                        'userId' => $_SESSION['user']->id,
                        'totalPrice' => $totalPrice,
                        'timestamp' =>date('Y-m-d H:i:s'),
                        'id'            =>  $bill_Id
                    );       
                    $bill_id = $this->Order_bill_model->add_bill($params);
                    foreach($dt as $key=>$item){
                         if($item['Amount']){
                        $params = array(
                            'amount' => $item['Amount'],
                            'productId' =>  $item['id'],
                            'bill_id' => $bill_Id,
                            'id'            => ObjectId()
                        );
                        
                        $bill_detail_id = $this->Bill_detail_model->add_bill_detail($params);
                    }
                    }

                    return $this->Success(array(
                        'message' => 'Thành công!'
                    ));
         
        }
        return $this->Success(array(
            'isSuccess' =>false,
            'message' =>'Thất bại!'
        ));
        
    }    
}