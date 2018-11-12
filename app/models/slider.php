<?php
/**
 * Created by PhpStorm.
 * User: Ali M
 * Date: 11/10/2018
 * Time: 9:28 PM
 */

class Slider extends Model
{



    public function insert($data)
    {

        $sqlQuery = "insert into `t_slider` set `post_id`=(select `id` from  `t_posts` where `id`=? and `status`!=0)
, `insert_date`=? , `status`=1";

        $res = $this->getDb()->prepare($sqlQuery);
        $res->bindValue(1,$data['postId']);
        $res->bindValue(2,jDateTime::date('Y-m-d H:i:s'));



        if ($res->execute()){
            if ($res->rowCount()>0)
                return true;
        }

        return false;
    }



    public function update($data)
    {

        $sqlQuery ="update `t_slider` set `post_id`=(select `id` from `t_posts` where `id`=? and `status`!=0),
`insert_date`=? where `id`=?";

        $res = $this->getDb()->prepare($sqlQuery);
        $res->bindValue(1,$data['postId']);
        $res->bindValue(2,jDateTime::date("Y-m-d H:i:s"));
        $res->bindValue(3,$data['id']);


        if ($res->execute()){
            if ($res->rowCount()>0)
                return true;
        }


        return false;

    }



    public function delete($id)
    {

        $sqlQuery = "update `t_slider` set `status`=0 where `id`=? ";

        $res= $this->getDb()->prepare($sqlQuery);
        $res->bindValue(1,$id);

        if ($res->execute()){
            if ($res->rowCount()>0)
                return true;
        }


        return false;
    }




    public function getSlider()
    {
        $sqlQuery ="select `post_id` from `t_slider` where `status`!=0 order by  `insert_date` ASC";

        $res = $this->getDb()->prepare($sqlQuery);


        if ($res->execute()){
            if ($res->rowCount()>0)
                return $res;

        }
        return false;

    }


}