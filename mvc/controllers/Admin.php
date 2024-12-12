<?php

    class Admin extends Controller{
        
    protected $customers;
    protected $rooms;
    protected $invoices;
    protected $listrooms;
    protected $listservice;

    function __construct(){
        $this->customers= $this->model("ClientsModel");
        $this->rooms= $this->model("RoomModel");
        $this->invoices= $this->model("InvoiceModel");
        $this->listrooms= $this->model("ListRoomModel");
        $this->listservice= $this->model("listService");
     
    }
    //Hiển thị phòng
        function show(){
            $result=$this->rooms->queryAllWithoutPage();
           
            $this->view("adminView", [
                "ListRoom"=>$result
            ]);
        }
       
        function add(){
                if(isset($_POST['id']))
                {
                $target_dir = "mvc/views/img/";  // thư mục chứa file upload

            $img ="";
            $target_file = $target_dir . basename($_FILES["anh1"]["name"]); // link sẽ upload file lên

            $status_upload = move_uploaded_file($_FILES["anh1"]["tmp_name"], $target_file);

            if ($status_upload) { // nếu upload file không có lỗi 
                $img =  "img/" . basename($_FILES["anh1"]["name"]);
            }
                
                $id=$_POST['id'];
                $gia=$_POST['gia'];
                $type=$_POST['type'];
                
                
                $this->rooms->InsertRoom($id,$gia,$type,$img);
            }
            $this->show();
    }
            
            
       
        function delete(){
           
            // Lấy URL hiện tại
            $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            // Phân tích URL thành các thành phần khác nhau
            $url_parts = parse_url($url);

            // Lấy chuỗi truy vấn từ URL
            $queryString = $url_parts['query'];

            // Phân tích chuỗi truy vấn thành các tham số và giá trị tương ứng
            parse_str($queryString, $params);

            // Lấy giá trị của id và xoa từ các tham số
            $id = $params['id'];
            $xoa = $params['xoa'];


            $this->rooms->DeleteRoom($id);
            $this->show();
            
            
            
        }




        function update(){
            if(isset($_POST['id']))
            {
            $target_dir = "mvc/views/img/";  // thư mục chứa file upload

        $img ="";
        $target_file = $target_dir . basename($_FILES["anh1"]["name"]); // link sẽ upload file lên

        $status_upload = move_uploaded_file($_FILES["anh1"]["tmp_name"], $target_file);

        if ($status_upload) { // nếu upload file không có lỗi 
            $img =  "img/" . basename($_FILES["anh1"]["name"]);
        }
            
            $id=$_POST['id'];
            $gia=$_POST['gia'];
            $type=$_POST['type'];
            
            
            $this->rooms->UpdateRoom($id,$gia,$type,$img);
            
        }
        $this->show();
    }

//Dịch vụ
    function showDV(){
        $resultDV=$this->listservice->allListService();
       
        $this->view("adminView", [
            "ListDV"=>$resultDV
        ]);
    }
    
    function addDV(){
        if(isset($_POST['ten']))
        {
       
        
        $ten=$_POST['ten'];
        $gia=$_POST['price'];
       
       
        $this->listservice->InsertDV($ten,$gia);
    }
    $this->showDV();
}
        
        
   
    function deleteDV(){
       
        // Lấy URL hiện tại
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

// Phân tích URL thành các thành phần khác nhau
$url_parts = parse_url($url);

// Lấy chuỗi truy vấn từ URL
$queryString = $url_parts['query'];

// Phân tích chuỗi truy vấn thành các tham số và giá trị tương ứng
parse_str($queryString, $params);

// Lấy giá trị của id và xoa từ các tham số
$id = $params['id'];



        $this->listservice->DeleteDV($id);
        $this->showDV();
        
        
        
    }
//Mô tảDịch vụ
function showDVMT(){
    $resultDVMT=$this->listservice->allListServiceMT();
   
    $this->view("adminView", [
        "ListDVMT"=>$resultDVMT
    ]);
}
//Lịch sử phòng
function showLSRoom(){
    $resultLS=$this->listrooms->lichSuRoom();
   
    $this->view("adminView", [
        "ListLS"=>$resultLS
    ]);
}

function deleteLS(){
   
    // Lấy URL hiện tại
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

// Phân tích URL thành các thành phần khác nhau
$url_parts = parse_url($url);

// Lấy chuỗi truy vấn từ URL
$queryString = $url_parts['query'];

// Phân tích chuỗi truy vấn thành các tham số và giá trị tương ứng
parse_str($queryString, $params);

// Lấy giá trị của id và xoa từ các tham số
$id1 = $params['id1'];
$id2 = $params['id2'];


    $this->listrooms->DeletelichSuRoom($id1,$id2);
    $this->showLSRoom();
    
    
    
}





/// dịch vụ
    function updateDV(){
        if(isset($_POST['ten']))
        {
       
        
            $ten=$_POST['ten'];
            $gia=$_POST['price'];
           
            $id=$_POST['id'];
            $this->listservice->UpdateDV($id,$ten,$gia);
        
       
    }
    $this->showDV();
        
}
//bảng ảnh dịch vụ
function addDVMT(){
    if(isset($_POST['id']))
    {
    $target_dir = "mvc/views/img/";  // thư mục chứa file upload

$img ="";
$target_file = $target_dir . basename($_FILES["anh1"]["name"]); // link sẽ upload file lên

$status_upload = move_uploaded_file($_FILES["anh1"]["tmp_name"], $target_file);

if ($status_upload) { // nếu upload file không có lỗi 
    $img =  "img/" . basename($_FILES["anh1"]["name"]);
}
    
    $id=$_POST['id'];
    
    
    
    $this->listservice->InsertDVDT ($id,$img);
}
$this->showDV();
}
//Khách hàng

function showKH(){
    $resultKH=$this->customers->allCustomers();
   
    $this->view("adminView", [
        "ListKH"=>$resultKH
    ]);
}
// bảng khách hàng
function addKH(){
    if(isset($_POST['ten']))
    {
   
    
    $ten=$_POST['ten'];
    $phone=$_POST['dt'];
   
   $add=$_POST['diachi'];
    $email=$_POST['email'];
     $password=$_POST['pass'];
    $status=$_POST['status'];
    $this->customers->InsertClient($ten, $phone, $add, $email, $password,$status);
}
$this->showKH();
}
    
    

function deleteKH(){
   
    // Lấy URL hiện tại
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

// Phân tích URL thành các thành phần khác nhau
$url_parts = parse_url($url);

// Lấy chuỗi truy vấn từ URL
$queryString = $url_parts['query'];

// Phân tích chuỗi truy vấn thành các tham số và giá trị tương ứng
parse_str($queryString, $params);

// Lấy giá trị của id và xoa từ các tham số
$phone = $params['id'];



    $this->customers->DeleteClient($phone);
    $this->showKH();
    
    
    
}




function updateKH(){
    if(isset($_POST['ten']))
    {
   
    
    $ten=$_POST['ten'];
    $dt=$_POST['dt'];
    $giotinh=$_POST['gioitinh'];
    $tuoi=$_POST['tuoi'];
    
    $this->customers->UpdateClient($dt,$ten,$giotinh,$tuoi);
}
$this->showKH();
    
}

function thunhap(){
    $this->view("pages/thunhap");
}

}





