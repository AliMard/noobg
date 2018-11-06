<?php
/**
 * Created by PhpStorm.
 * User: Ali M
 * Date: 11/6/2018
 * Time: 12:56 PM
 */

class Category extends  Model
{




    public function insert($data)
    {
        $sqlQuery="insert into `t_category` set `name`=? ,`status`=1";
        $res=$this->getDb()->prepare($sqlQuery);
        $res->bindValue(1,$data);

        if ($res->execute()){
            if ($res->rowCount()>0)
                return true;
        }

        return false;
    }


    public function getCatList()
    {
        $sqlQuery = "select * from `t_category` where  `status`!=0";
        $res = $this->getDb()->prepare($sqlQuery);
        if ($res->execute()){
            if ($res->rowCount()>0)
                return $res;
        }
        return false;
    }


    public function deleteCat($catId)
    {
        $sqlQuery="update `t_category` set `status`=0 where `id`=?";
        $res =$this->getDb()->prepare($sqlQuery);
        $res->bindValue(1,$catId);

        if ($res->execute()){
            if ($res->rowCount()>0)
                return true;
        }
        return false;
    }


    public function updateCat($data)
    {
        $sqlQuery="update `t_category` set `name`=? where  `id`=? and `status`!=0";
        $res=$this->getDb()->prepare($sqlQuery);
        $res->bindValue(1,$data['catName']);
        $res->bindValue(2,$data['catId']);

        if ($res->execute()){
            if ($res->rowCount()>0)
                return true;
        }
        return false;
    }



    public function catExist($catId)
    {
        $sqlQuery="select * from `t_category` where  `id`=? and `status`!=0";
        $res= $this->getDb()->prepare($sqlQuery);
        $res->bindValue(1,$catId);

        if ($res->execute()){
            if ($res->rowCount()>0)
                return true;
        }

        return false;
    }


}