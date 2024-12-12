<?php
    class ClientsModel extends DB{
        public function allCustomers(){
            $q="select * from clients";
            return mysqli_query( $this->con,$q);

        }
        public function getOneCustomer($phone){
            $q= "select * from clients where Phone = '$phone'";
            return mysqli_query( $this->con,$q);

        }
        public function addClient($name, $phone, $email, $password){
            $qr = "INSERT INTO clients VALUES ('$name','$phone','','$email','$password',1)";        
            mysqli_query($this->con, $qr);
        }

        public function checkUsername($phone){
            $qr = "SELECT * FROM clients WHERE phone = '$phone'";
            $rows = mysqli_query($this->con, $qr);
      
            if(mysqli_num_rows($rows)>0){
                return false;
            }
            return true;
        }
        public function InsertClient($name, $phone, $add, $email, $password,$status){
            $qr = "INSERT INTO `clients`(`name`, `Phone`, `address`, `email`, `password`, `status`) VALUES ('$name', '$phone', '$add', '$email','$password', '$status');";        
            mysqli_query($this->con, $qr);
            
        }
        function DeleteClient($phone){
            
            $query="DELETE FROM `clients` WHERE `phone`='$phone'";
         
             mysqli_query($this->con, $query);
            

        }
       
        function UpdateClient($id,$ten,$gt,$tuoi){
            
            $query="UPDATE `clients` SET `name`='$ten',`sex`='$gt',`age`='$tuoi' WHERE `Phone`='$id'";
           
             mysqli_query($this->con, $query);
            

        }
    }
?>