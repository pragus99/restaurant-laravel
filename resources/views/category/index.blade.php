@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-9">
            @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif
            <div class="card text-white bg-dark mb-3">

                <div class="card-header">
                    <span style="font-size: 23px">All Category Food</span>
                    <span class="float-right">
                        <a href="{{ route('category.create') }}">
                        <button class="btn btn-outline-primary">
                            Add Category
                        </button>
                        </a>
                    </span>
                </div>
                <div class="card-body">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($categories)>0)
                            @foreach ($categories as $index => $category)
                            <tr>
                                <th scope="row">{{ $index+1 }}</th>
                                <td>{{ $category->name }}</td>
                                <td scope="row">
                                    <a href="{{ route('category.edit', [$category->id]) }}" class="mr-2">
                                        <button class="btn btn-outline-info">Edit</button>
                                    </a>
                                    <button class="btn btn-outline-danger" data-toggle="modal"
                                        data-target="#exampleModal{{ $category->id }}">
                                        Delete
                                    </button>
                                    @include('category.partials.modal-delete')
                                </td>
                            </tr>
                            @endforeach

                            @else
                            <td>There is no Category</td>
                            @endif
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection