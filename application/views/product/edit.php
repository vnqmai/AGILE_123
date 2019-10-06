                <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                        <a class="btn btn-primary btn-raised pull-right waves-effect m-t--10" data-toggle="tooltip" data-original-title="Quay lại"  onclick=" window.history.back();">
                                <i class="material-icons">keyboard_backspace</i> 
                            </a>
                            <h2>SỬA SẢN PHẨM</h2>
                           
                        </div>
								
                        <div class="body">
                        
                            <form id="form_advanced_validation" method="POST">
                            <div class="row">
                            
                             <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">

                                <div class="form-group form-float">
                                <label class="form-label">Tên</label>
                                    <div class="form-line">
									<input type="text" class="form-control" placeholder="Tên sản phẩm hóa" name="name" value="<?=$product['name']?>" required>                                 
                                    </div>
                                </div>
							</div>

							
							<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">

								<div class="form-group form-float">
								<label class="form-label">Giá bán</label>
									<div class="form-line">
									<input type="number" class="form-control" placeholder="Giá bán" name="price" value="<?=$product['price']?>" required>							
									</div>
								</div>
								</div>
								
								
								<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">

								<div class="form-group form-float">
								<label class="form-label">Tình trạng</label>
									<div class="form-line">
									<input type="text" class="form-control" placeholder="Tình trạng" name="status" value="<?=$product['status']?>" >
								
									</div>
							
								</div>

								</div>
								<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">

								<div class="form-group form-float">
								<label class="form-label">Mô tả</label>
									<div class="form-line">
									<input type="text" class="form-control" placeholder="Mô tả" name="description" value="<?=$product['description']?>" >

									
									</div>
							
								</div>

								</div>	
                             </div>
                                <button class="btn btn-primary waves-effect btn-block" type="submit">LƯU</button>
                            </form>
                        </div>
                    </div>
                </div>
			</div>												