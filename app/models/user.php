<?php
/**
 * Created by PhpStorm.
 * User: Ali M
 * Date: 11/7/2018
 * Time: 5:26 PM
 */

class User extends Model
{


    public function insert($data)
    {

        $sqlQuery="insert into `t_users` set `username`=? , `password`=? , `pkey`=? ,
 `email`=?,`mobile`=?,insert_date=?, insert_time=? ";
        $res=$this->getDb()->prepare($sqlQuery);
        $res->bindValue(1,$data['username']);
        $res->bindValue(2,$data['password']);
        $res->bindValue(3,$data['pkey']);
        $res->bindValue(4,$data['email']);
        $res->bindValue(5,$data['mobile']);
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
        $sqlQuery = "select * from `t_users` where  `email`=? and `status`!=0";
        $res=$this->getDb()->prepare($sqlQuery);
        $res->bindValue(1,$email);

        if ($res->execute()){
            if ($res->rowCount()>0)
                return $res;
        }

        return false;
    }




    public function getUserByMobile($mobile)
    {
        $sqlQuery = "select * from `t_users` where  `mobile`=? and `status`!=0";
        $res=$this->getDb()->prepare($sqlQuery);
        $res->bindValue(1,$mobile);

        if ($res->execute()){
            if ($res->rowCount()>0)
                return $res;
        }

        return false;
    }


    public function getUser($username)
    {
        $sqlQuery = "select * from `t_users` where  `username`=? and `status`!=0";
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
        $sqlQuery="update `t_users` set `last_activity`=? where `username`=? and `status`!=0";
        $res = $this->getDb()->prepare($sqlQuery);
        $res->bindValue(1,jDateTime::date("Y-m-d H:i:s"));
        $res->bindValue(2,$username);

        if ($res->execute()){
            if ($res->rowCount()>0)
                return true;
        }

        return false;
    }



    public function userExist($username)
    {
        $sqlQuery = "select * from `t_users` where `username`=? and `status`!=0 ";
        $res = $this->getDb()->prepare($sqlQuery);
        $res->bindValue(1,$username);


        if ($res->execute()){
            if ($res->rowCount()>0)
                return true;;
        }

        return false;
    }


    //*************************************** user details *********************



    public function insertUserDetails($data)
    {

        $sqlQuery="insert into `t_user_details` set `user_id`=? ,`fname`=? , `lname`=? , `state`=? , `city`=?
, `address`=? , `phone`=? , `postal_code`=?";

        $res = $this->getDb()->prepare($sqlQuery);
        $res->bindValue(1,$data['userId']);
        $res->bindValue(2,$data['fName']);
        $res->bindValue(3,$data['lName']);
        $res->bindValue(4,$data['state']);
        $res->bindValue(5,$data['city']);
        $res->bindValue(6,$data['address']);
        $res->bindValue(7,$data['phone']);
        $res->bindValue(8,$data['postalCode']);


        if ($res->execute()){
            if ($res->rowCount()>0)
                return true;
        }

return false;

    }


    public function userDetailsExist($username)
    {
        $sqlQuery="select * from `t_user_details` where 
`user_id`=(select `id` from `t_users` where `username`=? and `status`!=0)";

        $res = $this->getDb()->prepare($sqlQuery);
        $res->bindValue(1,$username);


        if ($res->execute()){
            if ($res->rowCount()>0)
                return true;
        }

        return false;
    }






}