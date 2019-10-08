
      
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                        <a class="btn btn-primary btn-raised pull-right waves-effect m-t--10" data-toggle="tooltip" data-original-title="Quay lại"  onclick=" window.history.back();">
                                <i class="material-icons">keyboard_backspace</i> 
                            </a>
                            <h2>SỬA NHÂN VIÊN</h2>
                           
                        </div>
								
                        <div class="body">
                        
                            <form id="form_advanced_validation" method="POST">
                            <div class="row">
                            
                             <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">

                                <div class="form-group form-float">
                                <label class="form-label">Tài khoản</label>
                                    <div class="form-line">
									<input type="text" class="form-control" placeholder="Tài khoản" name="username" value="<?=$user['username']?>" required disabled>

                                       
                                    </div>
                                </div>
							</div>
							<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">

								<div class="form-group form-float">
								<label class="form-label">Họ</label>
									<div class="form-line">
									<input type="text" class="form-control" placeholder="Họ nhân viên" name="firstName" value="<?=$user['firstName']?>" required>

									
									</div>
								</div>
								</div>
								<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">

								<div class="form-group form-float">
								<label class="form-label">Tên</label>
									<div class="form-line">
									<input type="text" class="form-control" placeholder="Tên nhân viên" name="lastName" value="<?=$user['lastName']?>" required>

									
									</div>
								</div>
								</div>
								<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">

								<div class="form-group form-float">
								<label class="form-label">Email</label>
									<div class="form-line">
									<input type="email" class="form-control" placeholder="Email" name="email" value="<?=$user['email']?>" required>

									
									</div>
							
								</div>

								</div>
								<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">

								<div class="form-group form-float">
								<label class="form-label">Số điện thoại</label>
									<div class="form-line">
									<input type="number" class="form-control" placeholder="Số điện thoại" name="phone" value="<?=$user['phone']?>"  >

									
									</div>
							
								</div>

								</div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">

                                <div class="form-group form-float">
                                <label class="form-label">Mật khẩu</label>
                                    <div class="form-line">
									<input type="password" class="form-control" placeholder="Mật khẩu (Để trống nếu không thay đổi)" name="password" id="password" >

                                       
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">

                                <div class="form-group form-float">
                                <label class="form-label">Xác nhân mật khẩu</label>
                                    <div class="form-line">
                                    <input type="password" class="form-control" placeholder="Xác nhận mật khẩu (Để trống nếu không thay đổi)" name="confirmPassword"  id="confirmPassword" >

									
									</div>
									<span id='message'></span>
                                </div>

                                </div>
                          
                                <button class="btn btn-primary waves-effect btn-block" type="submit">LƯU</button>
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

           
      
   
    



												