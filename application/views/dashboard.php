
    

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Order món  </strong></h2>
                    </div>
                    <div class="body">
                        <div id="content"></div>
                            <div class="row clearfix " id='sales'>
                            <form>
                            <?php
                            foreach($product as $key=>$c){
                                        ?>
                                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="info-box bg-<?=color($key)?>">
                                        <div class="icon">
                                            <i class="material-icons">free_breakfast</i>
                                        </div>
                                        <div class="content">
                                            <div class="text" style="font-size:15px"><?=$c['name']?></div>
                                            
                                        </div>
                                        <div class="content">
                                            <div style="text-alight:center" class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20" id='_<?=$c['id']?>'>
                                            0
                                            </div>
                                            <input name="<?=$c['id']?>" id="<?=$c['id']?>" type="number" hidden value='0' >
                                            
                                        </div>
                                        <div class="content">
                                            <div class="text sales" style="font-size:15px">
                                            <?=number_format($c['price'])?>
                                            <input  id="<?=$c['id']?>_Price" type="hidden" value="<?=$c['price']?>">
                                            </div>
                                        </div>
                                        <div>
                                         <a onclick="plus('<?=$c['id']?>')"> <i class="material-icons" style="font-size:30px">add_box</i></a> 
                                         <a onclick="subtract('<?=$c['id']?>')">  <i class="material-icons" style="font-size:30px">indeterminate_check_box</i></a> 
                                         </div>
                                    </div>
                                </div>

                                <?php }?>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <a class="btn btn-primary waves-effect btn-block" onclick="order()">ĐẶT MÓN</a>
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
      var data= $("form").serializeArray().map(x=>{
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
       if(total==0){
           return;
       }
         
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
                     '<?=base_url()?>OrderBill/add_order_bill',
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
                            window.location.reload();
                            }
                           
                        });
                    }
                );
            });
        
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



