
       
           
           
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <a href="<?=base_url()?>product/add" class="btn btn-primary btn-raised pull-right waves-effect m-t--10"  data-toggle="tooltip" data-original-title="Thêm">
                                <i class="material-icons">add</i> 
                            </a>
                            <h2>DANH SÁCH SẢN PHẨM</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Giá bán</th>
                                            <th>Tình trạng</th>
                                            <th>Mô tả</th>
                                            <th>Tác vụ</th>
                                         
                                           
                                        </tr>
                                    </thead>
                                   
                                    <tbody> 
                                       
                                        
                                        <?php  

                                        foreach ($product as $key=>$c){?>
                                        <tr>
                                       <td><?= $key+1 ?></td>
                                        <td><?= $c['name']?></td>
                                        <td> <?= number_format($c['price'])?></td>
                                        <td> <?= $c['status']?></td>
                                        <td><?= $c['description']?></td>
										
											
                                            <td class='text-center'>  

                                            <a href="<?=base_url()?>product/details/<?=$c['id']?>" class="btn btn-primary btn-xs" data-toggle="tooltip" data-original-title="Chi tiết"><i class='material-icons' >details</i></a>
                                            <a href='<?=base_url()?>product/edit/<?= $c['id']?>' class="btn btn-warning btn-xs" data-toggle="tooltip"  data-original-title="Sửa"><i class='material-icons' >edit</i></a>
                                            <a  onclick="onDelete('<?= $c['id']?>','<?= $c['name']?>')" class="btn btn-danger btn-xs" data-toggle="tooltip" data-original-title="Xóa"><i class='material-icons' >delete</i></a>                                            
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
    function onDelete(id,name){
        var self = this;
        if(id){
            swal({
                title: "Xóa sản phẩm " + name,
                text: "Bạn chắc chắn muốn xóa sản phẩm này?",
                type: "info",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Có",
                cancelButtonText: "Không",
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            }, function() {
                $.post(
                    '<?=base_url()?>product/remove/'+id,
                
                    function(result){
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