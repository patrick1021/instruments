@extends('layouts.app')
@section('title','Project Task')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $instrument->name }}</div>
                    <div class="card-body">
                        <p>Type: {{ $instrument->type }}</p>
                        <p>Description: {{ $instrument->description }}</p>
                        <a href="{{ route('instruments.edit', $instrument) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('instruments.destroy', $instrument) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
