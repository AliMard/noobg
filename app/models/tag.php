<?php
/**
 * Created by PhpStorm.
 * User: Ali M
 * Date: 11/7/2018
 * Time: 4:11 PM
 */

class Tag extends Model
{




    public function  insert($data)
    {
        $sqlQuery = "insert into `t_tag` set `name`=? ,`status`=1";


        $res = $this->getDb()->prepare($sqlQuery);
        $res->bindValue(1,$data['tagName']);

        if ($res->execute()){
            if ($res->rowCount()>0)
                return true;;
        }


        return false;
    }



    public function getTagList()
    {
        $sqlQuery="select * from `t_tag` where `status`!=0";

        $res =$this->getDb()->prepare($sqlQuery);



        if ($res->execute()){
            if ($res->rowCount()>0)

                return $res;
        }
        return false;
    }



    public function deleteTag($tagId)
    {

        $sqlQuery="update `t_tag` set `status`=0 where  `id`=?";


        $res = $this->getDb()->prepare($sqlQuery);

        $res->bindValue(1,$tagId);


        if ($res->execute()){
            if ($res->rowCount()>0)
                return true;
        }

        return false;
    }



}