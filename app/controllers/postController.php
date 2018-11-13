<?php
/**
 * Created by PhpStorm.
 * User: Ali M
 * Date: 11/9/2018
 * Time: 7:26 PM
 */

class PostController extends Controller
{


    private $sliderInst ;
    private $postInst ;


    public function __construct()
    {
        $this->sliderInst= $this->model('slider');
        $this->postInst = $this->model('post');

    }



    public function index()
    {

    }






    public function getSliderPost()
    {





        //check parameter
        if ( true ){


            //validate parameter

            if (true){


                if ( $data = $this->sliderInst->getSlider())
                {

                    $idAr =[];
                    while ($row = $data->fetch(PDO::FETCH_ASSOC)){
                      array_push($idAr,$row['post_id']);
                    }


                    if ($postData =$this->postInst->getNewsById($idAr,0,7,'insert_date','ASC' )){

                        Validate::$DATA['sliderPost']=[];
                        while ($row = $this->postInst->fetch(PDO::FETCH_ASSOC)){
                            array_push(Validate::$DATA['sliderPost'],['title'=>$row['title'],
                                'thumbnailsUrl'=>$row['thumbnails_url'] , 'issueData'=>$row['insert_date'],
                                'createBy'=>$row['insert_by'] , 'categoryName`'=>$row['name'] , 'issueTime'=>$row['insert_time'] ,
                                'newsText'=>$row['text']
                            ]);
                        }

                    }else{
                        Validate::$INFORMATION='get post data error';
                    }


                }else{
                    Validate::$INFORMATION="get slider data error";
                }

            }else{
                Validate::$INFORMATION='parameter not valid';
            }



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