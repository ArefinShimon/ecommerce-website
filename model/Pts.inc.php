<?php

class Pts
{
    private $db;

    public function __construct($db_object)
    {
        $this->db = $db_object;
    }

    public function getPts()
    {
        $sql = "Select * from pts";
        $data = $this->db->executeQuery($sql);
        if($data != Null){
            if(sizeof($data) > 0){
                return $data;
            }
            else
            { 
                return Null; 
            }
        }
        else 
        { 
            return Null; 
        }
    }

    public function getPtsByKey($search_key)
    {
        $sql = "Select * from pts where name LIKE '%$search_key%' or des LIKE '%$search_key%'";
        $data = $this->db->executeQuery($sql);
        if($data != Null){
            if(sizeof($data) > 0){
                return $data;
            }
            else
            { 
                return Null;
            }
        }else { 
            return Null; 
        }
    }

    public function getPtsByID($id)
    {
        $sql = "Select * from pts where id = '$id'";
        $data = $this->db->executeQuery($sql);
        if($data != Null){
            if(sizeof($data) > 0){
                return $data[0];
            }
            else{
                 return Null; 
                }
        }
        else 
        { 
            return Null;
        }
    }


    public function updatePt($id, $name, $image, $price)
    {
        $sql = "Update pts set  name = '$name', price = '$price' where id = '$id'";
        if ($this->db->insertQuery($sql)){
            return True;
        }
        else 
        {
            return False;
        }
    }

}
?>