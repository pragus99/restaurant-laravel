@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif
            <div class="card text-white bg-dark mb-3">
                <div class="card-header">Add Food Category</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('category.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" autofocus>
                            @error('name')
                            <span class="text text-warning" role="alert">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary">
                                Submit
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection