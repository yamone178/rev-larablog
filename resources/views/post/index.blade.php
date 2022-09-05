@extends('layouts.app')

@section('searchText')

   @if(request('keyword'))
       <p class="mb-0 me-2">
           Search By : <span>{{request('keyword')}}</span>
       </p>
       <a href="{{route('post.index')}}" class="me-3 text-dark">
           <i class="bi bi-trash3"></i>
       </a>
   @endif
@endsection

@section('search')
    <form action="{{route('post.index')}}" method="get" class="d-flex" role="search">
        <input class="form-control me-2 border-0 shadow-sm" type="search" name="keyword" placeholder="Search" aria-label="Search">
        <button class="btn border-0" type="submit">
            <i class="bi bi-search"></i>
        </button>
    </form>
@stop

@section('content')



    <div class="container">
        <div class="row justify-content-center my-4">
            <div class="col-12 col-lg-8">
                @foreach($posts as $post)
               <div class="card mb-3">
                   <div class="card-body">
                       <h4 class="card-title">{{$post->title}}</h4>
                       <span>{{$post->created_at->diffforHumans()}}</span>
                       <p class="mt-3">{{$post->excerpt}}</p>
                       <div class="d-flex justify-content-between align-items-center">


                           <div class="d-flex ">
                               <a href="{{route('post.edit',$post->id)}}" class="btn me-2 btn-warning">
                                   <i class="bi bi-pencil-fill"></i>
                               </a>

                               <form action="{{route('post.destroy',$post->id)}}" method="post">
                                   @csrf
                                   @method('delete')

                                   <button  class="btn btn-danger">
                                       <i class="bi bi-trash3"></i>
                                   </button>


                               </form>

                           </div>
                           <a href="{{route('post.show',$post->id)}}" class="btn btn-primary">
                               Show More
                           </a>
                       </div>
                   </div>
               </div>

                @endforeach

                <div class="mt-4">
                    {{$posts->onEachside(1)->links()}}
                </div>
            </div>
        </div>
    </div>


@endsection
