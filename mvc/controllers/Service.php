<?php

class Service extends Controller{
    function Show(){        
        $service = $this->model("listService");
        $temp=$service->getAllService();
        $serviceList=[];
        $serviceNotselect=[];
        $serviceSelect=[];
        $temp2=$service->getLastID();
        while ($row=mysqli_fetch_array($temp2)){
          $lastID=$row["ID_DV"];
      }
      $lastID = preg_replace('/\D/', '', $lastID);
        while ($row=mysqli_fetch_array($temp)){
            $serviceList[$row["ID_DV"]]=["name"=>$row["name_service"],"price"=>$row["price"]];
        }
        $check=0;
        if (!empty($_SESSION["dichvu"])) {
            foreach ($_SESSION["dichvu"] as $keyy => $valuee) {
                    $serviceSelect[]=$valuee;
              }
        }
        foreach($serviceList as $key =>$value){
            if (!empty($_SESSION["dichvu"])) {
                foreach ($_SESSION["dichvu"] as $keyy => $valuee) {
                    if($key == $valuee){
                        $check+=1;
                        break;
                    }
                  }
            }
              if($check!=1){
                $serviceNotselect[$key] = ["name"=>$value["name"],"price"=>$value["price"]];
              }else{
                $check-=1;
              }
        }
        $countSel=0;
        if (!empty($_SESSION["dichvu"])) {
            $countSel=count($_SESSION["dichvu"]);
        }
        $countSer=$service->getCountService();
        $countPageService=ceil(($countSer-$countSel)/4);
        $countPageSelect=ceil($countSel/4);
        $serviceSelect=array_slice($serviceSelect, 0,4);
        $serviceNotselect=array_slice($serviceNotselect, 0,4);
        $this->view("landing",[
            "Page"=>"service",
            "Service"=>$serviceList,
            "Image"=>$service->allImageService(),
            "Count"=>$countSer,
            "NotSelected"=>$serviceNotselect,
            "Selected"=>$serviceSelect,
            "active"=>"service",
            "trang"=>1,
            "countPage"=>$countPageService,
            "countPageSelect"=>$countPageSelect,
            "sodv"=>count($serviceNotselect),
            "sodvdc"=>count($serviceSelect),
            "lastID"=>$lastID
          ]);
    }
    function ShowPage($active,$page){        
        $service = $this->model("listService");
        $temp=$service->getAllService();
        $serviceList=[];
        $page=intval($page);
        $serviceNotselect=[];
        $serviceSelect=[];
        $temp2=$service->getLastID();
        while ($row=mysqli_fetch_array($temp2)){
          $lastID=$row["ID_DV"];
      }
      $lastID = preg_replace('/\D/', '', $lastID);
        while ($row=mysqli_fetch_array($temp)){
            $serviceList[$row["ID_DV"]]=["name"=>$row["name_service"],"price"=>$row["price"]];
        }
        $check=0;
        if (!empty($_SESSION["dichvu"])) {
            foreach ($_SESSION["dichvu"] as $keyy => $valuee) {
                    $serviceSelect[]=$valuee;
              }
        }
        foreach($serviceList as $key =>$value){
            if (!empty($_SESSION["dichvu"])) {
                foreach ($_SESSION["dichvu"] as $keyy => $valuee) {
                    if($key == $valuee){
                        $check+=1;
                        break;
                    }
                  }
            }
              if($check!=1){
                $serviceNotselect[$key] = ["name"=>$value["name"],"price"=>$value["price"]];
              }else{
                $check-=1;
              }
        }
        $countSel=0;
        if (!empty($_SESSION["dichvu"])) {
            $countSel=count($_SESSION["dichvu"]);
        }
        $countSer=$service->getCountService();
        $countPageService=ceil(($countSer-$countSel)/4);
        $countPageSelect=ceil($countSel/4);
        $serviceSelect=array_slice($serviceSelect, ($page-1)*4,4);
        $serviceNotselect=array_slice($serviceNotselect, ($page-1)*4,4);
        $this->view("landing",[
            "Page"=>"service",
            "Service"=>$serviceList,
            "Image"=>$service->allImageService(),
            "Count"=>$countSer,
            "NotSelected"=>$serviceNotselect,
            "Selected"=>$serviceSelect,
            "active"=>$active,
            "trang"=>$page,
            "countPage"=>$countPageService,
            "countPageSelect"=>$countPageSelect,
            "sodv"=>count($serviceNotselect),
            "sodvdc"=>count($serviceSelect),
            "lastID"=>$lastID
          ]);
    }
    function Add($id){
        $temp = array();
        $check = 0;
        if (!empty($_SESSION["dichvu"])) {
            foreach ($_SESSION["dichvu"] as $key => $value) {
                $temp[] = $value;
                if($value == $id){
                    $check=1;
                }
              }
            }
            if($check==0){
                $temp[]=$id;
            }
            $_SESSION['dichvu'] = $temp;
    }
    function Remove($id){
        $temp = array();
        if (!empty($_SESSION["dichvu"])) {
            foreach ($_SESSION["dichvu"] as $key => $value) {
                if($value != $id){
                $temp[] = $value;
              }
            }
            }
            $_SESSION['dichvu'] = $temp;
    }
   
}
?>