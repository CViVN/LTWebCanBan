<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dosis:wght@800&family=DynaPuff&family=Roboto&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
    integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
    crossorigin="anonymous"></script>
    
    <style>
        h1,h2,h3,h4,h5,h6{
            text-align: center;
        }
        .pageactive,.page {
        display: block;
        padding: 10px;
        margin: 0 5px;
        background: #f1f1f1;
        background-color: transparent;
        color: #333;
        border:none;
        text-decoration: none;
        transition: all 0.3s ease;
        }

        .pageactive:hover,.page:hover {
        background: #333;
        color: #fff;
        }
        
        .pageactive {
        background: #333;
        color: #fff;
        }
        #billdv{
            border:solid black;
            background-color:#ccc;
            margin:0;
            padding:0;
            color:#fff;
        }


.pagination {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 20px;
}

.btn-page-numberactive,.btn-page-number {
  display: block;
  padding: 10px;
  margin: 0 5px 0 0;
  border-radius: 20%;
  background: #f1f1f1;
  color: #333;
  text-decoration: none;
  transition: all 0.3s ease;
}

.btn-page-numberactive:hover,.btn-page-number:hover {
  background: #333;
  color: #fff;
}
  
.btn-page-numberactive {
  background: #333;
  color: #fff;
}
*{
    padding:0;
    margin:0;
}
*{
    font-family: 'Dosis', sans-serif;
font-family: 'DynaPuff', cursive;
font-family: 'Roboto', sans-serif;
}
.card-img-top {
    width: 450px; /* Thiết lập chiều rộng tối đa cho hình ảnh */
    height: 450px; 
    object-fit: cover;/* Thiết lập chiều cao tự động để giữ tỷ lệ khung hình */
}
@media (min-width: 768x) {
  .card-img-top {
    width: 300px; /* Thiết lập chiều rộng tối đa cho hình ảnh */
    height: 300px; 
    object-fit: cover;/* Thiết lập chiều cao tự động để giữ tỷ lệ khung hình */
  }}
