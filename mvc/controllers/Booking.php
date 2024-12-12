<?php
class Booking extends Controller{
    protected $client;
    function __construct(){
        $this->client = $this->model("ClientsModel");;
    }
    function Show(){        
        $this->view("landing", [
            "Page"=>"rooms",
        ]);
    }
    function confirm(){
        if(isset($_SESSION['cartroom']) && !empty($_SESSION['cartroom'])){
            $name = "";
            $phone = "";
            $email = "";
            $address = "";
            if(isset($_SESSION['phone'])){
                $phone = $_SESSION['phone'];
                $us = $this->client->getOneCustomer($phone);
                foreach($us as $row){
                        $name = $row["name"];
                        $phone = $row["Phone"];
                        $email = $row["email"];
                        $address = $row["address"];
                }
            }
            $total = 0; 
            foreach($_SESSION['cartroom'] as $key=>$value){
                $total += $value['prices'];
            }
            foreach($_SESSION['service'] as $key=>$value){
                $total += $value['price'];
            }
            $this->view("pages/confirm",["name"=>$name,"sdt"=>$phone,"email"=>$email,"address"=>$address,"total"=>$total]);
        }else{
            $this->view("landing", ["Page"=>"rooms"]);
        }
    }
    function searchbooking(){
        $this->view("pages/search-booking");
    }
}
?>
