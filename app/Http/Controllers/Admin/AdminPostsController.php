<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Photo;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminPostsController extends Controller
{

    private function store_file($file)
    {

        $name = time() . $file->getClientOriginalName();
        $file->move('uploads', $name);
        $photo = Photo::create(['file' => $name]);

        return $photo->id;

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::pluck('name', 'id')->toArray();

        return view('admin.posts.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreatePostRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {

        $inputData = $request->all();

        if ($request->file('photo_id')) {
            $inputData['photo_id'] = $this->store_file($request->file('photo_id'));
        }

        $inputData['user_id'] = Auth::user()->id;

        Post::create($inputData);

        Session::flash('notify', 'Post has been successfully created');

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::pluck('name', 'id');

        return view('admin.posts.edit', ['categories' => $categories, 'post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePostRequest|Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $id)
    {

        $inputData = $request->all();

        $post = Post::findOrfail($id);

        $inputData['user_id'] = Auth::user()->id;

        if ($request->file('photo_id')) {
            $inputData['photo_id'] = $this->store_file($request->file('photo_id'));
        }

        $post->update($inputData);

        Session::flash('notify', 'Post has been successfully updated');

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $postPhoto = public_path() . $post->photo->file;

        if(file_exists($postPhoto)){
            @unlink($postPhoto);
        }

        $post->delete();

        Session::flash('notify', 'Post has been successfully deleted');

        return redirect()->route('posts.index');
    }
}
