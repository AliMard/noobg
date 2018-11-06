<?php
/**
 * Created by PhpStorm.
 * User: Ali M
 * Date: 11/6/2018
 * Time: 2:04 PM
 */

class Comment extends Model
{


    public function insert($data)
    {
        $sqlQuery="insert into `t_comment` set `post_id`=? , `text`=? , `author`=? , `author_email`=? 
       , `comment_agent`=? , `parent`=? , `admin_id`=? , `insert_date`=? , `insert_time`=? ,`status`=1";
        $res = $this->getDb()->prepare($sqlQuery);
        $res->bindValue(1,$data['postId']);
        $res->bindValue(2,$data['text']);
        $res->bindValue(3,$data['author']);
        $res->bindValue(4,$data['author_email']);
        $res->bindValue(5,$data['comment_agent']);
        $res->bindValue(6,$data['parent']);
        $res->bindValue(7,$data['admin_id']);
        $res->bindValue(8,$data['insert_date']);
        $res->bindValue(9,$data['insert_time']);

        if ($res->execute()){
            if ($res->rowCount()>0)
                return true;
        }
        return false;
    }



    public function deleteComment($id)
    {
        $sqlQuery ="update `t_comment` set `status`=0 where `id`=?";
        $res = $this->getDb()->prepare($sqlQuery);
        $res->bindValue(1,$id);

        if ($res->execute()){
            if ($res->rowCount()>0)
                return true;
        }

        return false;

    }




    public function getPostComment($postId)
    {
        $sqlQuery ="select * from `t_comment` where `post_id`=(select `id` from `t_posts` where `id`=? and `status`!=0)
,`status`!=0";

        $res = $this->getDb()->prepare($sqlQuery);
        $res->bindValue(1,$postId);

        if ($res->execute()){
            if ($res->rowCount()>0)
                return true;
        }

        return false;
    }







}