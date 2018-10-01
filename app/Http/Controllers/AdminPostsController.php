<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Photo;
use App\Category;
use Auth;
use Session;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::all();
        return view('admin.posts.index')
            ->with('posts', $post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name','id')->all();
        return view('admin.posts.create')
            ->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $r = request();
        $data = $request->all();
        $this->validate($r, [
            'title'          => 'required',
            'category_id'    => 'required',
            'body'           => 'required',
            'photo_id'       => 'required'
        ]);
        $user = Auth::user();

        if($file = $request->file('photo_id')){
            $file_name = time().$file->getClientOriginalName();
            $file->move('images', $file_name);

            $photo = Photo::create(['photo' => $file_name]);
            $data['photo_id'] = $photo->id;
        }

        $user->posts()->create($data);
        Session::flash('message', 'Post Created Successfully...');
        return redirect()->route('posts.index');

    }

   
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::pluck('name','id')->all();
        return view('admin.posts.edit')
            ->with('post', $post)
            ->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $r = request();
        $data = $request->all();
        $this->validate($r, [
            'title'          => 'required',
            'category_id'    => 'required',
            'body'           => 'required'
        ]);

        if($file = $request->file('photo_id')){
            $file_name = time().$file->getClientOriginalName();
            $file->move('images', $file_name);

            $photo = Photo::create(['photo' => $file_name]);
            $data['photo_id'] = $photo->id;
        }

        Auth::user()->posts()->where('id', $id)->first()->update($data);

        Session::flash('message', 'Post Updated Successfully...');
        return redirect()->route('posts.index');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        unlink(public_path().'/images/'.$post->photo->photo);
        $post->delete();
        Session::flash('message', 'Post Deleted Successfully...');
        return redirect()->route('posts.index');
    }
}
