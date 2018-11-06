<?php
/**
 * Created by PhpStorm.
 * User: Ali M
 * Date: 11/6/2018
 * Time: 7:46 PM
 */

class Video extends Model
{




    public function insert($data)
    {
        $sqlQuery ="insert into `t_video` set `post_id`=(select `id` from `t_posts` where `id`=? and `status`!=0),
`video_url`=? , `caption`=?";

        $res = $this->getDb()->prepare($sqlQuery);
        $res->bindValue(1,$data['postId']);
        $res->bindValue(2,$data['videoUrl']);
        $res->bindValue(3,$data['caption']);

        if ($res->execute()){
            if ($res->rowCount()>0)
                return true;
        }

        return false;
    }



    public function update($data)
    {
        $sqlQuery = "update `t_video` set `video_url`=? ,`caption`=?,
`post_id`=(select `id` from )";
        $res = $this->getDb()->prepare($sqlQuery);
        $res->bindValue(1,$data['']);
    }


}