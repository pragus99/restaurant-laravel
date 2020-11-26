@extends('layouts.app')

@section('content')
<div class="container text-white">
    <div class="row justify-content-center">

        @foreach ($categories as $category)
        <div class="col-md-12">
            <h2>{{ $category->name }}</h2>
            <div class="row row-cols-1 row-cols-md-4">
                @foreach (App\Models\Food::where('category_id',$category->id)->get() as $food)
                <div class="col md-3">
                    <div class="card mb-5 bg-dark">
                        <img src="{{ asset($food->takeImage()) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $food->name }}</h5>
                            <p class="card-text">{{ Str::limit($food->description, 40) }}</p>
                            <a href="{{ route('food.show', [$food->id]) }}" class="btn btn-secondary">See more</a>
                        </div>
                        <div class="card-footer text-center">
                            <span>${{ $food->price }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection