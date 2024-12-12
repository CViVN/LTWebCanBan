<?php
    class Cart extends Controller{
        protected $customers;
        protected $rooms;
        protected $invoices;
        protected $listrooms;
    
        function __construct(){
            $this->customers= $this->model("ClientsModel");
            $this->rooms= $this->model("RoomModel");
            $this->invoices= $this->model("InvoiceModel");
            $this->listrooms= $this->model("ListRoomModel");
         
        }
        function addCartRoom($id){
            
            
            if(empty( $_SESSION['cartroom'])){
                $cart= array();
            }
            else{
                $cart = $_SESSION['cartroom'];
            }
            // if(!array_key_exists($cart, $id)){

            // }
            if($id=="css"){
                return;
            }
            $r=$this->rooms->getRoomById($id);
            $row = mysqli_fetch_array($r);
            $prices = $_SESSION["days"]*$row["gia"];
            $cart[$id]= (array("id"=>$row["ID_Room"], "gia"=>$row["gia"], "type"=>$row["type"], "img"=>$row["img"] , "ngayden"=>$_SESSION["ngayden"], "ngaydi"=>$_SESSION["ngaydi"],"days"=>$_SESSION["days"],"prices"=>$prices));
            $_SESSION['cartroom']=$cart;
            $this->show();
            
        }
        function show(){
            $this->view("CartView",[]);
        }
        function deleteAll(){
            unset($_SESSION['cartroom']);
        }


        function deleteRoomById(){
            header("Content-Type: application/json");
  
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
  
                $input = json_decode(file_get_contents("php://input"));
                $id = $input->id;
                unset($_SESSION['cartroom'][$id]);
                $cart = $_SESSION['cartroom'];
                $kq=[];
                foreach($cart as $c) 
                {
                    // if($id==$c["id"]){
                    //     continue;
                    // }
                    $a= array("id"=>$c["id"],"gia"=>$c["gia"], "type"=>$c["type"],"img"=>$c["img"],"ngayden"=>$c["ngayden"], "ngaydi"=>$c["ngaydi"],"days"=>$c["days"],"prices"=>$c["prices"]);
                    $kq[] = $a;
                }
                // $_SESSION['cartroom']=$kq;         
                echo '{"success": true, "data": ' . json_encode($kq) . '}';
            }
            
          }
    }
?>