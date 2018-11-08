<?php
/**
 * Created by PhpStorm.
 * User: Ali M
 * Date: 11/7/2018
 * Time: 4:36 PM
 */

class PostTag extends Model
{


    public function insert($data)
    {
        $sqlQuery="insert into `t_post_tag` set `post_id`=(select  `id` from `t_posts` where `id`=? and `status`!=0) ,
        `tag_id`=(select  `id` from `t_tag` where `id`=? and `status`!=0) , `status`=1";

        $res = $this->getDb()->prepare($sqlQuery);
        $res->bindValue(1,$data['postId']);
        $res->bindValue(2,$data['tagId']);


        if ($res->execute()){
            if ($res->rowCount()>0)
                return true;

        }

        return false;
    }



    public function getPostTags($postId)
    {
        $sqlQuery="select t_tag.name from `t_tag` inner join `t_post_tag` on t_post_tag.tag_id = t_tag.id where
 t_post_tag.post_id(select `id` from `t_posts` where `id`=? and `status`!=0)";

        $res = $this->getDb()->prepare($sqlQuery);
        $res->bindValue(1,$postId);


        if ($res->execute()){
            if ($res->rowCount()>0)
                return $res;
        }


        return false;
    }




    public function update($data)
    {
        $sqlQuery="update `t_post_tag` set `tag_id`=(select `id` from `t_tags` where `id`=? and `status`!=0)
    where  `post_id`=? and `tag_id`=?";

        $res=$this->getDb()->prepare($sqlQuery);

        $res->bindValue(1,$data['newTagId']);
        $res->bindValue(2,$data['currentTagId']);
        $res->bindValue(3,$data['postId']);

        if ($res->execute()) {
            if ($res->rowCount() > 0)
                return true;

        }

        return false;
    }




    public function deletePostTag($data)
    {

        $sqlQuery="update `t_post_tag` set `status`=0  where `post_id`=? and `tag_id`=?";
        $res=$this->getDb()->prepare($sqlQuery);
        $res->bindValue(1,$data['postId']);
        $res->bindValue(2,$data['tagId']);

        if ($res->execute()){
            if ($res->rowCount()>0)
                return true;
        }

        return false;

    }



    public function getPostByTag($tagId,$type)
    {
        $sqlQuery = "select t_post_tag.post_id from `t_pots_tag` inner  join `t_tag` on t_tag.id=t_post_tag.tag_id inner 
join t_posts on t_posts.id=t_post_tag.post_id where  t_post_tag.status!=0 and t_post_tag.tag_id=?
and t_posts.status=?";

        $res = $this->getDb()->prepare($sqlQuery);
        $res->bindValue(1,$tagId);
        $res->bindValue(2,$type);

        if ($res->execute()){
            if ($res->rowCount()>0)
                return $res;
        }

        return false;
    }








}