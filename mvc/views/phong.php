<?php 

$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

// Phân tích URL thành các thành phần khác nhau
$url_parts = parse_url($url);

// Lấy chuỗi truy vấn từ URL
if(isset($url_parts['query']))
{
  $queryString = $url_parts['query'];
  parse_str($queryString, $params);
}


// Phân tích chuỗi truy vấn thành các tham số và giá trị tương ứng


// Lấy giá trị của id và xoa từ các tham số

if (isset($params['sua']))
{
$sua =$params['sua'];
}

 if(isset($sua))
 {
  $result = $data["ListRoom"];
  foreach ($result as $r) { 
  echo '<div id="mymodal'.$r['ID_room'].'" class="modal fade in" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thông tin phòng sửa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../Admin/update?ql=phong" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="name">ID:</label>
            <input type="name" class="form-control" id="id" placeholder="" value="'.$r['ID_room'].'" name="id">
 
            <div class="form-group">
              <label>Image:</label>
              <input type="file" class="form-control"   name="anh1">
            </div>
            <div class="form-group">
              <label for="price">Price:</label>
              <input type="price" class="form-control" id="price" placeholder="Enter price" name="gia">
            </div>
            <div class="form-group">
              <label for="des">Type:</label>
              <input type="des" class="form-control" id="des" placeholder="Enter des" name="type">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger" name="updateConfirm" id="updateConfirm"
              data-bs-dismiss="modal">Confirm</button>
          </div>
        </form>
      </div>
    </div>
  </div> </div>';
 }}
 
 ?>


<table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Price</th>
          <th>Type</th>
          <th>Img</th>
          <th colspan="2">Quản lý</th>
        </tr>
      </thead>
      <tbody>

        <?php
        $result = $data["ListRoom"];
        foreach ($result as $r) { ?>

          <tr>
            <td>
              <?php echo $r["ID_room"] ?>
            </td>
            <td>
              <?php echo $r["gia"] ?>
            </td>
            <td>
              <?php echo $r["type"] ?>
            </td>
            <td>
              <?php echo' <img src="../mvc/views/'.$r["img"].'" with="100px" height="100px"/> '  ?>
            </td>
            
            <?php echo '<td>';

if (isset($sua))
{
   
  echo'  <a href="?sua='.$r['ID_room'].'" id="btnadd1" data-bs-toggle="modal"
  data-bs-target="#mymodal'.$r['ID_room'].'""><img src="../mvc/views/img/Edit4.png" with="30px" height="30px"/></a></td>';

}
  echo'  <td><a href="../Admin/delete?ql=phong&&id='.$r['ID_room'].'&&xoa"><img src="../mvc/views/img/Close1.png" with="30px" height="30px"/> </a></td>' ; ?>
</tr>



          <?php
        }
        ?>

      </tbody>

    </table>
    <a href="#" type="button" class="btn btn-secondary" id="btnadd" data-bs-toggle="modal"
      data-bs-target="#mymodal">Add</a>
      <a href="../Admin/show?ql=phong&&sua" type="button" class="btn btn-secondary" >Sửa</a>
     
    <footer>
      <p>© 2023 Trang Admin</p>
    </footer>
  </div>

  
<div id="mymodal" class="modal fade in" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
 aria-labelledby="staticBackdropLabel" aria-hidden="true">
 <div class="modal-dialog">
   <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLabel">Thông tin phòng</h5>
       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
     </div>
     <div class="modal-body">
       <form action="../Admin/add?ql=phong" method="POST" enctype="multipart/form-data">
         <div class="form-group">
           <label for="name">ID:</label>
           <input type="name" class="form-control" id="id" placeholder="" name="id">

           <div class="form-group">
             <label>Image:</label>
             <input type="file" class="form-control"   name="anh1">
           </div>
           <div class="form-group">
             <label for="price">Price:</label>
             <input type="price" class="form-control" id="price" placeholder="Enter price" name="gia">
           </div>
           <div class="form-group">
             <label for="des">Type:</label>
             <input type="des" class="form-control" id="des" placeholder="Enter des" name="type">
           </div>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
           <button type="submit" class="btn btn-danger" name="updateConfirm" id="updateConfirm"
             data-bs-dismiss="modal">Confirm</button>
         </div>
       </form>
     </div>
   </div>
 </div> </div>
 


 