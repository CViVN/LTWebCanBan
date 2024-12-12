
<?php
class Home extends Controller
{
  protected $customers;
  protected $rooms;
  protected $invoices;
  protected $listrooms;
  protected $listservices;
  function __construct()
  {
    $this->customers = $this->model("ClientsModel");
    $this->rooms = $this->model("RoomModel");
    $this->invoices = $this->model("InvoiceModel");
    $this->listrooms = $this->model("ListRoomModel");
    $this->listservices = $this->model("ListServiceModel");
  }
  function ChangePassword()
  {
    $this->view("landing", [
      "Page" => "changepassword",
    ]);
  }
  function ChangeInfo()
  {
    $this->view("landing",[
      "Page" => "userinformation",
    ]);
  }
  function Show()
  {
    // Call Models
    // $rooms = $this->model("RoomModel");

    // Call Views
    $this->view("show", [

    ]);
  }
  function BookingRoom()
  {
    $this->view("showallroom", [
      "Page" => "showAllRoom",
    ]);
  }
  function showResultSearch(){
    $this->view("landing", [
      "Page" => "rooms",
    ]);
  }
 
  function search()
  {
    $lstroom = [];
    
    header("Content-Type: application/json");

    $input = json_decode(file_get_contents("php://input"));
    $giamin = $input->giamin;
    $giamax = $input->giamax;
    $type = $input->type;
    $page= $input->page;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {


      $checkin = new DateTime($input->ngayden);
      $datein = $checkin->format('Y-m-d');
      $checkout = new DateTime($input->ngaydi);
      $dateout = $checkout->format('Y-m-d');
      $interval = $checkin->diff($checkout);
      $days = $interval->days;
      $_SESSION["days"] = $days;

      $result = $this->rooms->search($giamax, $giamin, $datein, $dateout, $type, $page);

      while ($row = mysqli_fetch_array($result)) {
        $room = array(
          'id' => $row['ID_room'],
          'gia' => $row['gia'],
          'type' => $row['type'],
          'img' => $row['img']
        );
        $lstroom[] = $room;
      }
      $_SESSION["ngayden"] = $datein;
      $_SESSION["ngaydi"] = $dateout;
      
      echo '{"success": true, "data":' . json_encode($lstroom) . ', "number":' . count($lstroom) . ', "total":' . $this->rooms->getTotalRow() . '}';
    }



  }
  function loadAllRoom()
  {
    header("Content-Type: application/json");

    $input = json_decode(file_get_contents("php://input"));

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $page = $input->page;
      $result = $this->rooms->queryAll($page);
      while ($row = mysqli_fetch_array($result)) {
        $room = array(
          'id' => $row['ID_room'],
          'gia' => $row['gia'],
          'type' => $row['type'],
          'img' => $row['img']
        );
        $lstroom[] = $room;
      }

     
      $re=true;
      
     
      echo '{"success":' .$re.', "data":' . json_encode($lstroom) . '}';
    }

  }
  function saveInforSearch(){
    header("Content-Type: application/json");
  
    $input = json_decode(file_get_contents("php://input"));
  
    $_SESSION["ngayden"]= $input->ngayden;
    $_SESSION["ngaydi"]=$input->ngaydi;
    $_SESSION["type"]=$input->type;
    $_SESSION["gia"]=$input->gia;
    // $_SESSION["total_rows"]=$_SESSION["total_rows"];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      echo '{"success":' .true. '}';
  
    }
  }
    function myinvoice(){
      if(!isset($_SESSION['phone'])){
        $this->view("show");
      }else{
        $phone = $_SESSION['phone'];
        $myinvoice = $this->invoices->getInvoicebyphone($phone);
        $this->view("pages/myinvoice",["myinvoice"=>$myinvoice]);
      }
    }
    function invoicedetail($mahd){
      if(!isset($_SESSION['phone'])){
        $this->view("show");
      }else{
        $invoice = $this->invoices->getInvoicebyID($mahd);
        $room = $this->listrooms->getInvoicebyID($mahd);
        $service = $this->listservices->getInvoicebyID($mahd);
        $this->view("pages/invoicedetail",["invoice"=>$invoice,"service"=>$service,"room"=>$room]);
  }
}
}
 
?>

































        