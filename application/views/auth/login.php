<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Đăng nhập</title>
    <!-- Favicon-->
    <link rel="icon" href="https://scontent.fsgn2-1.fna.fbcdn.net/v/t1.0-9/17499315_768440406656216_6474561324556663273_n.jpg?_nc_cat=104&_nc_oc=AQnrlWHe3qH-59eJP_PayCG_XXw-triBm2L-WxPGlgJM-iQNyiYw-pOTvvD7r5p7M11e9PY31ha_9cj90gRcmf0o&_nc_ht=scontent.fsgn2-1.fna&oh=11429faaac0fc1b96a14754899907a41&oe=5D76E8D9" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?= base_url() ?>public/assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?= base_url() ?>public/assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?= base_url() ?>public/assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?= base_url() ?>public/assets/css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        
        <div class="card">
        
            <div class="body">
            <div class="logo text-center">
            ĐĂNG NHẬP
            </div>
                <form id="sign_in" method="POST" onsubmit="return false">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" id="username" placeholder="Tên đăng nhập" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" id="password" placeholder="Mật khẩu" required>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-xs-12">
                            <button id="myBtn" class="btn btn-block bg-blue waves-effect" type="submit" onclick="login()">Đăng nhập</button>
                        </div>
                    </div>
                    <div class="row m-t-0 m-b--0">
                        <div class="col-xs-12 align-right">
                            <a href="<?=base_url()?>Auth/createaccount">Tạo tài khoản</a>
                        </div>
                    </div>
                    <div class="row m-t-0 m-b--0">
                        <div class="col-xs-12 align-right">
                            <a href="<?=base_url()?>Auth/forgetPassword">Quên mật khẩu?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="<?=base_url()?>public/assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?=base_url()?>public/assets/plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
    <script src="<?=base_url()?>public/assets/js/common.js"></script>
    <script>
		function login(){
            var self = this;
			var username =$("#username").val();
			var password = $("#password").val();
			if(!username || !password){
				return;
			}
			else{
				$.post(
					'<?= base_url() ?>Auth/login',
					{
						username: username,
						password : password
					},function(result){
                        self.noti(result.message);
                        if(result.isSuccess){
                            window.location.href = "<?=$returnUrl?>";
                        }
					}
				)
			}
		}
        // document.getElementById('sign_in').addEventListener('keypress', function(event) {
        //     if (event.keyCode == 13) {
        //         event.preventDefault();
        //     }
        // });
	</script>
</body>

</html>