<?php
require_once ('model/DataBase.inc.php');
require_once ('model/Pts.inc.php');
class Search
{

    private $con, $pts;

    public function __construct(){
        $this->con = new DataBase();
        $this->pts = new Pts($this->con);
    }


    public function getSeacredPtList($search_key)
    {
        return $this->pts->getPtsByKey($search_key);
    }

    public function getPtByID($id)
    {
        return $this->pts->getPtsByID($id);
    }



    public function updatePtByID($id, $name, $image, $price)
    {
        return $this->pts->updatePt($id, $name, $image, $price);
    }

}