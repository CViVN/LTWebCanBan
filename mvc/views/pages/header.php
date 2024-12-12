<nav class="navbar">
  <button class="toggle-button">&#9776;</button>

    <div class="logo">  
        <a class="nav-link active" aria-current="page" href="http://localhost/live/Home/Show" >Trang Chủ</a>
        
      </div>
    <div class="login">
      <?php
      if (!isset($_SESSION['phone']) && !isset($_SESSION["admin"])) {
        echo "<a href='http://localhost/live/Login/Show/signin'>Đăng nhập</a>";
        echo " ";
        echo "<a href='http://localhost/live/Login/Show/signup'>Đăng ký</a>";
      } else {
        echo "<a href='http://localhost/live/Login/logout'>Đăng xuất</a>";
      }
      ?>
    </div>
  </nav>

  <div class="sidebar">
    <div class="sidebar-header">
      <h3>Menu</h3>
      <button class="close-sidebar">&times;</button>
    </div>
    <ul class="sidebar-menu">
      <?php
    echo "<li> <a class='nav-link "  . (isset($_SESSION['admin']) ? "disabled" : "") ."' href='http://localhost/live/Home/BookingRoom'>Đặt phòng</a></li>";
    echo "<li> <a class='nav-link ". (isset($_SESSION['admin']) ? "disabled" : "") ."' href='http://localhost/live/Service/'>Dịch vụ</a></li>";
      echo "<li> <a class='nav-link ". (isset($_SESSION['admin']) ? "disabled" : "") ."' href='http://localhost/live/Cart/show' >Giỏ Hàng</a></li>";
      echo "<li> <a class='nav-link ". (isset($_SESSION['admin']) ? "disabled" : "") ."' href='http://localhost/live/Booking/searchbooking' >Tìm hóa đơn</a></li>";
      echo "<li> <a class='nav-link " . (isset($_SESSION['admin']) ? "" : "disabled") ."' href='http://localhost/live/Admin/show' >Admin</a></li>";

      if (isset($_SESSION['phone'])) {
        echo "<li><a  href='http://localhost/live/Home/myinvoice'>Lịch sử đặt phòng</a></li>";
        echo "<li><a  href='http://localhost/live/Home/ChangeInfo'>Thông tin cá nhân</a></li>";
        echo "<li><a  href='http://localhost/live/Home/ChangePassword'>Đổi mật khẩu</a></li>";
        echo "";
      } 

      
      ?>
    </ul>
  </div>