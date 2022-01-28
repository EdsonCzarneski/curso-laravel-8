<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\StoreUpdatePost;

class PostController extends Controller
{
    //
    public function index(){

        $posts = Post::get();
        
        return view('admin.posts.index', compact ('posts'));
    }

    public function create(){
        return view('admin.posts.create');
    }

    public function store(StoreUpdatePost $request){
        Post::create($request->all());
        return redirect()->route('posts.index');
    }

    public function show($id){
        //$post = Post::where('id', $id)->firts();
        if (!$post = Post::find($id)){
            return redirect()->route('posts.index');
        }
        return view('admin.posts.show', compact('post'));
    }

    public function destroy($id){
        if (!$post = Post::find($id)){
            return redirect()->route('posts.index');
        } 
        $post->delete();
        return redirect() 
            -> route('posts.index')
            ->with('message', 'Post Deletado com Sucesso!');
    }
    public function edit($id){     

        if(!$post = Post::find($id)){
            return redirect()->back();
        }
        return view('admin.posts.edit', compact('post'));
    }

    public function update(StoreUpdatePost $request, $id){
        if(!$post = Post::find($id)){
            return redirect()->route('posts.index');
        }
        //dd("editando o post número {$post->id}");
        $post->update($request->all());

        return redirect()
            ->route('posts.index')
            ->with('message','Post editado com sucesso!');
    }
}
