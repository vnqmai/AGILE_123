<?php 
$this->load->view('layouts/header');
?>

<div class="signup-box">    
    <div class="card">
        <?php if(!empty($message)) {	?>
			<script>
				alert('<?= $message ?>')
			</script>
		<?php $message=""; } ?>
        <div class="body">
        <div class="logo text-center">TẠO TÀI KHOẢN</div>
            <form id="form_advanced_validation" method="POST">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group form-float">
                            <label class="form-label">Tài khoản</label>
                                <div class="form-line">
									<input type="text" class="form-control" placeholder="Tài khoản" name="username" required> 
                                </div>
                        </div>
					</div>
					<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
						<div class="form-group form-float">
							<label class="form-label">Họ</label>
								<div class="form-line">
									<input type="text" class="form-control" placeholder="Họ" name="firstName" required>
								</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
						<div class="form-group form-float">
							<label class="form-label">Tên</label>
								<div class="form-line">
									<input type="text" class="form-control" placeholder="Tên" name="lastName" required>
								</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
						<div class="form-group form-float">
							<label class="form-label">Email</label>
								<div class="form-line">
									<input type="email" class="form-control" placeholder="Email" name="email" required>
								</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
						<div class="form-group form-float">
							<label class="form-label">Số điện thoại</label>
								<div class="form-line">
									<input type="number" class="form-control" placeholder="Số điện thoại" name="phone"  >
								</div>
						</div>
					</div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group form-float">
                            <label class="form-label">Mật khẩu</label>
                                <div class="form-line">
									<input type="password" class="form-control" placeholder="Mật khẩu" name="password" id="password" required>
                                </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group form-float">
                            <label class="form-label">Xác nhận mật khẩu</label>
                                <div class="form-line">
                                    <input type="password" class="form-control" placeholder="Xác nhận mật khẩu" name="confirmPassword"  id="confirmPassword" required>
								</div>
							<span id='message'></span>
                       	</div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    </div>
                        <button class="btn btn-primary waves-effect btn-block" type="submit">ĐĂNG KÝ</button>
            </form>
        </div>
        </div>
    </div>
</div>

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
		</script>									
	</body></html>