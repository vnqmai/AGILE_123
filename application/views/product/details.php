<div class="container card">
    <div class="row">
        <div class="col-md-3 col-md-push-2">
            <img src="../../<?=$product['image']?>" class="img-responsive">
        </div>
        <div class="col-md-5 col-md-push-2">
            <div class="text" style="font-size:30px"><?=$product['name']?></div>
            <div class="text sales" style="font-size:25px"><?=$product['price']?> VNĐ</div>
            <hr>
            <div class="text sales" style="font-size:18px">
                <b>Mô tả món</b><br>
                <?=$product['description']?>
            </div>
            <hr>
            <div>
                <a href="#" class="btn" onClick="history.go(-1);">Trở về</a>
            </div>
        </div>
    </div>
</div>