@media (min-width: 1024px) {
  .card-img-top {
    width: 210px; /* Thiết lập chiều rộng tối đa cho hình ảnh */
    height: 210px; 
    object-fit: cover;/* Thiết lập chiều cao tự động để giữ tỷ lệ khung hình */
  }
}


    </style>
    <script>
        $(function(){ 
    let count = parseInt(document.getElementById("countS").innerHTML);
    let page = document.getElementById("pageselected").textContent;
    let trang = parseInt(document.getElementById("tranghientai").textContent);
    let trangdv = parseInt(document.getElementById("demsotrang").innerHTML);
    let trangdvdc = parseInt(document.getElementById("demsotrangchon").innerHTML);
    let sodv = parseInt(document.getElementById("sodv").innerHTML);
    let sodvdc = parseInt(document.getElementById("sodvdc").innerHTML);
    let lastID = parseInt(document.getElementById("lastID").innerHTML);
    let checkpage=0;
    for (let i=1;i<=trangdv;i++){
        let idbtnthem = "pageSo"+i;
        $("#"+idbtnthem).click(function(){
                $.ajax({
                    url: "http://localhost/live/Service/ShowPage/service/"+trang,
                    success: function(response) { 
                            $("body").load("http://localhost/live/Service/ShowPage/service/"+i);
                        },
                });
        })
    }
    for (let j=1;j<=trangdvdc;j++){
        let idbtnhuy = "pageHuySo"+j;
        $("#"+idbtnhuy).click(function(){
                $.ajax({
                    url: "http://localhost/live/Service/ShowPage/selected/"+trang,
                    success: function(response) { 
                            $("body").load("http://localhost/live/Service/ShowPage/selected/"+j);
                        },
                });
        })
    }
    if(lastID<10){
        for(let i = 1;i<=lastID;i++){
        let id="button-DV00"+i;
        let idhuy="buttonh-DV00"+i;
        let idhuy2="button-huyDV00"+i;
        let idthaotac = "DV00"
        trang = parseInt(document.getElementById("tranghientai").textContent);
        $("#"+id).click(function(){
            if (typeof(Storage) !== "undefined") {
            let cartId = idthaotac+i;
                sessionStorage.setItem("dichvu", cartId);    
                $.ajax({
                    url: 'http://localhost/live/Service/Add/'+cartId,
                    success: function(response) {                             
                            if(sodv==1){
                                trang=trang-1;
                            $("body").load("http://localhost/live/Service/ShowPage/service/"+trang);
                            }else{
                            $("body").load("http://localhost/live/Service/ShowPage/service/"+trang);
                            }
                        },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert("Lỗi");
                    }
                });
            } else {
            let cartId = id;
                console.log("Trình duyệt của bạn không hỗ trợ session storage");
            }
        })
        $("#"+idhuy).click(function(){
            if (typeof(Storage) !== "undefined") {
            let cartId = idthaotac+i;
                sessionStorage.setItem("dichvu", cartId);
                $.ajax({
                    url: 'http://localhost/live/Service/Remove/'+cartId,
                    success: function(response) {
                        if(sodvdc==1){
                                trang=trang-1;
                            $("body").load("http://localhost/live/Service/ShowPage/"+page+"/"+trang);
                            }else{
                                $("body").load("http://localhost/live/Service/ShowPage/"+page+"/"+trang);

                            }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                    }
                });
            } else {
            let cartId = id;
                console.log("Trình duyệt của bạn không hỗ trợ session storage");
            }
        })   
        $("#"+idhuy2).click(function(){
            if (typeof(Storage) !== "undefined") {
                let cartId = idthaotac+i;
                sessionStorage.setItem("dichvu", cartId);
                $.ajax({
                    url: 'http://localhost/live/Service/Remove/'+cartId,
                    success: function(response) {
                        if(sodvdc==1){
                                trang=trang-1;
                            $("body").load("http://localhost/live/Service/ShowPage/selected/"+trang);
                            }else{
                            $("body").load("http://localhost/live/Service/ShowPage/selected/"+trang);
                            }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                    }
                });
            } else {
            let cartId = id;
                console.log("Trình duyệt của bạn không hỗ trợ session storage");
            }
        })          
    }
    }else if(lastID>9 && lastID<100){
        for(let i = 1;i<=9;i++){
        let id="button-DV00"+i;
        let idhuy="buttonh-DV00"+i;
        let idhuy2="button-huyDV00"+i;
        let idthaotac = "DV00"
        trang = parseInt(document.getElementById("tranghientai").textContent);
        $("#"+id).click(function(){
            if (typeof(Storage) !== "undefined") {
            let cartId = idthaotac+i;
                sessionStorage.setItem("dichvu", cartId);    
                $.ajax({
                    url: 'http://localhost/live/Service/Add/'+cartId,
                    success: function(response) {                             
                            if(sodv==1){
                                trang=trang-1;
                            $("body").load("http://localhost/live/Service/ShowPage/service/"+trang);
                            }else{
                            $("body").load("http://localhost/live/Service/ShowPage/service/"+trang);
                            }
                        },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert("Lỗi");
                    }
                });
            } else {
            let cartId = id;
                console.log("Trình duyệt của bạn không hỗ trợ session storage");
            }
        })
        $("#"+idhuy).click(function(){
            if (typeof(Storage) !== "undefined") {
            let cartId = idthaotac+i;
                sessionStorage.setItem("dichvu", cartId);
                $.ajax({
                    url: 'http://localhost/live/Service/Remove/'+cartId,
                    success: function(response) {
                        if(sodvdc==1){
                                trang=trang-1;
                            $("body").load("http://localhost/live/Service/ShowPage/"+page+"/"+trang);
                            }else{
                                $("body").load("http://localhost/live/Service/ShowPage/"+page+"/"+trang);

                            }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                    }
                });
            } else {
            let cartId = id;
                console.log("Trình duyệt của bạn không hỗ trợ session storage");
            }
        })   
        $("#"+idhuy2).click(function(){
            if (typeof(Storage) !== "undefined") {
                let cartId = idthaotac+i;
                sessionStorage.setItem("dichvu", cartId);
                $.ajax({
                    url: 'http://localhost/live/Service/Remove/'+cartId,
                    success: function(response) {
                        if(sodvdc==1){
                                trang=trang-1;
                            $("body").load("http://localhost/live/Service/ShowPage/selected/"+trang);
                            }else{
                            $("body").load("http://localhost/live/Service/ShowPage/selected/"+trang);
                            }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                    }
                });
            } else {
            let cartId = id;
                console.log("Trình duyệt của bạn không hỗ trợ session storage");
            }
        })          
    }
    for(let i = 10;i<=lastID;i++){
        let id="button-DV0"+i;
        let idhuy="buttonh-DV0"+i;
        let idhuy2="button-huyDV0"+i;
        let idthaotac = "DV0"
        trang = parseInt(document.getElementById("tranghientai").textContent);
        $("#"+id).click(function(){
            if (typeof(Storage) !== "undefined") {
            let cartId = idthaotac+i;
                sessionStorage.setItem("dichvu", cartId);    
                $.ajax({
                    url: 'http://localhost/live/Service/Add/'+cartId,
                    success: function(response) {                             
                            if(sodv==1){
                                trang=trang-1;
                            $("body").load("http://localhost/live/Service/ShowPage/service/"+trang);
                            }else{
                            $("body").load("http://localhost/live/Service/ShowPage/service/"+trang);
                            }
                        },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert("Lỗi");
                    }
                });
            } else {
            let cartId = id;
                console.log("Trình duyệt của bạn không hỗ trợ session storage");
            }
        })
        $("#"+idhuy).click(function(){
            if (typeof(Storage) !== "undefined") {
            let cartId = idthaotac+i;
                sessionStorage.setItem("dichvu", cartId);
                $.ajax({
                    url: 'http://localhost/live/Service/Remove/'+cartId,
                    success: function(response) {
                        if(sodvdc==1){
                                trang=trang-1;
                            $("body").load("http://localhost/live/Service/ShowPage/"+page+"/"+trang);
                            }else{
                                $("body").load("http://localhost/live/Service/ShowPage/"+page+"/"+trang);

                            }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                    }
                });
            } else {
            let cartId = id;
                console.log("Trình duyệt của bạn không hỗ trợ session storage");
            }
        })   
        $("#"+idhuy2).click(function(){
            if (typeof(Storage) !== "undefined") {
                let cartId = idthaotac+i;
                sessionStorage.setItem("dichvu", cartId);
                $.ajax({
                    url: 'http://localhost/live/Service/Remove/'+cartId,
                    success: function(response) {
                        if(sodvdc==1){
                                trang=trang-1;
                            $("body").load("http://localhost/live/Service/ShowPage/selected/"+trang);
                            }else{
                            $("body").load("http://localhost/live/Service/ShowPage/selected/"+trang);
                            }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                    }
                });
            } else {
            let cartId = id;
                console.log("Trình duyệt của bạn không hỗ trợ session storage");
            }
        })          
    }
    }else if(lastID>100){
        for(let i = 1;i<=9;i++){
        let id="button-DV00"+i;
        let idhuy="buttonh-DV00"+i;
        let idhuy2="button-huyDV00"+i;
        let idthaotac = "DV00"
        trang = parseInt(document.getElementById("tranghientai").textContent);
        $("#"+id).click(function(){
            if (typeof(Storage) !== "undefined") {
            let cartId = idthaotac+i;
                sessionStorage.setItem("dichvu", cartId);    
                $.ajax({
                    url: 'http://localhost/live/Service/Add/'+cartId,
                    success: function(response) {                             
                            if(sodv==1){
                                trang=trang-1;
                            $("body").load("http://localhost/live/Service/ShowPage/service/"+trang);
                            }else{
                            $("body").load("http://localhost/live/Service/ShowPage/service/"+trang);
                            }
                        },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert("Lỗi");
                    }
                });
            } else {
            let cartId = id;
                console.log("Trình duyệt của bạn không hỗ trợ session storage");
            }
        })
        $("#"+idhuy).click(function(){
            if (typeof(Storage) !== "undefined") {
            let cartId = idthaotac+i;
                sessionStorage.setItem("dichvu", cartId);
                $.ajax({
                    url: 'http://localhost/live/Service/Remove/'+cartId,
                    success: function(response) {
                        if(sodvdc==1){
                                trang=trang-1;
                            $("body").load("http://localhost/live/Service/ShowPage/"+page+"/"+trang);
                            }else{
                                $("body").load("http://localhost/live/Service/ShowPage/"+page+"/"+trang);

                            }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                    }
                });
            } else {
            let cartId = id;
                console.log("Trình duyệt của bạn không hỗ trợ session storage");
            }
        })   
        $("#"+idhuy2).click(function(){
            if (typeof(Storage) !== "undefined") {
                let cartId = idthaotac+i;
                sessionStorage.setItem("dichvu", cartId);
                $.ajax({
                    url: 'http://localhost/live/Service/Remove/'+cartId,
                    success: function(response) {
                        if(sodvdc==1){
                                trang=trang-1;
                            $("body").load("http://localhost/live/Service/ShowPage/selected/"+trang);
                            }else{
                            $("body").load("http://localhost/live/Service/ShowPage/selected/"+trang);
                            }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                    }
                });
            } else {
            let cartId = id;
                console.log("Trình duyệt của bạn không hỗ trợ session storage");
            }
        })          
    }
    for(let i = 10;i<=99;i++){
        let id="button-DV0"+i;
        let idhuy="buttonh-DV0"+i;
        let idhuy2="button-huyDV0"+i;
        let idthaotac = "DV0"
        trang = parseInt(document.getElementById("tranghientai").textContent);
        $("#"+id).click(function(){
            if (typeof(Storage) !== "undefined") {
            let cartId = idthaotac+i;
                sessionStorage.setItem("dichvu", cartId);    
                $.ajax({
                    url: 'http://localhost/live/Service/Add/'+cartId,
                    success: function(response) {                             
                            if(sodv==1){
                                trang=trang-1;
                            $("body").load("http://localhost/live/Service/ShowPage/service/"+trang);
                            }else{
                            $("body").load("http://localhost/live/Service/ShowPage/service/"+trang);
                            }
                        },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert("Lỗi");
                    }
                });
            } else {
            let cartId = id;
                console.log("Trình duyệt của bạn không hỗ trợ session storage");
            }
        })
        $("#"+idhuy).click(function(){
            if (typeof(Storage) !== "undefined") {
            let cartId = idthaotac+i;
                sessionStorage.setItem("dichvu", cartId);
                $.ajax({
                    url: 'http://localhost/live/Service/Remove/'+cartId,
                    success: function(response) {
                        if(sodvdc==1){
                                trang=trang-1;
                            $("body").load("http://localhost/live/Service/ShowPage/"+page+"/"+trang);
                            }else{
                                $("body").load("http://localhost/live/Service/ShowPage/"+page+"/"+trang);

                            }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                    }
                });
            } else {
            let cartId = id;
                console.log("Trình duyệt của bạn không hỗ trợ session storage");
            }
        })   
        $("#"+idhuy2).click(function(){
            if (typeof(Storage) !== "undefined") {
                let cartId = idthaotac+i;
                sessionStorage.setItem("dichvu", cartId);
                $.ajax({
                    url: 'http://localhost/live/Service/Remove/'+cartId,
                    success: function(response) {
                        if(sodvdc==1){
                                trang=trang-1;
                            $("body").load("http://localhost/live/Service/ShowPage/selected/"+trang);
                            }else{
                            $("body").load("http://localhost/live/Service/ShowPage/selected/"+trang);
                            }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                    }
                });
            } else {
            let cartId = id;
                console.log("Trình duyệt của bạn không hỗ trợ session storage");
            }
        })          
    }
    for(let i = 100;i<=lastID;i++){
        let id="button-DV"+i;
        let idhuy="buttonh-DV"+i;
        let idhuy2="button-huyDV"+i;
        let idthaotac = "DV"
        trang = parseInt(document.getElementById("tranghientai").textContent);
        $("#"+id).click(function(){
            if (typeof(Storage) !== "undefined") {
            let cartId = idthaotac+i;
                sessionStorage.setItem("dichvu", cartId);    
                $.ajax({
                    url: 'http://localhost/live/Service/Add/'+cartId,
                    success: function(response) {                             
                            if(sodv==1){
                                trang=trang-1;
                            $("body").load("http://localhost/live/Service/ShowPage/service/"+trang);
                            }else{
                            $("body").load("http://localhost/live/Service/ShowPage/service/"+trang);
                            }
                        },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert("Lỗi");
                    }
                });
            } else {
            let cartId = id;
                console.log("Trình duyệt của bạn không hỗ trợ session storage");
            }
        })
        $("#"+idhuy).click(function(){
            if (typeof(Storage) !== "undefined") {
            let cartId = idthaotac+i;
                sessionStorage.setItem("dichvu", cartId);
                $.ajax({
                    url: 'http://localhost/live/Service/Remove/'+cartId,
                    success: function(response) {
                        if(sodvdc==1){
                                trang=trang-1;
                            $("body").load("http://localhost/live/Service/ShowPage/"+page+"/"+trang);
                            }else{
                                $("body").load("http://localhost/live/Service/ShowPage/"+page+"/"+trang);

                            }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                    }
                });
            } else {
            let cartId = id;
                console.log("Trình duyệt của bạn không hỗ trợ session storage");
            }
        })   
        $("#"+idhuy2).click(function(){
            if (typeof(Storage) !== "undefined") {
                let cartId = idthaotac+i;
                sessionStorage.setItem("dichvu", cartId);
                $.ajax({
                    url: 'http://localhost/live/Service/Remove/'+cartId,
                    success: function(response) {
                        if(sodvdc==1){
                                trang=trang-1;
                            $("body").load("http://localhost/live/Service/ShowPage/selected/"+trang);
                            }else{
                            $("body").load("http://localhost/live/Service/ShowPage/selected/"+trang);
                            }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                    }
                });
            } else {
            let cartId = id;
                console.log("Trình duyệt của bạn không hỗ trợ session storage");
            }
        })          
    }
    }
    
    $("#service").click(function(){
                $.ajax({
                    success: function(response) {
                    $("body").load("http://localhost/live/Service/ShowPage/service/1");
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                    }
                });
            }
        ) 
        $("#selected").click(function(){
                $.ajax({
                    success: function(response) {
                    $("body").load("http://localhost/live/Service/ShowPage/selected/1");
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                    }
                });
            }
        )

        
    })
