<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{

    public function postregisterview()
    {
        return view('user.datatable');
    }
    public function postregister(Request $request)
    {
       //  dd($request->all());
        $data = $request->validate([
            'title' => 'required|string|min:3|max:30',
            'description' => 'required',
            'image_path' => 'required',
            'published_date' => 'required'
        ]);
     
         
       // Parse the published date into the correct format
        $publishedDate = Carbon::createFromFormat('d F Y h:i a', $request->published_date)->format('Y-m-d H:i:s');
                                 
        // Handle file upload
         $filePath = $request->file('image_path')->store('uploads', 'public');

         $user = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $filePath,
            'published_date' => $publishedDate,
        ]);
        //$post = Post::create($data);


        if ($user) {
            return redirect()->route('postviewall');
        }
    }
    public function viewPostall(Request $request)
    {
        $post = Post::get();
        // dd($user);
        return view('user.postviewall', compact('post'));
        // return view('basicdatatable')->with('user', $user);
    }
    public function deletePost($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('postviewall');
    }
    
    public function editpost($id)
    {
        $post = Post::find($id);
        return view('user.postviewall', compact('post'));
    }
    public function updatePost(Request $request)
    {
        
        $id=$request->input('id');
        $data = $request->validate([
                       
            'title' => 'required|string|min:3|max:30',
            'description' => 'required',
            'image_path' => 'required',
            'published_date' => 'required'
        ]);
        
        $filePath = $request->file('image_path')->store('uploads', 'public');
        $publishedDate = Carbon::createFromFormat('d F Y h:i a', $request->published_date)->format('Y-m-d H:i:s');


        $post = Post::where(['id' =>$id])->update([

            'title' => $request['title'],
            'description' => $request['description'],
            'image_path' => $filePath,
            'published_date' => $publishedDate,
        ]);
        if ($post) {
            return redirect()->route('postviewall');
        }
    }

    public function updateApprovePost($id)
    {
        $post = Post::where(['id' => $id])->update([
            'status' => 1,
        ]);
        if ($post) {
            return redirect()->route('postviewall');
        }
    }

    public function updateDisapprovePost($id)
    {
        $post = Post::where(['id' => $id])->update([
            'status' => 0,
        ]);
        if ($post) {
            return redirect()->route('postviewall');
        }
    }

    public function reviewPost($id){
        $post = Post::find($id);
        return view('user.review_card', compact('post'));
    }

    public function showCards()
    {
        // Fetching data from the database (assuming you have a 'posts' table)
        $card = Post::all(); 

        // Returning the data to the view
        return view('review_card', compact('card'));
    }
}
