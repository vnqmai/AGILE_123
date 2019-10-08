<!DOCTYPE html>
<html>

<head>
    <title>Đặt món</title>
    <link rel="shortcut icon" type="image/png" href=""/>

    <?php include_once("header.php") ?>
</head>

<body class="nav-md">
<div class="container body">
      <div class="main_container">
    <!-- Page Loader -->
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
            <p>Vui lòng đợi chút xíu . . . </p>
        </div>
    </div>
    <!-- #END# Page Loader -->
   
	
	<div class="col-md-12" role="main">
        <?php	
        if(isset($_view) && $_view)
            $this->load->view($_view);
        ?>
	</div>
</div>	
	<?php include_once("footer.php") ?>
</body>

</html>




