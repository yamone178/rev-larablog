@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row my-3 justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="card">
                    <div class="card-body">
                       <h4 class="card-title">Gallery</h4>
                        <hr>

                        <div class="">
                            @forelse(Auth::user()->photos as $photo)
                                <img src="{{asset('storage/'.$photo->name)}}" alt="" class="rounded" width="80px">
                            @empty
                        </div>

                           <h3>No photo to show</h3>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
