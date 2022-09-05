@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-12 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create Post</h4>
                        <hr>
                        <div class="mt-3">
                            <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">

                                @csrf

                                <div class="mb-3">
                                    <label for="" class="form-label">Title</label>
                                    <input type="text" value="{{old('title')}}" class="form-control @error('title') is-invalid @enderror" name="title">

                                    @error('title')
                                        <span class="invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>

                                <label for="" class="form-label">Select Category</label>
                                <select name="category" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>

                                <div class="mb-3">
                                    <label for="" class="form-label">Description</label>
                                    <textarea name="description" id="" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror">
                                        {{old('description')}}
                                    </textarea>

                                    @error('description')
                                    <span class="invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Feature Image</label>
                                    <input type="file" value="{{old('featured_image')}}" class="form-control @error('featured_image') is-invalid @enderror" name="featured_image">
                                    @error('featured_image')
                                    <span class="invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-lg btn-primary ">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
