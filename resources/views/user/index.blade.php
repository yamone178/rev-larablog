@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-12 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">User List</h3>
                        <hr>
                        <table class="table align-middle">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>name</th>
                                <th>email</th>

                                @notAuthor
                                <th>role</th>
                                @endnotAuthor

                                <th>Action</th>
                            </tr>

                            </thead>
                            <tbody>

                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    @notAuthor
                                    <td>{{$user->role}}</td>
                                    @endnotAuthor
                                    <td class="">





                                            <form action="{{route('user.destroy',$user->id)}}" class="d-inline-block" method="post">
                                                @csrf
                                                @method('delete')
                                                <button  class="btn btn-sm btn-outline-danger">
                                                    <i class="bi bi-trash3"></i>
                                                </button>



                                            </form>


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
