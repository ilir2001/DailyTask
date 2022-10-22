<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DailyTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = auth()->user()->posts;

        $posts = Post::where('user_id', auth()->id())->orderBy('id', 'DESC')->paginate(5);
        return view('posts', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);
        $post = [
            'title' => $request->title,
            'user_id' => auth()->id()
        ];
        Post::create($post);


        return redirect()->route('daily.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::where(['id' => $id, 'user_id' => auth()->id()])->first();
        if(!is_null($post))
        return view('view', ['post' => $post ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::where(['id' => $id, 'user_id' => auth()->id()])->first();

        if(!is_null($post))
        return view('edit', ['post' => $post ]);

        abort(404);
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
        $this->validate($request,[
            'title' => 'required|max:255'
        ]);

        $post = Post::where(['id' => $id, 'user_id' => auth()->id()])->first();

        $data['title'] = $request['title'];
        $data['completed'] = ($request['completed'] == 1) ? 1 : 0;

        $post->update($data);
        return redirect()->route('daily.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if($post->delete()) {
        return redirect()->route("daily.index")->with('status', 'Todo was deleted successfully');
        }
        else {
        return redirect()->back()->with('status', 'Something want wrong while the todo item!');
        }
    }
}
