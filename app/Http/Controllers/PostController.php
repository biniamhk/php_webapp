<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function newUpdate(Posts $post, Request $request){
        $incomingFields = $request->validate([
            "title"=> "required",
            "body"=>"required"
        ]);
        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
       $post->update($incomingFields);
       return back()->with('success','updated successfully');

    }
    public function showEditForm(Posts $post){
        return view("edit-post",['posted' => $post]);

    }
    public function delete(Posts $post){
        if (!auth()->check()){
            return 'you can not delete';
        }
       $post->delete();
       return redirect('/profile/' . auth()->user()->username)->with('success','post succesfully deleted');
    }

    public function showSinglePost(Posts $posted){

        $posted['body']= strip_tags($posted->body);
                return view("single-post",['postedvar'=>$posted]);
    }
    public function storeNewPost(Request $request){
        $incomingFields= $request->validate([
            "title"=> "required",
            "body"=> "required",
        ]);
        //before we add them to DB we cut the html tags that can come from a user this prevents us from
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
        if(!auth()->check()){
            return redirect("/")->with("error"," you need to log in to post a blog");
        }
        return view('create-post');
    } 
}
