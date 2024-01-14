@extends('layouts.dashboard')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-end">
                <a href="{{ route('Feedback.create') }}" class="btn btn-sm btn-primary">Create</a>
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
                        <th>Name</th>
                        <th>Room Number</th>
                        <th>Date</th>
                        <th>Staff Service</th>
                        <th>Cleanliness</th>
                        <th>Housekeeping</th>
                        <th>Cafe Food</th>
                        <th>Amenities</th>
                        <th>Overall Homestay Rating</th>
                        <th>Other Comments</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($feedbacks as $feedback)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $feedback->name }}</td>
                            <td>{{ $feedback->roomnumber }}</td>
                            <td>{{ $feedback->date }}</td>
                            <td>{{ $feedback->staffservice }}</td>
                            <td>{{ $feedback->cleanliness }}</td>
                            <td>{{ $feedback->housekeeping }}</td>
                            <td>{{ $feedback->cafefood }}</td>
                            <td>{{ $feedback->amenities }}</td>
                            <td>{{ $feedback->overallhomestayrating }}</td>
                            <td>{{ $feedback->othercomments }}</td>
                            <td>
                                <a href="{{ route('Feedback.show', $feedback->id) }}"
                                    class="btn btn-sm btn-primary">Show</a>
                                <a href="{{ route('Feedback.edit', $feedback->id) }}"
                                    class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('Feedback.destroy', $feedback->id) }}" method="POST"
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