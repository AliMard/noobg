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




    public function getVideo($start ,$end , $sortTarget='', $sortStyle = '')
    {
        $sqlQuery ="SELECT t_posts.title ,t_posts.update_by, t_posts.thumbnails_url , t_posts.insert_date ,t_admins.username as insert_by 
 ,t_posts.category_id  , t_category.name , t_posts.insert_time , t_video.time , t_video.video_url FROM t_posts INNER JOIN t_video 
 ON t_video.post_id=t_posts.id INNER JOIN t_admins ON t_admins.id=t_posts.insert_by  INNER JOIN t_category ON 
 t_category.id=t_posts.category_id WHERE t_posts.status!=0 AND t_posts.status=(SELECT `code` FROM `t_constant` 
 WHERE `table_name`='t_posts' AND `column_name`='status' AND `value`='video') order by  
 ".$sortTarget." ".$sortStyle." limit ".$start." , ".$end;

        $res = $this->getDb()->prepare($sqlQuery);


        if ($res->execute()){
            if ($res->rowCount()>0)
                return $res;
        }
    return false;

    }

 





    public function getNews($start ,$end , $sortTarget='', $sortStyle = '')
    {
        $sqlQuery="SELECT t_posts.title , t_posts.thumbnails_url , t_posts.insert_date ,t_admins.username insert_by 
 ,t_posts.category_id  , t_category.name , t_posts.insert_time , t_news.text FROM t_posts INNER JOIN t_news 
 ON t_news.post_id=t_posts.id INNER JOIN t_admins ON t_admins.id=t_posts.insert_by INNER JOIN t_category ON 
 t_category.id=t_posts.category_id WHERE t_posts.status!=0 AND t_posts.status=(SELECT `code` FROM `t_constant` 
 WHERE `table_name`='t_posts' AND `column_name`='status' AND `value`='news') order by  
 ".$sortTarget." ".$sortStyle." limit ".$start." , ".$end;


        $res = $this->getDb()->prepare($sqlQuery);


        if ($res->execute()){
            if ($res->rowCount()>0)
                return $res;
        }



        return false;

    }







    public function postExist($postId)
    {

        $sqlQuery="select * from  `t_posts` where `id`=? and `status`!=0";

        $res = $this->getDb()->prepare($sqlQuery);
        $res->bindValue(1,$postId);


        if ($res->execute())
        {
            if ($res->rowCount()>0)

                return true;
        }

            return false;

    }



    public function getVideoById($postId,$start ,$end , $sortTarget='', $sortStyle = '')
    {

        $sqlQuery="SELECT t_posts.title ,t_posts.update_by, t_posts.thumbnails_url , t_posts.insert_date ,t_admins.username as insert_by 
 ,t_posts.category_id  , t_category.name , t_posts.insert_time , t_video.time , t_video.video_url FROM t_posts INNER JOIN t_video 
 ON t_video.post_id=t_posts.id INNER JOIN t_admins ON t_admins.id=t_posts.insert_by  INNER JOIN t_category ON 
 t_category.id=t_posts.category_id WHERE  t_posts.status=(SELECT `code` FROM `t_constant` 
 WHERE `table_name`='t_posts' AND `column_name`='status' AND `value`='video') and  t_posts.id in ( ";


        $str = implode(",",$postId);

        $sqlQuery.=$str;

        $sqlQuery.=" )  order by  
 ".$sortTarget." ".$sortStyle." limit ".$start." , ".$end;

        $res = $this->getDb()->prepare($sqlQuery);


        if ($res->execute())
        {
            if ($res->rowCount()>0)
                return $res;
        }



        return false;

    }





    public function getVideoByCategory($catId,$start ,$end , $sortTarget='', $sortStyle = '')
    {

        $sqlQuery="SELECT t_posts.title ,t_posts.update_by, t_posts.thumbnails_url , t_posts.insert_date ,t_admins.username as insert_by 
 ,t_posts.category_id  , t_category.name , t_posts.insert_time , t_video.time , t_video.video_url FROM t_posts INNER JOIN t_video 
 ON t_video.post_id=t_posts.id INNER JOIN t_admins ON t_admins.id=t_posts.insert_by  INNER JOIN t_category ON 
 t_category.id=t_posts.category_id WHERE  t_posts.status=(SELECT `code` FROM `t_constant` 
 WHERE `table_name`='t_posts' AND `column_name`='status' AND `value`='video') and  t_posts.cat_id=?  order by  
 ".$sortTarget." ".$sortStyle." limit ".$start." , ".$end;




        $res= $this->getDb()->prepare($sqlQuery);
        $res->bindValue(1,$catId);


        if ($res->execute()){
            if ($res->rowCount()>0)
                return $res;
        }

        return false;
    }


    public function getNewsById($postId,$start ,$end , $sortTarget='', $sortStyle = '')
    {


        $sqlQuery="SELECT t_posts.title , t_posts.thumbnails_url , t_posts.insert_date ,t_admins.username insert_by 
 ,t_posts.category_id  , t_category.name , t_posts.insert_time , t_news.text FROM t_posts INNER JOIN t_news 
 ON t_news.post_id=t_posts.id INNER JOIN t_admins ON t_admins.id=t_posts.insert_by INNER JOIN t_category ON 
 t_category.id=t_posts.category_id WHERE  t_posts.status=(SELECT `code` FROM `t_constant` 
 WHERE `table_name`='t_posts' AND `column_name`='status' AND `value`='news') and  t_posts.id in (";


        $str = implode(",",$postId);

        $sqlQuery.=$str;

        $sqlQuery.=") order by  ".$sortTarget." ".$sortStyle." limit ".$start." , ".$end;


        $res = $this->getDb()->prepare($sqlQuery);


        if ($res->execute())
        {
            if ($res->rowCount()>0)
                return $res;
        }



        return false;



    }



    public function getNewsByCategory($catId,$start ,$end , $sortTarget='', $sortStyle = '')
    {

        $sqlQuery="SELECT t_posts.title , t_posts.thumbnails_url , t_posts.insert_date ,t_admins.username insert_by 
 ,t_posts.category_id  , t_category.name , t_posts.insert_time , t_news.text FROM t_posts INNER JOIN t_news 
 ON t_news.post_id=t_posts.id INNER JOIN t_admins ON t_admins.id=t_posts.insert_by INNER JOIN t_category ON 
 t_category.id=t_posts.category_id WHERE  t_posts.status=(SELECT `code` FROM `t_constant` 
 WHERE `table_name`='t_posts' AND `column_name`='status' AND `value`='news') and  t_posts.cat_id =?  order by  
 ".$sortTarget." ".$sortStyle." limit ".$start." , ".$end;

        $res = $this->getDb()->prepare($sqlQuery);
        $res->bindValue(1,$catId);


        if ($res->execute())
        {
            if ($res->rowCount()>0)
                return $res;
        }


        return false;

    }






}