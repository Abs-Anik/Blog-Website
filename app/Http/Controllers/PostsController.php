<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;



class PostsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->paginate(3);

        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
            return view('posts.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required',
            'image'=>'image|nullable|max:2024'
        ]);

        $store = new Post();

        $store->title = $request->title;
        $store->body = $request->body;
        $store->user_id = auth()->user()->id;

        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;
            $file->move('image/img/',$filename);

            $store->image = $filename;
        }

        else{
            return $request;
            $store->image = '';
        }
        $store->save();

        return redirect('/posts')->with('success','Post created');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = Post::find($id);

        return view('posts.show',['show'=>$show]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Post::Find($id);

        // Check for correct user

        if(auth()->user()->id !== $edit->user_id){
            return redirect('/posts')->with('error','Unauthorized Access');
        }

        return view('posts.edit',['edit'=>$edit]);
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
            'title'=>'required',
            'body'=>'required',
            'image'=>'image|nullable|max:2024'
        ]);

        $update = Post::Find($id);

        $update->title = $request->title;
        $update->body = $request->body;

          if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;
            $file->move('image/img/',$filename);

            $update->image = $filename;
        }

        $update->update();

        return redirect('/posts')->with('success','Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Post::Find($id);

         // Check for correct user

        if(auth()->user()->id !== $destroy->user_id){
            return redirect('/posts')->with('error','Unauthorized Access');
        }

        $destroy->delete();

        return redirect('/posts')->with('success','Post Deleted');
    }
}
