@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-12 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Update Post</h4>
                        <hr>
                        <div class="mt-3">
                            <form action="{{route('post.update',$post->id)}}" id="postUpdate" method="post" enctype="multipart/form-data">
                               @method('put')
                                @csrf
                            </form>
                                <div class="mb-3">
                                    <label for="" class="form-label">Title</label>
                                    <input type="text" form="postUpdate"  value="{{old('title',$post->title)}}" class="form-control @error('title') is-invalid @enderror" name="title">
                                    @error('title')
                                    <span class="invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Description</label>
                                    <textarea name="description" form="postUpdate" id="" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror">
                                        {{old('description',$post->description)}}
                                    </textarea>
                                    @error('description')
                                    <span class="invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">

                                    <div class="">
                                        @if(isset($post->featured_image))
                                            <img src="{{asset('storage/'.$post->featured_image)}}" width="150px" alt="">
                                        @endisset
                                    </div>
                                    <label for="" class="form-label">Feature Image</label>

                                    <input type="file"
                                           value="{{old('featured_image',$post->featured_image)}}"
                                           form="postUpdate" class="form-control
                                        @error('featured_image') is-invalid @enderror"
                                           name="featured_image">
                                    @error('featured_image')
                                    <span class="invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-lg btn-primary " form="postUpdate">Update</button>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
