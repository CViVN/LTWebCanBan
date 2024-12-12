<div id="form-search" >


<form method="POST" style="width: 70%">
  <div class="form-group">
    <label class="form-label">Ngày nhận phòng</label><br>
    <input type="date" name="ngayden" id="ngayden" style="width:80%" value="<?php echo isset($_SESSION['ngayden']) ? $_SESSION['ngayden'] : ''; ?>">  </div>
  <div class="form-group">
    <label class="form-label">Ngày trả phòng</label><br>
    <input type="date" name="ngaydi" id="ngaydi" style="width:80%" value= "<?php echo isset($_SESSION['ngaydi']) ? $_SESSION['ngaydi'] : ''; ?>"> 
  </div>
  <div class="form-group">
    <label class="form-label">Loại phòng</label><br>
    <select name="typeroom" id="typeroom" style="width:100%">
  <option value="0" <?php if(isset($_SESSION['type']) && $_SESSION['type'] == "0") echo "selected"; ?>>Tất cả</option>  
  <option value="1" <?php if(isset($_SESSION['type']) && $_SESSION['type'] == "1") echo "selected"; ?>>Phòng đơn</option>
  <option value="2" <?php if(isset($_SESSION['type']) && $_SESSION['type'] == "2") echo "selected"; ?>>Phòng đôi</option>
  <option value="3" <?php if(isset($_SESSION['type']) && $_SESSION['type'] == "3") echo "selected"; ?>>Phòng ba</option>
  <option value="4" <?php if(isset($_SESSION['type']) && $_SESSION['type'] == "4") echo "selected"; ?>>Phòng bốn</option>
</select>
  </div>

  <div class="form-group" style="padding-bottom:5px">
    <label class="form-label">Giá tiền</label><br>
    <select name="price" id="price" style="width:100%">
  <option value="1" <?php if(isset($_SESSION['gia']) && $_SESSION['gia'] == "1") echo "selected"; ?>>0vnd-500.000vnd</option>
  <option value="2" <?php if(isset($_SESSION['gia']) && $_SESSION['gia'] == "2") echo "selected"; ?>>500.000vnd-1.000.000vnd</option>
  <option value="3" <?php if(isset($_SESSION['gia']) && $_SESSION['gia'] == "3") echo "selected"; ?>>1.000.000vnd-2.000.000vnd</option>
  <option value="4" <?php if(isset($_SESSION['gia']) && $_SESSION['gia'] == "4") echo "selected"; ?>>Trên 2.000.000vnd</option>
</select>
  </div>

  <button type="button" class="btn btn-primary" name="btn-search" id="btn-search" style="margin-top: 10px" <?php echo isset($_SESSION["admin"]) ? "disabled" : ""; ?>>Tìm Phòng</button>
</form>

</div>
