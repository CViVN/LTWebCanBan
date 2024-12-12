


<table>
  <thead>
    <tr>
      <th>ID Service</th>
      <th>IMG Service</th>
      
      
      
    </tr>
  </thead>
  <tbody>
 

    <?php
    $resultDVMT = $data["ListDVMT"];
   
    foreach ($resultDVMT as $r) { ?>

      <tr>
        <td>
        <?php echo 'DV'.$r["ID_DV"] ?>
        </td>
        <td>
        <?php echo' <img src="../mvc/views/'.$r["img"].'" width="100%" height="200px"/> '  ?>
        </td>
        
        

        <?php ;

        
        ?>
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




