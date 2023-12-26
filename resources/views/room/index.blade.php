@extends('layouts.dashboard')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-end">
                <a href="{{ route('rooms.create') }}" class="btn btn-sm btn-primary">Create</a>
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
                        <th>Room Number</th>
                        <th>Type of Homestay</th>
                        <th>Room Type</th>
                        <th>Occupancy</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rooms as $room)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $room->name }}</td>
                            <td>{{ $room->gender }}</td>
                            <td>{{ $room->phone_number }}</td>
                            <td>{{ $room->matric_number }}</td>
                            <td>{{ $room->address }}</td>
                            <td>{{ $room->age }}</td>
                            <td>
                                <a href="{{ route('rooms.show', $room->id) }}"
                                    class="btn btn-sm btn-primary">Show</a>
                                <a href="{{ route('rooms.edit', $room->id) }}"
                                    class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('rooms.destroy', $room->id) }}" method="POST"
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