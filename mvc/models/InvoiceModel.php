<?php
    class InvoiceModel extends DB{
        function allInvoice(){
            $q="select * from invoice";
                return mysqli_query( $this->con,$q);
        }
        function getInvoiceByphone($phone){
            $q="select * from invoice where phone = '$phone'";
                return mysqli_query($this->con,$q);
        } function getInvoiceByID($mahd){
            $q="select * from invoice where ID_HD = '$mahd'";
                return mysqli_query($this->con,$q);
        }
    }
?>