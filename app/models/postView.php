<?php
/**
 * Created by PhpStorm.
 * User: Ali M
 * Date: 11/7/2018
 * Time: 5:12 PM
 */

class PostView extends  Model
{




    public function insert($data)
    {
        $sqlQuery = "insert into `t_post_view` set `post_id`=(select `id` from `t_posts` where `id`=? and `status`!=0)
  , `author_ip`=?  , `insert_date`=? , `insert_time`=?";

        $res = $this->getDb()->prepare($sqlQuery);

        $res->bindValue(1,$data['postId']);
        $res->bindValue(2,$data['authorIp']);
        $res->bindValue(3,jDateTime::date("Y-m-d"));
        $res->bindValue(4,jDateTime::date("H:i:s"));


        if ($res->execute()){
            if ($res->rowCount()>0)
                return true;
        }

        return false;
    }


    public function postViewed($postId)
    {

        $sqlQuery="select `id` from `t_post_view` where `post_id`=? ";
        $res = $this->getDb()->prepare($sqlQuery);
        $res->bindValue(1,$postId);

        if ($res->execute()){
            if ($res->rowCount()>0)
                return $res->rowCount();
        }
        return 0;
    }



    public function getDateView($date)
    {
        $sqlQuery="select `id` from `t_post_view` where `insert_date`=?";
        $res=$this->getDb()->prepare($sqlQuery);
        $res->bindValue(1,$date);

        if ($res->execute()){
            if ($res->rowCount()>0)
                return $res->rowCount();
        }


        return 0;
    }






}