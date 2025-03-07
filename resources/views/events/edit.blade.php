@extends('layout.layout')

@section('content')
<div class="container mt-5 w-auto">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Edit Record</h4>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('events.update', $record->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div>
                            <p class="font-bold text-3xl mb-2">EDIT A RECORD</p>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" name="name" id="name" class="form-control border border-blue-500 rounded" value="{{ $record->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" name="email" id="email" class="form-control border border-blue-500 rounded" value="{{ $record->email }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone:</label>
                            <input type="text" name="phone" id="phone" class="form-control border border-blue-500 rounded" value="{{ $record->phone }}" required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('events.index') }}" class="btn btn-secondary bg-red-500 p-2 rounded text-white">Cancel</a>
                            <button type="submit" class="btn btn-primary bg-blue-500 p-2 rounded text-white">Update Record</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
