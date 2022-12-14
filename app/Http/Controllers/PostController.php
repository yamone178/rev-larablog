<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts= Post::latest()
        ->when(Auth::user()->isAuthor(),fn($q)=>$q->where("user_id",Auth::id()))

        ->when(request('keyword'),function ($q){
            $keyword= request('keyword');
            $q->orWhere('title','like',"%$keyword%")
                ->orWhere('description','like',"%$keyword%");
        })


            ->paginate(6)
            ->withQueryString();
//        dd($posts);
        return view('post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return  view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {



        $post= new Post();
        $post->title= $request->title;
        $post->description= $request->description;
        $post->excerpt= Str::words($request->description,50,'...');
        $post->slug= Str::slug($request->title);
        $post->user_id= Auth::id();


        if ($request->hasFile('featured_image')){
               $newName = uniqid().'featured_image.'.$request->file('featured_image')->extension();
                $request->file('featured_image')->storeAs('public', $newName);
           $post->featured_image = $newName;
       }



        $post->save();


        //save photo

        foreach ($request->photos as $photo){

                $newName = uniqid().'photos.'.$photo->extension();
                $photo->storeAs('public', $newName);

                //save to db
            $photo= new Photo();
            $photo->post_id= $post->id;
            $photo->name = $newName;


         $photo->save();

        }


        return redirect()->route('post.index')->with('status','post created');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {


//        Gate::authorize('view',$post);

        return view('post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        Gate::authorize('update',$post);
        return view('post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {



        Gate::authorize('update',$post);
        $post->title= $request->title;
        $post->slug= Str::slug($request->title);
        $post->description= $request->description;
        $post->excerpt= Str::words($request->description,50,'...');
        $post->user_id= User::inRandomOrder()->first()->id;

        if ($request->hasFile('featured_image')){

            Storage::delete('public/'.$post->featured_image);

            $newName = uniqid().'featured_image.'.$request->file('featured_image')->extension();
            $request->file('featured_image')->storeAs('public', $newName);
            $post->featured_image = $newName;
        }




        $post->update();



        if (isset($request->photos)){
            foreach ($request->photos as $photo){

                $newName = uniqid().'photos.'.$photo->extension();
                $photo->storeAs('public', $newName);

                //save to db
                $photo= new Photo();
                $photo->post_id= $post->id;
                $photo->name = $newName;


                $photo->save();

            }

        }


        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {

        Gate::authorize('delete',$post);

        $photos=  Storage::allFiles('public');
        array_shift($photos);
        foreach ($photos as $photo){
            Storage::delete('public/'.$photo);
        }



        Storage::delete('public/'.$post->featured_image);


        $post->delete();
        return redirect()->route('post.index');
    }
}
