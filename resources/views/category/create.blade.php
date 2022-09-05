@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-12 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Create Category</h3>
                        <hr>
                        <form action="{{route('category.store')}}"  method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Category title</label>
                                <input type="text" name="title" class="form-control">
                            </div>

                            <div class="text-center w-25 ">
                                <button class="btn btn-primary w-100">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
