@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">

            @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif

            <div class="card text-white bg-dark mb-3">
                <div class="card-header">
                    <span style="font-size: 23px">All Food</span>
                    <span class="float-right">
                        <a href="{{ route('food.create') }}">
                            <button class="btn btn-outline-primary">Add Food</button>
                        </a>
                    </span>
                </div>
                <div class="card-body">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Price</th>
                                <th scope="col">Category</th>
                                <th colspan="2" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($foods)>0)
                            @foreach ($foods as $key => $food)
                            <tr>
                                <td>
                                    @if ($food->image)
                                    {{-- <img src="{{ asset("storage/" . $post->thumbnail) }}" alt="#"
                                    class="card-img-top" height="100"> using below from model--}}
                                    <img src="{{ asset($food->takeImage()) }}" alt="#"
                                        style="width:100px;height:100px;object-fit: cover;object-position:center;">
                                    @endif
                                </td>
                                <td scope="row">{{ $food->name }}</td>
                                <td scope="row">{{ $food->description }}</td>
                                <td scope="row">${{ $food->price }}</td>
                                <td scope="row">{{ $food->category->name }}</td>
                                <td scope="row">
                                    <a href="{{ route('food.edit', [$food->id]) }}">
                                        <button class="btn btn-outline-info">Edit</button>
                                    </a>
                                </td>
                                <td scope="row"> <button class="btn btn-outline-danger" data-toggle="modal"
                                        data-target="#exampleModal{{ $food->id }}" class="mt-2">
                                        Delete
                                    </button>
                                </td>
                                @include('food.partials.modal-delete')
                            </tr>

                            @endforeach

                            @else
                            <td>There is no food</td>
                            @endif
                        </tbody>
                    </table>
                    <div class="ml-2">
                        {{ $foods->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection