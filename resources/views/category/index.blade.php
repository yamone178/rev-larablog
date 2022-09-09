@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-12 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Category List</h3>
                        <hr>
                        <table class="table align-middle">
                           <thead>
                            <tr>
                                <th>#</th>
                                <th>Category</th>
                                <th>Owner</th>
                                <th>Action</th>
                            </tr>

                           </thead>
                            <tbody>

                            @foreach($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->title}}</td>
                                <td>{{$category->user->name}}</td>
                                <td class="">
                                    @can('update',$category)
                                    <a href="{{route('category.edit',$category->id)}}" class="btn btn-sm me-2 d-inline-block btn-outline-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    @endcan

                                    @can('delete',$category)
                                    <form action="{{route('category.destroy',$category->id)}}" class="d-inline-block" method="post">
                                        @csrf
                                        @method('delete')
                                        <button  class="btn btn-sm btn-outline-danger">
                                            <i class="bi bi-trash3"></i>
                                        </button>



                                    </form>

                                        @endcan
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
