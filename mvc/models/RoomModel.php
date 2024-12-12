<?php
    class RoomModel extends DB {
        
        public $total;
        function allRooms(){
            $q="select count(*) from rooms";
            return mysqli_query( $this->con,$q);

        }
        function getRoomById($id){
            $q="select * from rooms where ID_Room = '$id'";
            return mysqli_query( $this->con,$q);
        }
        function search($giamax, $giamin, $checkin, $checkout,$type, $page ){
            $size=6;
            $start= ($page-1)*$size;

        $query = "SELECT DISTINCT  rooms.ID_room, rooms.gia, rooms.type, rooms.img
            FROM rooms
            LEFT JOIN listroom ON rooms.ID_room = listroom.id_room
            WHERE ((listroom.id_room IS NULL) or rooms.id_room not in (select id_room from listroom where((ngayden<='$checkout' and ngayden>='$checkin') or (ngaydi<='$checkout' and ngaydi>='$checkin')))) 
            And rooms.gia>=$giamin and rooms.gia<=$giamax ";
            
            $where=[];
            
            if(isset($type) && !empty($type)){
                if($type!=0){
                    $where[]= "rooms.type = $type";

                }
               
            }   
            if(count($where)){
                $query .= " AND " . implode(' AND ',$where);
            }
            $result = mysqli_query($this->con, $query);
            $this->total = (int) mysqli_num_rows($result);
            $query .= " limit $start,$size";
            return  mysqli_query($this->con, $query);
        }
        function getTotalRow(){
            return $this->total;
        }
        function queryAll($page){
            $size=6;
            $start= ($page-1)*$size;
            $query="select rooms.ID_room, rooms.gia, rooms.type, rooms.img from rooms limit $start,$size ";
            $result = $this->allRooms();
            $_SESSION["total_row"] = (int) mysqli_fetch_row($result)[0];
            return  mysqli_query($this->con, $query);

        }
        function queryAllWithoutPage(){
      
            $query="select rooms.ID_room, rooms.gia, rooms.type, rooms.img from rooms";
            return  mysqli_query($this->con, $query);

        }
        function InsertRoom($id,$gia,$type,$img){
            
            $query="INSERT INTO `rooms` (`ID_Room`, `gia`, `type`, `img`) VALUES('$id','$gia','$type','$img')";
           
             mysqli_query($this->con, $query);
            

        }
        function DeleteRoom($id){
            
            $query="DELETE FROM `rooms` WHERE `ID_Room`='$id'";
         
             mysqli_query($this->con, $query);
            

        }

        function UpdateRoom($id,$gia,$type,$img){
            
            $query="UPDATE `rooms` SET `gia`='$gia',`type`='$type',`img`='$img' WHERE `ID_Room`='$id'";
           
             mysqli_query($this->con, $query);
            

        }
    }
?>