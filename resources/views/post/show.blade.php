@extends('layouts.app')

@section('search')
    <form class="d-flex" role="search">
        <input class="form-control me-2 border-0 shadow-sm" type="search" placeholder="Search" aria-label="Search">
        <button class="btn border-0" type="submit">
            <i class="bi bi-search"></i>
        </button>
    </form>
@stop

@section('content')



    <div class="container">
        <div class="row justify-content-center my-4">
            <div class="col-12 col-lg-8">

                    <div class="card mb-3">
                        <div class="card-body">
                            <h4 class="card-title">{{$post->title}}</h4>
                            <span>{{$post->created_at->diffforHumans()}}</span>
                            <p class="mt-3">{{$post->description}}</p>
                            @if(isset($post->featured_image))
                                <img src="{{asset("storage/".$post->featured_image)}}" width="150px" class="rounded-3" alt="">
                            @endif
                            <div class="d-flex justify-content-between align-items-center">

                                <div class="">

                                </div>
                                <div class="">
                                    <a href="{{route('post.index')}}" class="btn btn-outline-primary" >All Posts</a>
                                    <a href="{{route('post.show',$post->id)}}" class="btn btn-primary">
                                        Show More
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>



            </div>
        </div>
    </div>


@endsection
