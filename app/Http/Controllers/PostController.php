<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function showSinglePost(Posts $posted){
        return view("single-post",['postedvar'=>$posted]);
    }
    public function storeNewPost(Request $request){
        $incomingFields= $request->validate([
            "title"=> "required",
            "body"=> "required",
        ]);
        //before we add the to DB we cut the html tags that can come from a user this prevents us from
        //hacker attackes that may occure.
        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        //Id of the current loggd in user
        $incomingFields['user_id'] = auth()->id();

        $newpost=Posts::create($incomingFields);
         

        return redirect("/post/{$newpost->id}")->with("success","new post successfully created");

    }
    //
    public function showCreateForm(){
        return view('create-post');
    } 
}
