


<table>
  <thead>
    <tr>
      <th>ID Room</th>
      <th>ID Hóa Đơn</th>
      <th>Name</th>
      <th>Phone</th>
      <th>Ngày đến</th>
      <th>Ngày đi</th>
      <th>Ngày lập hóa đơn</th>
      <th>Quản lý</th>
      
      
      
    </tr>
  </thead>
  <tbody>
 

    <?php
    $resultLS = $data["ListLS"];
   
    foreach ($resultLS as $r) { ?>

      <tr>
        <td>
          <?php echo $r["ID_room"] ?>
        </td>
        <td>
          <?php echo $r["ID_HD"] ?>
        </td>
        <td>
          <?php echo $r["name"] ?>
        </td>
        <td>
          <?php echo $r["phone"] ?>
        </td>
        <td>
          <?php echo $r["ngayden"] ?>
        </td>
        <td>
          <?php echo $r["ngaydi"] ?>
        </td>
        <td>
          <?php echo $r["ngaylap"] ?>
        </td>
        
      <?php  echo'  <td><a href="../Admin/deleteLS?ql=lichsu&&id1='.$r['ID_room'].'&&id2='.$r['ID_HD'].'"><img src="../mvc/views/img/Close1.png" with="30px" height="30px"/> </a></td>' ; ?>

        

        
        
      </tr>

    <?php
    }
    ?>

  </tbody>

</table>

<footer>
  <p>© 2023 Trang Admin</p>
</footer>
</div>




