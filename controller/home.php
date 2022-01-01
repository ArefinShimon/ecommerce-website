<?php
require_once ('model/DataBase.inc.php');
require_once ('model/Pts.inc.php');
class Home{

    private $con, $pts;

    public function __construct(){
        $this->con = new DataBase();
        $this->pts = new Pts($this->con);
    }

    function getHomeData(){
        //model    
//        $data = array(
//            array("id"=>"1", "name"=>"Abu shahed", "std_id"=>"183-25-12000", "image"=>"shahed.jpg"),

//        );

        $data = $this->pts->getPts();
    
        //model
    
        return $data;
    
    }
}




