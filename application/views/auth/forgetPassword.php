<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Quên mật khẩu</title>
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

  <body class="fp-page">
  <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <div class="fp-box">
        
        <div class="card">
            <div class="body">
            <div class="logo text-center">
                <img style="width:50%;" src="https://scontent.fsgn2-1.fna.fbcdn.net/v/t1.0-9/17499315_768440406656216_6474561324556663273_n.jpg?_nc_cat=104&_nc_oc=AQnrlWHe3qH-59eJP_PayCG_XXw-triBm2L-WxPGlgJM-iQNyiYw-pOTvvD7r5p7M11e9PY31ha_9cj90gRcmf0o&_nc_ht=scontent.fsgn2-1.fna&oh=11429faaac0fc1b96a14754899907a41&oe=5D76E8D9" alt="">
            </div>
                <form id="forgot_password" method="POST"  onsubmit="return false">
                    <div class="msg">
                        Hệ thống sẽ gửi mật khẩu mới vào Email của bạn!
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" id="email" placeholder="Email" required autofocus>
                        </div>
                    </div>

                    <button class="btn btn-block btn-lg bg-blue waves-effect" type="submit" onclick="sendemail()">XÁC NHẬN</button>

                   
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="<?= base_url() ?>public/assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?= base_url() ?>public/assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?= base_url() ?>public/assets/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?= base_url() ?>public/assets/plugins/jquery-validation/jquery.validate.js"></script>
  
    <!-- Custom Js -->
    <script src="<?= base_url() ?>public/assets/js/admin.js"></script>
    <script src="<?= base_url() ?>public/assets/js/pages/examples/forgot-password.js"></script>

  <script>
    $(function(){
      $(document).ajaxStart(function() {
          $(".page-loader-wrapper").css({"display":"block"});
      });
      $(document).ajaxStop(function(){
          $(".page-loader-wrapper").css({"display":"none"});
      });
    });
      function sendemail(){
        var email =$("#email").val();
        
        if(!email){
          return;
        }
        else{
          $.post(
            '<?= base_url() ?>auth/sendemail',
            {
              email: email
            },function(result){
              $(".msg").html(result.message);
            }
          )
        }
      }
    </script>
  
  </body>

</html>