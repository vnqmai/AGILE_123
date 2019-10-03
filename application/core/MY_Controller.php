<?php 

class MY_Controller extends CI_Controller{
    function __construct()
    {
        parent::__construct();
    
    } 
    public function CheckPermission(){
        $this->load->model('User_model');
        $user = $this->User_model->get_user_by_username($_SESSION['user']->username);
        $_SESSION['listPermission'] = (array)json_decode(strtolower($user['function']));
        // debug($_SESSION['listPermission']);return;
        $class = strtolower($this->router->fetch_class());
        $method = strtolower($this->router->fetch_method());
        if(!(isset($_SESSION['listPermission'][$class]) && in_array($method,$_SESSION['listPermission'][$class]))){
            show_error("Bạn không có quyền truy cập trang này" , 403 );
        }
       return true;
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
    
    
}