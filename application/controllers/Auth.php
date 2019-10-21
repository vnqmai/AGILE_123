<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->model('User_model');
        // $this->load->model('User_active_model');
    } 
    public function Success($ar = array(
        'isSuccess' => true,
        'message'   => "Thành công",
        'data'      => null
    )){
        $dt = array(
            'isSuccess' => $ar['isSuccess'] ?? true,
            'message' =>$ar['message'] ?? "Thành công",
            'data' => $ar['data'] ?? null
        );
        return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($dt));
    }
	public function index()
	{
        $returnUrl = $_GET['returnUrl'] ?? "";
        $data['returnUrl'] = base_url().$returnUrl;
		$this->load->view('auth/login',$data);
	
    }
    public function resetPassword($id=null)
	{
        
        $data['id'] = $id;
		$this->load->view('auth/resetPassword',$data);
	
    }
    public function logout()
	{
        $sessionId=session_id();
        
        if($_SESSION["isadmin"]==1){
            $_SESSION["isadmin"] = 0;                                
         }

        session_destroy();
        return redirect(base_url().'auth');
    }
    public function forgetPassword(){
        $this->load->view('auth/forgetPassword');
    }
    function SendEmail(){
        if(isset($_POST)){
            try{
                $email = $this->input->post("email");
                if(!empty($email)){

                    $email=$this->User_model->get_user_by_email($email);
                    
                    if($email != null){
                        $email = (object)$email;


                    
                    $config = Array(
                        'protocol' => 'smtp',
                        'smtp_host' => 'ssl://smtp.googlemail.com',
                        'smtp_port' => 465,
                        'smtp_user' => 'fpohcmue@gmail.com', // change it to yours
                        'smtp_pass' => 'quangtientran1997', // change it to yours
                        'mailtype' => 'html',
                        'charset' => 'utf-8',
                        'wordwrap' => TRUE
                      );
                      ;
                            $this->load->library('email', $config);
                            $this->email->set_newline("\r\n");
                            $this->email->from('fpohcmue@gmail.com'); // change it to yours
                            $this->email->to($email->email);// change it to yours
                            $this->email->subject('Reset password');
                            $this->email->message("Bấm vào đây để thay đổi mật khẩu:".base_url()."Auth/resetPassword/".$email->id);
                            if($this->email->send())
                           {
                            return $this->output
                            ->set_content_type('application/json')
                            ->set_output(json_encode(array(
                                    'isSuccess' => true,
                                    'message' =>"Bạn vui lòng kiểm tra email!",
                                    "data" => null
                            )));

                           }
                           else
                          {
                           show_error($this->email->print_debugger());
                          }
                    }
                }
                throw new Exception("Email không đúng");
            }
            catch(Exception $e){
                return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array(
                        'isSuccess' => false,
                        'message' =>$e->getMessage()
                )));
            }
        }
             

    }
	function Login(){
        if(isset($_POST) && count($_POST) > 0){
            try{
                $username = $this->input->post("username");
                $password = $this->input->post("password");
                 if(!empty($username) && !empty($password)){
                    $user = $this->User_model->get_user_by_username($username);
                    if($user != null){
                        $user = (object)$user;
                         if($user->password == MD5($password)){

                            //success as admin
                             if($user->username=='admin'){
                                $_SESSION["isadmin"] = 1;                                
                             }
                             
                            //success as member

                            $_SESSION["user"] = $user;
                           
                            return $this->output
                            ->set_content_type('application/json')
                            ->set_output(json_encode(array(
                                    'isSuccess' => true,
                                    'message' =>"Đăng nhập thành công",
                                    "data" => null
                            )));
                        }
                        else return $this->output
                        ->set_content_type('application/json')
                        ->set_output(json_encode(array(
                                'isSuccess' => false,
                                'message' =>"Tài khoản hoặc mặt khẩu không đúng!",
                                "data" => null
                        )));
                      
                    }
                   else return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array(
                        'isSuccess' => false,
                        'message' =>"Tài khoản hoặc mặt khẩu không đúng!",
                        "data" => null
                )));
                 }
                
            }
            catch(Exception $e){
                return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array(
                        'isSuccess' => false,
                        'message' =>$e->getMessage()
                )));
            }
        }
    }

    function editPassword($id)
    {
        try{
        $user = $this->User_model->get_user($id);
       
      
        if(isset($user['id']))
        {
            $params = array(
                'password' => $this->input->post('password')
            );
            $this->User_model->update_user($id,$params);         
            return $this->Success(array(
                'message' => 'thay đổi thành công!'
            ));
    
           
        }
      
        return $this->Success(array(
            'isSuccess' =>false,
            'message' =>'Không tìm thấy tài khoản!'
        ));
       
    }
    catch(Exception $e){
        return array(
            'isSuccess' => false,
            'message' => $e->getMessage()
        );
    }
    }
}
