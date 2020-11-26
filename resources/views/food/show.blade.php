@extends('layouts.app')

@section('content')
<div class="container text-white">
    <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card bg-dark mb-3">
                    <img src="{{ asset($food->takeImage()) }}" class="card-img-top" alt='#'>
                </div>
            </div>


            <div class="col-md-6">
                <div class="card mb-3 bg-dark">
                    <div class="card-body">
                        <h5 class="card-title">{{ $food->name }}</h5>
                        <p class="card-text">{{ $food->description }}</p>
                    </div>
                    <div class="card-footer text-center">
                        <span>Price : ${{ $food->price }}</span>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection