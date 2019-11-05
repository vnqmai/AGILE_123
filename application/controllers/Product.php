<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */

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

class Product extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model');
        // $this->load->model('Bill_detail_model');
         $this->load->library('upload');
    } 
    /*
     * Listing of product
     */
    function index()
    {
        $data['product'] = $this->Product_model->get_all_product();
        
        $data['_view'] = 'product/index';
        $this->load->view('layouts/main',$data);
    }
    
    function add()
    {   
        $this->form_validation->set_rules('name',"name",'required');
        $this->form_validation->set_rules('price',"price",'required');
        if($this->form_validation->run())
        {
        //     $config['upload_path'] = './upload';
        // $config['allowed_types'] = 'gif|jpg|png';
        //     $config['max_size'] = 2000;
        //     $config['max_width'] = 1500;
        //     $config['max_height'] = 1500;

        //     $this->load->library('upload', $config);
        // $this->upload->do_upload('upload');
            if(isset($_FILES["image"]["name"]))  
            { 
                $config['upload_path'] = './public/images/';  
                $config['allowed_types'] = 'gif|jpg|png|jpeg';  
                $config['overwrite'] = true;  
                // debug($_SESSION['user']); exit;
                //$new_name = 'name_file';
                $new_name  = 'file_name'.date('Ymd') . substr(microtime(), 2, 4) . md5(uniqid('', true));
                $config['file_name'] = $new_name;
                $this->load->library('upload');
                $this->upload->initialize($config); 
                
                if($this->upload->do_upload('image'))  
                {  
                    $info = $this->upload->data();  
                    $data =  "public/images/".$info['file_name'];
                    $params = array(
                        'name' => $this->input->post('name'),
                        'price' => $this->input->post('price'),
                        'status' => $this->input->post('status'),
                        'description' => $this->input->post('description'),
                        'image' => $data,
                        'id'            => ObjectId()
                    );
                    //debug($data); exit;
                     $product_id = $this->Product_model->add_product($params);
                }
            }
            return redirect(base_url().'product');
        }
        else
        {                   
            $data['_view'] = 'product/add';
            $this->load->view('layouts/main',$data);
        }   
    }  

    function edit($id)
    {   
        $this->form_validation->set_rules('name',"name",'required');
        $this->form_validation->set_rules('price',"price",'required');
        // check if the product exists before trying to edit it
        $data['product'] = $this->Product_model->get_product($id);
        
        if(isset($data['product']['id']))
        {
            if($this->form_validation->run()) 
            {   
                $params = array(
                    'name' => $this->input->post('name'),
                    'price' => $this->input->post('price'),
                    'status' => $this->input->post('status'),
                    'description' => $this->input->post('description'),
                );

                $this->Product_model->update_product($id,$params);            
                return redirect(base_url().'product');

            }
            else
            {
                $data['_view'] = 'product/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The product you are trying to edit does not exist.');
    }

    function remove($id)
    {                
        $product = $this->Product_model->get_product($id);
          // check if the product exists before trying to delete it
        try{
            if(isset($product['id']))
            {
                $params = array(
                    'del' => 1,
                );
                $this->Product_model->update_product($id,$params);   
                return $this->Success(array(
                        'message' => 'Xóa thành công!'
                    ));
                // return redirect(base_url().'classes');
            }
            throw new Exception('Không tìm thấy hàng hóa');
        }
        catch(Exception $e){
            return $this->Success(array(
                'isSuccess' => false,
                'message' => $e->getMessage()
            ));
        }
        
    }

    function details($id){
        $data['product'] = $this->Product_model->get_product($id);
        
        $data['_view'] = 'product/details';
        $this->load->view('layouts/main',$data);        
    }
    
}