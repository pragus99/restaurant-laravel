@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-white bg-dark mb-3">
                <div class="card-header">Update Food Category</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('category.update', [$category->id]) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $category->name }}">
                            @error('name')
                            <span class="text text-warning" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary">
                                Update
                            </button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection