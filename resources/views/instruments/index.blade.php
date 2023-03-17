@extends('layouts.app')
@section('title','Project Task')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Instruments</div>
                    <div class="card-body">
                        <a href="{{ route('instruments.create') }}" class="btn btn-primary mb-3">Create</a>
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                        <p>{{ $message }}</p>
                        </div>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($instruments as $instrument)
                                    <tr>
                                        <td>{{ $instrument->name }}</td>
                                        <td>{{ $instrument->type }}</td>
                                        <td>{{ Str::words($instrument->description, '10'); }}</td>
                                        <td>
                                            <a href="{{ route('instruments.show', $instrument) }}" class="btn btn-secondary">View</a>
                                            <a href="{{ route('instruments.edit', $instrument) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('instruments.destroy', $instrument) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
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