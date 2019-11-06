
       
           
           
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                        <a href="<?=base_url()?>" class="btn btn-primary btn-raised waves-effect m-t--10" data-toggle="tooltip" data-original-title="Quay lại"  >
                                <i class="material-icons">keyboard_backspace</i> 
                            </a>
                            <a href="<?=base_url()?>bill_detail/add/<?=$bill['id']?>" class="btn btn-primary btn-raised pull-right waves-effect m-t--10"  data-toggle="tooltip" data-original-title="Thêm">
                                <i class="material-icons">add</i> 
														</a>
														<a  class="btn btn-danger btn-raised pull-right waves-effect m-t--10" onclick="btnCheck('<?= $bill['timestamp'] ?> ');" data-toggle="tooltip" data-original-title="Xóa">
							<i class="material-icons">delete</i>
						</a>
                        <a onclick="checkAll();" class="btn btn-success btn-raised pull-right waves-effect m-t--10"   data-toggle="tooltip" data-original-title="Chọn tất cả">
                        	<i class="material-icons">select_all</i> 
                        </a>
                            <h2>CHI TIẾT ĐƠN ĐẶT HÀNG NGÀY:<?=date("d/m/Y H:i:s", strtotime($bill['timestamp'])) .' '.'Người đặt:'.$bill['firstName'].' '.$bill['lastName']?></h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="exportables">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Sản phẩm</th>
                                            <th>Số lượng</th>
                                            <th>Tổng tiền</th>
																						<th>Tình trạng</th>
																						<th>Mô tả</th>
                                            <th>Tác vụ</th>
                                            
                                         
                                           
                                        </tr>
                                    </thead>
                                   
                                    <tbody> 
                                       
                                        
                                        <?php  

                                        foreach ($bill_detail as $key=>$c){?>
                                        <tr>
                                       <td><?= $key+1 ?></td>
																				<td><?= $c['productName']?></td>
																				<td><?= $c['amount']?></td>
                                                                                <td><?= number_format($c['price']*$c['amount'])?></td>
                                        <td> <?= $c['status']?></td>
																				<td><?= $c['description']?></td>
										
											
                                            
                                            <td class='text-center'>  

                                            <input type="checkbox" class="form-check-input cb" id="<?=$c['id']?>">
																						<label class="form-check-label"  for="<?=$c['id']?>">Chọn</label>
                                             </td>
											 </tr>
                                        <?php
                                        }
                                         ?>
                                       
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
           
            <!-- #END# Exportable Table -->
        </div>
    

<script>
    function checkAll(){
        var self = this;
        var data = [];
        var dt = $("#exportables").find('.cb');
        dt.each(function(key,value){
            value.checked=true;
              
            
        });
    }
</script>
<script>
function btnCheck(bill_id){
        var self = this;
        var data = [];
        if(bill_id == null || bill_id == '')
            return;
        var dt = $("#exportables").find('.cb');
        dt.each(function(key,value){
            if(value.checked){
                data.push({id:value.id});
            }
        });

        if(data.length > 0){
            swal({
                title: "Xóa sản phẩm khỏi hóa đơn " ,
                text: "Bạn chắc chắn muốn xóa sản phẩm này?",
                type: "info",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Có",
                cancelButtonText: "Không",
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            },function(){
            $.post(
                '<?=base_url()?>bill_detail/remove/',
                {
                    data: data,
                    bill_id: bill_id
				
                },function(result){
                    swal({  
                            title: 'THÔNG BÁO',
                            type: result.isSuccess == true ? 'success' : 'error',
                            text: result.message
                        }, function() {
                            if(result.isSuccess == true){
                            window.location.reload();
                            }
                        });
                    
                   
               
                }
            );
            });
            

        }
    }
</script>