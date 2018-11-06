<?php
/**
 * Created by PhpStorm.
 * User: Ali M
 * Date: 11/6/2018
 * Time: 6:24 PM
 */

class Post extends Model
{


    public function insert($data)
    {
        $sqlQuery = "insert into `t_posts` set `title`=? ,`thumbnails_url`=? , `insert_by`=
(select `id` from `t_admins` where `username`=? and `status`!=0) , `insert_date`=?,
`insert_time`=? ,`cat_id`=(select `id` from `t_category` where `id`=? and `status`!=0) ,`status`=?";

        $res =$this->getDb()->prepare($sqlQuery);
        $res->bindValue(1,$data['title']);
        $res->bindValue(2,$data['thumbnailsUrl']);
        $res->bindValue(3,$data['insertBy']);
        $res->bindValue(4,jDateTime::date("Y-m-d"));
        $res->bindValue(5,jDateTime::date('H:i:s'));
        $res->bindValue(6,$data['catId']);
        $res->bindValue(7,$data['type']);

        if ($res->execute()){
            if ($res->rowCount()>0)
                return true;
        }

        return false;
    }


    public function deletePost($postId)
    {

        $sqlQuery ="update `t_posts` set `status`=0 where `id`=?";
        $res = $this->getDb()->prepare($sqlQuery);
        $res->bindValue(1,$postId);

        if ($res->execute()){
            if ($res->rowCount()>0)
                return true;
        }

        return false;
    }




    public function update($data)
    {
        $sqlQuery ="update `t_posts` set `title`=? , `thumbnails_url`=?  ,
`insert_date`=? , `insert_time`=? , `cat_id`=? ,`update_by`=(select `id` from `t_admins` where `username` and `status`!=0) ,
 `status`=? ";

        $res =$this->getDb()->prepare($sqlQuery);
        $res->bindValue(1,$data['title']);
        $res->bindValue(2,$data['thumbnailsUrl']);
        $res->bindValue(3,jDateTime::date("Y-m-d"));
        $res->bindValue(4,jDateTime::date('H:i:s'));
        $res->bindValue(5,$data['catId']);
        $res->bindValue(6,$data['update_by']);
        $res->bindValue(7,$data['type']);


        if ($res->execute()){
            if ($res->rowCount()>0)
                return true;
        }

        return false;
    }




    public function getVideo()
    {
        $sqlQuery ="";

    }


}