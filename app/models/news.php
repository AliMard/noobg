<?php
/**
 * Created by PhpStorm.
 * User: Ali M
 * Date: 11/6/2018
 * Time: 7:46 PM
 */

class News extends Model
{



    public function insert($data)
    {
        $sqlQuery = "insert into `t_news` set `post_id` ,`text`=?";
        $res= $this->getDb()->prepare($sqlQuery);
        $res->bindValue(1,$data[""]);
        $res->bindValue(2,$data['']);


        if ($res->execute()){
            if ($res->rowCount()>0)
                return true;
        }


        return false;
    }





    public function update($data)
    {


        $sqlQuery = "update `t_news` set `text`=? where `post_id`=(select `id` from `t_posts` where `id`=? and `status`!=0)";
        $res = $this->getDb()->prepare($sqlQuery);
        $res->bindValue(1, $data['text']);
        $res->bindValue(2, $data['postId']);

        if ($res->execute()) {
            if ($res->rowCount() > 0)
                return true;
        }

        return false;

    }







}