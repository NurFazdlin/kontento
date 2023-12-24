@extends('layouts.dashboard')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-end">
                <a href="{{ route('bookingDetails.create') }}" class="btn btn-sm btn-primary">Create</a>
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
                        <th>Email</th>
                        <th>IC Number</th>
                        <th>Phone Number</th>
                        <th>Type of Homestay</th>
                        <th>Room Number</th>
                        <th>Check-In</th>
                        <th>Check-Out</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($bookingDetails as $bookingDetail)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $bookingDetail->name }}</td>
                            <td>{{ $bookingDetail->email }}</td>
                            <td>{{ $bookingDetail->icnumber }}</td>
                            <td>{{ $bookingDetail->phone_number }}</td>
                            <td>{{ $bookingDetail->typeofhomestay }}</td>
                            <td>{{ $bookingDetail->roomnumber }}</td>
                            <td>{{ $bookingDetail->checkin }}</td>
                            <td>{{ $bookingDetail->checkout }}</td>
                            <td>
                                <a href="{{ route('bookingDetails.show', $bookingDetail->id) }}"
                                    class="btn btn-sm btn-primary">Show</a>
                                <a href="{{ route('bookingDetails.edit', $bookingDetail->id) }}"
                                    class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('bookingDetails.destroy', $bookingDetail->id) }}" method="POST"
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