</script>

    <title>Service</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mb-8">
                <div class="row d-flex justify-content-center align-items-center " style="padding:0;margin:0 ">
                    <?php
                    $serviceList=$data["Service"];
                    $serviceNotSelect=$data["NotSelected"];
                    $imageList=array();
                    $tongTien=0;
                    $check=0;
                    $checkSelected=0;
                    $bill=[];
                    $countSer=0;
                    $countSel=0;
                    while($row2 = mysqli_fetch_array($data["Image"])){
                        $imageList[$row2["img"]]=$row2["ID_DV"];
                    }
                    $serviceSelected=[];
                    if (!empty($_SESSION["dichvu"])) {
                        foreach ($_SESSION["dichvu"] as $key => $value) {
                            $serviceSelected[] = $value;
                          }
                        }
                    foreach($serviceList as $key=>$value){
                        $countSer+=1;
                        foreach ($serviceSelected as $keyy => $valuee) {
                            if($valuee == $key){
                                $bill[$key]=["name"=>$value["name"],"price"=>$value["price"]];
                                $tongTien+=$value["price"];   
                                $countSel+=1;
                                    break;
                            }  
                        }
                    }
                    if (!isset($data["active"]) || $data["active"] === "service") {
                        echo "
                            <div class='col-xs-6 col-sm-2 col-md-2 col-lg-3 mb-4 g-0 p-3' style='padding:0;margin:0;'>
                                <button class='pageactive'  id='service' style='padding:0;margin:0;' ><h4>Dịch vụ</h4></button>
                            </div>
                            <div class='col-xs-6 col-sm-3 col-md-2 col-lg-3 mb-4 g-0 p-3' style='padding:0'>
                                <button class='page' id='selected' style='padding:0;margin:0;'><h4>Dịch vụ đã chọn</h4></button>
                            </div>
            </div>
                            <div class='row d-flex justify-content-center align-items-center no-gutters'>
        <div class='row d-flex justify-content-center align-items-center no-gutters'>
        ";
                        if($countSel==$countSer){
                            echo "
                            <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 mb-12 g-0 p-3'>
                                <h2>Bạn đã chọn hết dịch vụ</h2>
                            </div>
                            
                            "
                            ;
                        }else{
                            foreach($serviceList as $key=>$value)
                            {
                                foreach ($serviceSelected as $keyy => $valuee)
                                {
                                    if($valuee == $key)
                                    {
                                        $bill[$key]=["name"=>$value["name"],"price"=>$value["price"]];
                                        break;
                                    }  
                                }
                                foreach($serviceNotSelect as $keyyyy =>$valueeee){
                                    if($key==$keyyyy){
                                        $checkSelected=1;
                                        break;
                                    }
                                }
                                if($checkSelected==1)
                                {
                                    echo "
                                        <div class='col-xs-10 col-sm-6 col-md-6 col-lg-2 mb-3 g-0' style='padding:0;margin:0;'>
                                            <div class='card border border-3 border-dark rounded-sm' style='max-width:450px;margin:5px' >
                                                <div id='".$key."' class='carousel slide' data-bs-ride='carousel'>
                                                    <div class='carousel-inner' style='max-width:450px;max-height:450px'>";
                                    foreach($imageList as $keyy=>$valuee)
                                    {
                                        if($valuee == $key)
                                        {
                                            $check+=1;
                                            if($check==1)
                                            {
                                                echo 
                                                        "<div class='carousel-item active' style='max-width:450px;max-height:450px'>
                                                            <img class='img-thumbnail card-img-top' src='/live/mvc/views/".$keyy."' class='d-block w-100' alt='...'>
                                                        </div>";
                                            }
                                            else
                                            {
                                                echo 
                                                        "<div class='carousel-item' style=style='max-width:450px;max-height:450px'>
                                                            <img class='img-thumbnail card-img-top' src='/live/mvc/views/".$keyy."' class='d-block w-100' alt='...'>
                                                        </div>";
                                            }
                                        }
                                    } 
                                    $check=0;         
                                        echo" 
                                                    </div>
                                        <button class='carousel-control-prev' type='button' data-bs-target='#".$key."' data-bs-slide='prev'>
                                            <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                                            <span class='visually-hidden'>Previous</span>
                                        </button>
                                        <button class='carousel-control-next' type='button' data-bs-target='#".$key."' data-bs-slide='next'>
                                            <span class='carousel-control-next-icon' aria-hidden='true'></span>
                                            <span class='visually-hidden'>Next</span>
                                        </button>
                                                </div>
                                    <h5 style='margin-top:5px'>".$value["name"]."</h5>
                                    <h6 class='card-text'>Giá: ".number_format((intval($value["price"])), 0, ',', '.')." VNĐ</h6>
                                    <button class='btn btn-primary' id='button-".$key."'><i class='fa-solid fa-cart-plus'></i></button>

                                            </div>
                                        </div>";
                                        
                                }
                            $checkSelected=0;
                            }
                        }
                        echo"<div class='pagination' >";
                
                for ($i=1;$i<=$data["countPage"];$i++){
                    if($i==$data["trang"]){
                        echo "<button class='btn-page-numberactive' id='pageSo".$i."'>".$i."</button>";
                    }else{
                        echo "<button class='btn-page-number' id='pageSo".$i."' '>".$i."</button>";

                    }
                }
                
echo "</div>";
                    }
                    else
                    {
                        echo "
                        <div class='col-xs-6 col-sm-2 col-md-2 col-lg-3 mb-4 g-0 p-3' style='padding:0;margin:0;'>
                        <button class='page'  id='service' style='padding:0;margin:0;' ><h4>Dịch vụ</h4></button>
                    </div>
                    <div class='col-xs-6 col-sm-2 col-md-2 col-lg-3 mb-4 g-0 p-3' style='padding:0'>
                        <button class='pageactive' id='selected' style='padding:0;margin:0;'><h4>Dịch vụ đã chọn</h4></button>
                    </div>
    </div>
                    <div class='row d-flex justify-content-center align-items-center no-gutters'>
        <div class='row d-flex justify-content-center align-items-center no-gutters'>
        ";
                        if(count($serviceSelected)==0){
                            echo "
                            <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 mb-12 g-0 p-3'>
                                <h2>Bạn chưa chọn dịch vụ</h2>
                            </div>";
                        }else{
                            foreach($serviceList as $key=>$value)
                            {
                                foreach ($data["Selected"] as $keyy => $valuee)
                                {
                                    if($valuee == $key)
                                    {
                                        echo "
                                        <div class='col-xs-10 col-sm-6 col-md-6 col-lg-2 mb-3 g-0' style='padding:0;margin:0;'>
                                            <div class='card border border-3 border-dark rounded-sm' style='max-width:450px;margin:5px' >
                                                <div id='".$key."' class='carousel slide' data-bs-ride='carousel'>
                                                    <div class='carousel-inner' style='max-width:450px;max-height:450px'>";
                                    foreach($imageList as $keyy=>$valuee)
                                    {
                                        if($valuee == $key)
                                        {
                                            $check+=1;
                                            if($check==1)
                                            {
                                                echo 
                                                        "<div class='carousel-item active' style='max-width:450px;max-height:450px'>
                                                        <img class='img-thumbnail card-img-top'   src='/live/mvc/views/".$keyy."' class='d-block w-100' alt='...'>
                                                        </div>";
                                            }
                                            else
                                            {
                                                echo 
                                                        "<div class='carousel-item' style='max-width:450px;max-height:450px'>
                                                        <img class='img-thumbnail card-img-top'  src='/live/mvc/views/".$keyy."' class='d-block w-100' alt='...'>
                                                        </div>";
                                            }
                                        }
                                    } 
                                    $check=0;         
                                        echo" 
                                                    </div>
                                        <button class='carousel-control-prev' type='button' data-bs-target='#".$key."' data-bs-slide='prev'>
                                            <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                                            <span class='visually-hidden'>Previous</span>
                                        </button>
                                        <button class='carousel-control-next' type='button' data-bs-target='#".$key."' data-bs-slide='next'>
                                            <span class='carousel-control-next-icon' aria-hidden='true'></span>
                                            <span class='visually-hidden'>Next</span>
                                        </button>
                                                </div>
                                                <h5 style='margin-top:10px'>".$value["name"]."</h5>
                                                <h6 class='card-text'>Giá: ".number_format((intval($value["price"])), 0, ',', '.')." VNĐ</h6>
                                    <button class='btn btn-danger' id='button-huy".$key."'><i class='fa-solid fa-trash'></i></button>
                                            </div>
                                        </div>";
                                    }  
                                }
                                
                            }
                        }
                        echo"</div>";
                        echo"<div class='pagination'>";
                
                for ($i=1;$i<=$data["countPageSelect"];$i++){
                    if($i==$data["trang"]){
                        echo "<button  class='btn-page-numberactive' id='pageHuySo".$i."'>".$i."</button>";
                    }else{
                        echo "<button class='btn-page-number' id='pageHuySo".$i."'>".$i."</button>";

                    }
                }
                
echo "</div>";
                    }
                    ?>
                    <?php
                    echo "<div id='countS' style='display:none'>".$data["Count"]."</div>";
                    echo "<div id='tranghientai'style='display:none' >".$data["trang"]."</div>";
                    echo "<div id='demsotrang' style='display:none'>".$data["countPage"]."</div>";
                    echo "<div id='demsotrangchon' style='display:none'>".$data["countPageSelect"]."</div>";
                    echo "<div id='sodv' style='display:none'>".$data["sodv"]."</div>";
                    echo "<div id='sodvdc' style='display:none'>".$data["sodvdc"]."</div>";
                    echo "<div id='lastID' style='display:none'>".$data["lastID"]."</div>";
                    if(!isset($data["active"]) || $data["active"] === "service")
                    {
                        echo "<div id='pageselected' style='display:none'>service</div>";
                    }else{
                        echo "<div id='pageselected' style='display:none'>selected</div>";
                    }
                    ?>
                </div>
            </div>

            <div class='col-xs-4 col-sm-8 col-md-12 col-lg-12 mb-4' style="margin-top:30px">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-0 col-md-0 col-lg-5 mb-0"></div>
                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-4 mb-6 ">
                    <div class="container" id="billdv" style="padding:6px 0;margin-top:5px">
                    
                    <?php
                        $billdv=[];
                        if(count($bill)!=0){
                            echo "<h4 id='bill'>Phí dịch vụ: ".number_format($tongTien, 0, ',', '.')." VNĐ</h4>";
                            foreach($bill as $key=>$value){
                                $billdv[$key]=["id"=>$key,"name"=>$value["name"],"price"=>$value["price"]];
                            }
                            $_SESSION["service"]=$billdv;

                    }else{
                        echo "<h4 style='text-align: center;'>Chưa chọn dịch vụ</h4>";
                    }
                    ?>
                </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 mb-6">
                    <div style="margin-top:5px"><a class='btn btn-primary' id="btn-xacNhan"href='http://localhost/live/Booking/confirm'><h4>Xác nhận</h4></a></div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        </div>
</body>
</html>