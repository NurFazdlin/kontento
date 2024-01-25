@extends('layouts.dashboard')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-end">
                <a href="{{ route('Galleries.create') }}" class="btn btn-sm btn-primary">Create</a>
            </div>
        </div>

        <div class="card-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @endif

            @if ($message = Session::get('error'))
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Uploaded Images</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($Galleries as $Gallery)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $Gallery->picture }}</td>
                            <td>{{ $Gallery->description }}</td>
                            <td>
                                <a href="{{ route('Galleries.show', $Gallery->id) }}"
                                    class="btn btn-sm btn-primary">Show</a>
                                <a href="{{ route('Galleries.edit', $Gallery->id) }}"
                                    class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('Galleries.destroy', $Gallery->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection