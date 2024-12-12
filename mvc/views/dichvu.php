
<?php

$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

// Phân tích URL thành các thành phần khác nhau
$url_parts = parse_url($url);

// Lấy chuỗi truy vấn từ URL
if (isset($url_parts['query'])) {
  $queryString = $url_parts['query'];
  parse_str($queryString, $params);
}


// Phân tích chuỗi truy vấn thành các tham số và giá trị tương ứng


// Lấy giá trị của id và xoa từ các tham số

if (isset($params['sua'])) {
  $sua = $params['sua'];
}
if (isset($params['mota'])) {
  $mota = $params['mota'];
}

if (isset($sua)) {
  $result = $data["ListDV"];
  foreach ($result as $r) {
    echo '<div id="mymodal' . $r['ID_DV'] . '" class="modal fade in" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thông tin dịch vụ cần sửa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../Admin/updateDV?ql=dichvu" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">ID Service:</label>
            <input type="text" class="form-control" value="' . $r['ID_DV'] . '" placeholder="" name="id">
            </div>
          <div class="form-group">
            <label for="name">Name Service:</label>
            <input type="text" class="form-control" id="id" placeholder="" name="ten">
            </div>

            <div class="form-group">
              <label for="price">Price:</label>
              <input  class="form-control" id="price" placeholder="Nhập giá dịch vụ" name="price">
            </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger" name="updateConfirm" id="updateConfirm" data-bs-dismiss="modal">Confirm</button>
      </div>
        </form>
      </div>
    </div>
  </div> </div>';
  }
}


  if (isset($mota)) {
    $result = $data["ListDV"];
    foreach ($result as $r) {
      echo '<div id="mymodal' . $r['ID_DV'] . '" class="modal fade in" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Thông tin dịch vụ cần thêm mô tả</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="../Admin/addDVMT?ql=dichvu" method="POST" enctype="multipart/form-data">
          <div class="form-group">
              <label for="name">ID Service:</label>
              <input type="text" class="form-control" value="' . $r['ID_DV'] . '" placeholder="" name="id">
              </div>
              <div class="form-group">
              <label>Image:</label>
              <input type="file" class="form-control"   name="anh1">
            </div>
  
             
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger" name="updateConfirm" id="updateConfirm" data-bs-dismiss="modal">Confirm</button>
        </div>
          </form>
        </div>
      </div>
    </div> </div>';
    }
  }


?>

<table>
  <thead>
    <tr>
      <th>ID Service</th>
      <th>Name Service</th>
      <th>Price</th>
      <?php if (isset($sua)||isset($mota) ) {
      echo '<th >Quản lý KH</th>';
      }
      ?>
    </tr>
  </thead>
  <tbody>
 

    <?php
    $resultDV = $data["ListDV"];
    foreach ($resultDV as $r) { ?>

      <tr>
        <td>
          <?php echo 'DV'.$r["ID_DV"] ?>
        </td>
        <td>
          <?php echo $r["name_service"] ?>
        </td>
        <td>
          <?php echo $r["price"] ?>
        </td>
        

        <?php ;

        if (isset($sua))
        {
           
          echo' <td><a href="?sua=' . $r['ID_DV'] . '" id="btnadd1" data-bs-toggle="modal"
           data-bs-target="#mymodal' . $r['ID_DV'] . '""><img src="../mvc/views/img/Edit4.png" with="30px" height="30px"/></a></td>';

        }
        if (isset($mota))
        {
           
          echo' <td><a href="?sua=' . $r['ID_DV'] . '" id="btnadd1" data-bs-toggle="modal"
           data-bs-target="#mymodal' . $r['ID_DV'] . '""><img src="../mvc/views/img/them.png" with="30px" height="30px"/></a></td>';

        }
        ?>
      </tr>

    <?php
    }
    ?>

  </tbody>

</table>
<a href="#" type="button" class="btn btn-secondary" id="btnadd" data-bs-toggle="modal" data-bs-target="#mymodal">Add</a>
<a href="../Admin/showDV?ql=dichvu&&sua" type="button" class="btn btn-secondary">Sửa</a>
<a href="../Admin/showDV?ql=dichvu&&mota" type="button" class="btn btn-secondary">Thêm mô tả</a>

<footer>
  <p>© 2023 Trang Admin</p>
</footer>
</div>


<div id="mymodal" class="modal fade in" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thông tin dịch vụ</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../Admin/addDV?ql=dichvu" method="POST" enctype="multipart/form-data">
       
          <div class="form-group">
            <label for="name">Name Service:</label>
            <input type="text" class="form-control" id="id" placeholder="" name="ten">
            </div>

            <div class="form-group">
              <label for="price">Price:</label>
              <input  class="form-control" id="price" placeholder="Nhập giá dịch vụ" name="price">
            </div>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger" name="updateConfirm" id="updateConfirm" data-bs-dismiss="modal">Confirm</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



