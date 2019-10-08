<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Thay đổi mật khẩu</title>
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
    <link href="<?=base_url()?>public/assets/js/sweetalert.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?= base_url() ?>public/assets/css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        
        <div class="card">
        
            <div class="body">
            <div class="logo text-center">
                <img style="width:50%;" src="https://scontent.fsgn2-1.fna.fbcdn.net/v/t1.0-9/17499315_768440406656216_6474561324556663273_n.jpg?_nc_cat=104&_nc_oc=AQnrlWHe3qH-59eJP_PayCG_XXw-triBm2L-WxPGlgJM-iQNyiYw-pOTvvD7r5p7M11e9PY31ha_9cj90gRcmf0o&_nc_ht=scontent.fsgn2-1.fna&oh=11429faaac0fc1b96a14754899907a41&oe=5D76E8D9" alt="">
            </div>
                <form id="sign_in" method="POST" onsubmit="return false">
                    <div class="input-group">
                        <span class="input-group-addon">
                        <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" id="password" placeholder="Mật khẩu mới" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" id="confirmPassword" placeholder="Xác nhận mật khẩu" required>
                        </div>
                        <span id='message'></span>
                    </div>
                    <div class="row">
                        
                        <div class="col-xs-12">
                            <button id="myBtn" class="btn btn-block bg-blue waves-effect" type="submit" onclick="resetPassword('<?=$id?>');">Xác nhận</button>
                        </div>
                    </div>
                  
                </form>
            </div>
        </div>
    </div>
    <script src="<?=base_url()?>public/assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?=base_url()?>public/assets/plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
    <script src="<?=base_url()?>public/assets/js/common.js"></script>
    <script src="<?=base_url()?>public/assets/js/sweetalert.min.js"></script>

    <script>
      

        $('#password, #confirmPassword').on('keyup', function () {
            if ($('#password').val() !='') {
                if ($('#password').val() == $('#confirmPassword').val()) {
                    $('#message').html('Xác nhận mật khẩu hợp lệ!').css('color', 'green');
                } else 
                    $('#message').html('Xác nhận mật khẩu không hợp lệ!').css('color', 'red');
            }
            else 
                    $('#message').html('Vui lòng nhập mật khẩu!').css('color', 'red');
            });

		function resetPassword(id){
            var self = this;
			var password =$("#password").val();
			var confirmPassword = $("#confirmPassword").val();
			if(!password || !confirmPassword||password!=confirmPassword){
				return;
			}
			else{
				$.post(
					'<?= base_url() ?>Auth/editPassword/'+id,
					{
						password : password
					},function(result){
                        swal({
                            title: 'THÔNG BÁO',
                            type: result.isSuccess == true ? 'success' : 'error',
                            text: result.message
                        }, function() {
                            location.reload();
                        });
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
