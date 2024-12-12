
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

if (isset($sua)) {
  $result = $data["ListKH"];
  foreach ($result as $r) {
    echo '<div id="mymodal' . $r['Phone'] . '" class="modal fade in" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thông tin khách hàng cần sửa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../Admin/updateKH?ql=khachhang" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="id" placeholder="" name="ten">
          </div>

            <div class="form-group">
              <label for="price">Phone:</label>
              <input type="text" class="form-control" id="price" value="'. $r['Phone'] . '" placeholder="Nhập số điện thoại" name="dt" readonly>
            </div>
            <div class="form-group">
            <label for="name">Address:</label>
            <input type="text" class="form-control" id="id" placeholder="" name="diachi">
          </div>
            
          <div class="form-group">
            <label for="name">Email:</label>
            <input type="text" class="form-control" id="id" placeholder="" name="email">
          </div>

          <div class="form-group">
            <label for="name">Password:</label>
            <input type="password" class="form-control" id="id" placeholder="" name="pass">
          </div>

          <div class="form-group">
            <label for="name">Status:</label>
            <input type="number" class="form-control" id="id" placeholder="" name="status" min="0">
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
      <th>Name</th>
      <th>Phone</th>
      <th>Address</th>
      <th>Email</th>
      <th>Password</th>
      <th>Status</th>
      <th colspan="2">Quản lý KH</th>
    </tr>
  </thead>
  <tbody>
 

    <?php
    $resultKH = $data["ListKH"];
    foreach ($resultKH as $r) { ?>

      <tr>
        <td>
          <?php echo $r["name"] ?>
        </td>
        <td>
          <?php echo $r["Phone"] ?>
        </td>
        <td>
          <?php echo $r["address"] ?>
        </td>
        <td>
          <?php echo $r["email"] ?>
        </td>
        <td>
          <?php echo $r["password"] ?>
        </td>
        <td>
          <?php echo $r["status"] ?>
        </td>

        <?php echo '<td>';

        if (isset($sua))
        {
           
          echo' <a href="?sua=' . $r['name'] . '" id="btnadd1" data-bs-toggle="modal"
           data-bs-target="#mymodal' . $r['Phone'] . '""><img src="../mvc/views/img/Edit4.png" with="30px" height="30px"/></a></td>';

        }
          echo' <td><a href="../Admin/deleteKH?ql=khachhang&&id=' . $r['Phone'] . '"><img src="../mvc/views/img/Close1.png" with="30px" height="30px"/> </a></td>'; ?>
      </tr>

    <?php
    }
    ?>

  </tbody>

</table>
<a href="#" type="button" class="btn btn-secondary" id="btnadd" data-bs-toggle="modal" data-bs-target="#mymodal">Add</a>
<a href="../Admin/showKH?ql=khachhang&&sua" type="button" class="btn btn-secondary">Sửa</a>

<footer>
  <p>© 2023 Trang Admin</p>
</footer>
</div>


<div id="mymodal" class="modal fade in" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thông tin khách hàng</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../Admin/addKH?ql=khachhang" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="id" placeholder="" name="ten">
          </div>

            <div class="form-group">
              <label for="price">Phone:</label>
              <input type="text" class="form-control" id="price" placeholder="Nhập số điện thoại" name="dt">
            </div>
            <div class="form-group">
            <label for="name">Address:</label>
            <input type="text" class="form-control" id="id" placeholder="" name="diachi">
          </div>
            
          <div class="form-group">
            <label for="name">Email:</label>
            <input type="text" class="form-control" id="id" placeholder="" name="email">
          </div>

          <div class="form-group">
            <label for="name">Password:</label>
            <input type="password" class="form-control" id="id" placeholder="" name="pass">
          </div>

          <div class="form-group">
            <label for="name">Status:</label>
            <input type="number" class="form-control" id="id" placeholder="" name="status" min="0">
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



