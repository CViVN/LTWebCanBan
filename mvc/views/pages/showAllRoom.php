<?php
  require_once("slide.php");
  require_once("form-search.php");
?>
<div class="container" style="width:70%">
    <div id="number">

    </div>
  <div class='row g-0 row-cols-lg-3' id="show-search">
  </div>
  </div>
  <div class="page">
  <div class="pagination">
<?php
  $pagLink = "";
  if ($page >= 2) {

    echo "<a  href='http://localhost/live/Home/BookingRoom?page=" . ($page - 1) . "'>  Prev </a>";

  }

  $total_pages = $_SESSION["total_row"]/6;


  for ($i = 1; $i <= $total_pages; $i++) {

    if ($i == $page) {

      $pagLink .= "<a class = 'active' href='http://localhost/live/Home/BookingRoom?page=" . $i . "'>" . $i . " </a>";

    } else {

      $pagLink .= "<a href='http://localhost/live/Home/BookingRoom?page=" . $i . "'> " . $i . " </a>";

    }

  }
  ;


  if ($page < $total_pages) {

    $pagLink.= "<a href='http://localhost/live/Home/BookingRoom?page=" . ($page + 1) . "'>  Next </a>";

  }
  echo $pagLink;

  ?>
</div>
</div>
<?php

