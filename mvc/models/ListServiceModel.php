<?php
    class ListServiceModel extends DB{
        function allInvoice(){
            $q="select * from invoice_service";
            return mysqli_query( $this->con,$q);
        }
        function getInvoicebyID($mahd){
            $q="select * from invoice_service where ID_HD = '$mahd'";
            return mysqli_query( $this->con,$q);
        }
    }
?>