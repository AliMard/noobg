<?php
/**
 * Created by PhpStorm.
 * User: Ali M
 * Date: 11/4/2018
 * Time: 9:05 PM
 */

class TestController extends Controller
{



    public function index()
    {

       $testModel = $this->model("admin");

     if (  $testModel->insert([
           'username'=>'3123',
           'name'=>'ali mard' ,
           'password'=>'312344',
           'pkey'=>'158',
           'email'=>'ali@test.com344'
       ]))
         echo "true";

    }





}