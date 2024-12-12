<?php
    class ListRoomModel extends DB{
        function allListrooms(){
            $q="select * from listroom";
            return mysqli_query( $this->con,$q);
        }
        function getInvoicebyID($mahd){
            $q="select * from listroom where ID_HD = '$mahd'";
            return mysqli_query( $this->con,$q);
        }
        function lichSuRoom(){
            $q="SELECT listroom.*, invoice.* FROM `listroom` INNER JOIN `invoice` ON listroom.ID_HD = invoice.ID_HD";
            return mysqli_query( $this->con,$q);
        }
        function DeletelichSuRoom($id1,$id2){
            $q="DELETE  FROM `listroom` WHERE ID_room = '$id1' AND ID_HD='$id2'";
             mysqli_query( $this->con,$q);
        }

    }
?>