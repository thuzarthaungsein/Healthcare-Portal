<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use DB;

class GalleryController extends Controller
{
    public function index()
    {
       
    }
    
    public function getPhotobyCustomerId($customer_id) {
        $photo_list = Gallery::where("customer_id",$customer_id)
                            ->where('type','=', 'photo')
                            ->get()
                            ->toArray();
        return $photo_list;
    }

    public function getVideobyCustomerId($customer_id) {
        $video_list = Gallery::where("customer_id",$customer_id)
                            ->where('type','=', 'video')
                            ->get()
                            ->toArray();
        return $video_list;
    }
}