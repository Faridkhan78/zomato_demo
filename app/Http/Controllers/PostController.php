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
    
    public function updatePost($id)
    {
        $post = Post::find($id);
        return view('user.postviewall', compact('post'));
    }
    public function updateUser(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|min:3|max:30',
            'description' => 'required',
            'image_path' => 'required',
            'published_date' => 'required'
        ]);
        $post = Post::where(['id' => $request['id']])->update([

            'title' => $request['title'],
            'description' => $request['description'],
            'image_path' => $request['image_path'],
            'published_date' => $request['published_date'],
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


}
