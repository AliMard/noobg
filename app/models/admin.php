<?php
/**
 * Created by PhpStorm.
 * User: Ali M
 * Date: 11/6/2018
 * Time: 12:12 PM
 */

class Admin extends Model
{



    public function insert($data)
    {

        $sqlQuery="insert into `t_admins` set `username`=? , `name`=? , `password`=? , `pkey`=? ,
 `email`=?,insert_date=?, insert_time=? ";
        $res=$this->getDb()->prepare($sqlQuery);
        $res->bindValue(1,$data['username']);
        $res->bindValue(2,$data['name']);
        $res->bindValue(3,$data['password']);
        $res->bindValue(4,$data['pkey']);
        $res->bindValue(5,$data['email']);
        $res->bindValue(6,jDateTime::date('Y-m-d'));
        $res->bindValue(7,jDateTime::date('H:i:s'));


        if ($res->execute()){
            if ($res->rowCount()>0)
                return true;
        }

        return false;

    }






    public function getUserByEmail($email)
    {
        $sqlQuery = "select * from `t_admins` where  `email`=? and `status`!=0";
        $res=$this->getDb()->prepare($sqlQuery);
        $res->bindValue(1,$email);

    }


    public function getUser($username)
    {
        $sqlQuery="select * FROM `t_admins` where `username`=? and `status`!=0";
        $res=$this->getDb()->prepare($sqlQuery);
        $res->bindValue(1,$username);

        if ($res->execute()){
            if ($res->rowCount()>0)
                return $res;
        }

        return false;
    }



    public function loginAt($username)
    {
        $sqlQuery="update `t_admins` set `last_activity`=? where `username`= and `status`!=0";
        $res = $this->getDb()->prepare($sqlQuery);
        $res->bindValue(1,jDateTime::date("Y-m-d H:i:s"));
        $res->bindValue(1,$username);

        if ($res->execute()){
            if ($res->rowCount()>0)
                return true;
        }

        return false;
    }






}