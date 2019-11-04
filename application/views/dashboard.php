
    

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Order món  </strong></h2>
                    </div>
                    <div class="body">
                        <div id="content"></div>
                            <div class="row clearfix " id='sales'>
                            <form id="_order">
                            <?php
                            foreach($product as $key=>$c){
                                        ?>
                                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="info-box bg-<?=color($key)?>">
                                        <div class="icon">
                                            <img src="<?=$c['image']?>">
                                        </div>                                        
                                        <div class="content"> 
                                            <div class="text" style="font-size:30px"><?=$c['name']?></div>                                                                                       
                                            
                                            <input name="<?=$c['id']?>" id="<?=$c['id']?>" type="number" hidden value='0' >
                                            <div class="text sales" style="font-size:25px">
                                                <?=number_format($c['price'])?> VNĐ                                         
                                                <input  id="<?=$c['id']?>_Price" type="hidden" value="<?=$c['price']?>">
                                            </div>
                                                                                        
                                            <a onclick="plus('<?=$c['id']?>')"> <i class="material-icons" style="font-size:35px">add_box</i></a> 
                                            <span style="text-alight:center;font-size:35px;" class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20" id='_<?=$c['id']?>'>
                                            0
                                            </span> 
                                            <a onclick="subtract('<?=$c['id']?>')">  <i class="material-icons" style="font-size:35px">indeterminate_check_box</i></a> 
                                        </div>
                                    </div>
                                </div>

                                <?php }?>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <a onclick="order()" class="btn btn-primary waves-effect btn-block" >ĐẶT MÓN</a>
                                    </div>
                            </div>
                            </form>
                                
                         </div>

                    </div>
                </div>
            </div>
        </div>
        <script>
       function order(){  
           var total=0;
      var data= $("#_order").serializeArray().map(x=>{
          return {
              id : x.name,
              Amount : x.value,
              Price : $("#"+x.name+"_Price").val()
          };
      });
      var callback = function(item){
            total+= parseInt(item.Amount);
      }
    
      data.forEach(callback);
        var self = this;
       
        var isLogged = <?php echo isset($_SESSION['user'])?1:0; ?> ;
       if(!isLogged){
            swal({
                title: "THÔNG BÁO ",
                text: "Vui lòng đăng nhập để đặt món!",
                type: "error",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                confirmButtonText: "Đăng nhập",
                cancelButtonText: "Hủy",
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            }, function(){
                window.location='./auth';
            });
       }
       else {
            if(total==0){
                swal({
                    title: "THÔNG BÁO ",
                    text: "Vui lòng chọn món!",
                    type: "error",
                    showCancelButton: true,                
                    cancelButtonText: "Ok",
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true
                });
            }
            else{
                swal({
                    title: "Đặt món ",
                    text: "Bạn chắc chắn muốn đặt món?",
                    type: "info",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "Có",
                    cancelButtonText: "Không",
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true
                }, function() {
                    $.post(
                            '<?=base_url()?>/OrderBill/add_order_bill',
                    {
                        data:data
                    },
                        function(result){
                            swal({
                                title: 'THÔNG BÁO',
                                type: result.isSuccess == true ? 'success' : 'error',
                                text: result.message
                            }, function() {
                                if(result.isSuccess == true){
                                    // window.location.reload();
                                    window.location.replace("<?=base_url()?>Order/billDetail");
                                }                           
                            });                                             
                        }
                    );                
                });
            }    
       }                        
        
    }
</script>
        
  <script>  
  function plus(id){
    if(id){
        var textValue='#'+id;
        var text='#_'+id;
       var amount= parseInt($(textValue).val())+1;
       $(textValue).val(amount);
     
       $(text).text(amount);
      }  
  }    
    

    function subtract(id){
      if(id){
        var textValue='#'+id;
        var text='#_'+id;
          if(parseInt($(textValue).val())==0){
              return
          }
        var amount= parseInt($(textValue).val())-1;
        $(textValue).val(amount);
        $(text).text(amount);
       
      }  
    }      

 
  </script>



