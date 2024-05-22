<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    //public function homepage(){
        //THE COMMENTED CODE SENDS infor to view homepageexample.blade.php 
        //$myname="Biniam Haile";
        //$mycatname="meowsalot";
        //lets say we bring a lot of data from data base then send it to view
        //$myanimals= ["dog","cat","hen","bird","ox","lion"];
        //return view("homepageexample",['animals'=>$myanimals,'name'=>$myname,'catname'=>$mycatname]); 
       //  return view("homepage");
   // }
    
    public function aboutpage (){
        return view('single-post');
    }

}    

