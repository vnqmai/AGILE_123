<?php 
    function ObjectId() {
        $time = time();
        $machineId = php_uname('n');
        $pid = getmypid();
        $counter = $time;

        // Building binary data.
        $bin = sprintf(
            "%s%s%s%s",
            pack('N', $time),
            substr(md5($machineId), 0, 3),
            pack('n', $pid),
            substr(pack('N', rand(0, 2E9)), 1, 3)
        );

        // Convert binary to hex.
        $result = '';
        for ($i = 0; $i < 12; $i++) {
            $result .= sprintf("%02x", ord($bin[$i]));
        }
        return $result;
    }
    
    function color($key){
        switch(($key%5)){
            case 0:
                return 'green';
            case 1:
                return 'red';
            case 2:
                return 'blue';
            case 3:
                return 'black';
            default:
                return 'pink';
        }
    }

    function pay($key){
        switch(($key)){
            case 0:
                return 'tiền mặt';
            default:
                return 'qua thẻ';
        }
    }
   
     function authPermission($class,$method){
        $class = strtolower($class);
        if ($method==1){
            return (isset($_SESSION['listPermission'][$class])) == true;
        }
        $method = strtolower($method);
       
        return (isset($_SESSION['listPermission'][$class]) && in_array($method,$_SESSION['listPermission'][$class])) == true;
        // return true;
    }

    function startsWith($haystack, $needle)
    {
        $length = strlen($needle);
        return (substr($haystack, 0, $length) === $needle);
    }

    function endsWith($haystack, $needle)
    {
        $length = strlen($needle);
        if ($length == 0) {
            return true;
        }

        return (substr($haystack, -$length) === $needle);
    }

    function isSelected($name = '') {
        if(isset($_SESSION['navi']) && strpos($_SESSION['navi'], $name) !== FALSE) {
            return 'active';
        } else {
            return '';
        }
    }
    
  
    
    function isAdmin($class,$func) //$_SESSION['listPermission'] là 1 object các array của các class name controller trong hệ thống, mỗi array class name chứa 1 array function name nằm trong class đó. Được lưu dưới dạng json 
	{
        
        if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == true && isset($_SESSION["token"])){ // kiểm tra có phải là admin 
            $flag = 0;
            if(isset($_SESSION['listPermission'][$class])){ // kiểm tra quyền của user này có quyền truy cập vào controller [class]
                if(in_array($func,$_SESSION['listPermission'][$class])) $flag =1;  // kiểm tra quyền của user này có tồn tại để sử dụng function 
            }
            if($flag != 1){
                // $noti = array(
                //     'icon' => 'glyphicon glyphicon-remove',
                //     'title' => "",
                //     'message' => "Bạn không có quyền truy cập vào chức năng này!",
                //     'url' => "javascript:void(0)",
                //     'type' => 'warning'
                // );
                // $_SESSION["THONGBAO"]=$noti;
                redirect('/admin/page/noPermission'); // nếu không tồn tại redirect ra trang không 403
            }
            //
            ///$listPermission['data'] = abcxyz
            $_SESSION['listPermission'] = $listPermission['data']; /// cập nhật lại permission của users
            return;
        }
        else{
            // $noti = array(
            //     'icon' => 'glyphicon glyphicon-remove',
            //     'title' => "",
            //     'message' => "Bạn không có quyền truy cập vào hệ thông!",
            //     'url' => "javascript:void(0)",
            //     'type' => 'warning'
            // );
            // $_SESSION["THONGBAO"]=$noti;
            redirect('/');
        }
    }

    function months()
    {
       $month=array('1','2','3','4','5','6','7','8','9','10','11','12');
    
        return $month;

    }

    function debug($arr)
    {
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
    }

    
       