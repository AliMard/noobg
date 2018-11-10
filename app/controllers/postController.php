<?php
/**
 * Created by PhpStorm.
 * User: Ali M
 * Date: 11/9/2018
 * Time: 7:26 PM
 */

class PostController extends Controller
{


    public function __construct()
    {
    }



    public function index()
    {

    }






    public function getSliderPost()
    {

        Validate::$STATUS='';


        if (isset($_REQUEST['']) && isset($_REQUEST['']) ){





        }else{
            Validate::$INFORMATION='parameter not set';
        }

        echo json_encode(Validate::getResultArray());

    }







    //   get 14 news

    public function getLatestNews()
    {

    }



    //
    public function getNewsByCategory()
    {




    }





    //     get video posts  section




    // get default 10 video
    public function getLatestVideo()
    {

    }


    //get video
    public function getVideoByCategory()
    {

    }











}