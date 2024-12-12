<?php

    class listService extends DB{
     function getAllService(){
            $q="select * from service";
            return $this->con->query($q);
       }
     function getCountService(){
        $q = "SELECT COUNT(*) as count FROM service";
        $result = $this->con->query($q);
        $count = $result->fetch_assoc()['count'];
        return $count;
     }
     function allImageService(){
            $q="select * from serviceimage";
            return $this->con->query($q);
    }
    function getLastID(){
      $q="SELECT ID_DV FROM service ORDER BY ID_DV DESC LIMIT 1";
        return $this->con->query($q);
    }
    function allListService(){
      $q="select * from service";
      return $this->con->query($q);
  }
function addServiceC($id){
  $sql = "SELECT * FROM service where id='$id'";
  $result = $this->con->query($sql);
  $sql2 = "SELECT * FROM hoadondichvu where id ='$id'";
  $result2 = $this->con->query($sql2);
  $check =0;
  if ($result2->num_rows > 0) {
      while($row2 = $result->fetch_assoc()) {
          if($row2["id"]==$id){
              $check=1;
          }
      }
  }
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          if($check==0){
              $stm = $this->con->prepare("INSERT INTO `hoadondichvu`(`id`, `name`, `price`) VALUES (?,?,?)");
              $stm->bind_param('ssi',$row["id"],$row["name"],$row["price"]);
              $stm->execute();
          }
         
      }
  }
}
function removeServiceC($id){
  $sql = "SELECT * FROM service where id='$id'";
  $result = $this->con->query($sql);
  $sql2 = "SELECT * FROM hoadondichvu where id ='$id'";
  $result2 = $this->con->query($sql2);
  $check =0;
  if ($result2->num_rows > 0) {
      while($row2 = $result2->fetch_assoc()) {
          if($row2["id"]==$id){
              $check+=1;
          }
      }
  }
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          if($check!=0){
              $stm = $this->con->prepare("delete from hoadondichvu where id = ?");
              $stm->bind_param('s',$row["id"]);
              $stm->execute();
          }
          
      }
  }
  }
function tinhBill(){
  $sql = "SELECT * FROM hoadondichvu";
  $tongTien=0;
  $result = $this->con->query($sql);
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
              $tongTien+=((int)$row["price"]);
          }
      }
  return $tongTien;
}
function selectService(){
  $q="select * from hoadondichvu";
  return $this->con->query($q);
}

function InsertDV( $ten, $gia){
  $qr = "INSERT INTO `service`( `name_service`, `price`) VALUES ( '$ten', '$gia')";        
  mysqli_query($this->con, $qr);
  
}
function TopDV(){
  $qr = "SELECT * FROM `service` ORDER BY ID_DV ASC";        
  return mysqli_query($this->con, $qr);
  
}
function DeleteDV($id){
      
  $query = "DELETE FROM `service` WHERE `ID_DV`='$id'";
$result = mysqli_query($this->con, $query);

if (!$result) {
// Lỗi xảy ra, hiển thị cảnh báo
$error_message = mysqli_error($this->con);
echo '<script>alert("Không thể xóa dịch vụ! ' . $error_message . '");</script>';
} else {
// Thành công, hiển thị thông báo thành công
echo '<script>alert("Xóa dịch vụ thành công!");</script>';
}
}

function UpdateDV($id, $ten, $gia){
      
  $query="UPDATE `service` SET `name_service`='$ten',`price`='$gia'  WHERE `ID_DV`='$id'";
 
   mysqli_query($this->con, $query);
  

}

function InsertDVDT($id, $img){
  $qr = "INSERT INTO `serviceimage`(`ID_DV`, `link`)  VALUES ('$id', '$img')";        
  $kq=mysqli_query($this->con, $qr);
  if( $kq==true)
  {
      
          // Hiển thị thông báo lỗi
       echo'  <script> alert("Đã thêm ảnh mô tả dịch vụ thành công!") </script>';
        
  }
}
function allListServiceMT(){
  $q="SELECT * FROM `serviceimage` WHERE 1";
 
  return $this->con->query($q);
}
    
     
    }
?>