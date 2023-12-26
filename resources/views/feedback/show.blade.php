@extends('layouts.dashboard')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-end">
                <a href="{{ route('bookingDetails.index') }}" class="btn btn-sm btn-danger">Back</a>
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

            <div class="mb-2">
                <div class="form-group">
                    <p>Name: {{ $editbookingDetail->name }}</p>
                </div>
            </div>
            <div class="mb-2">
                <div class="form-group">
                    <p>Email: {{ $editbookingDetail->email }}</p>
                </div>
            </div>
            <div class="mb-2">
                <div class="form-group">
                    <p>IC Number: {{ $editbookingDetail->icnumber }}</p>
                </div>
            </div>
            <div class="mb-2">
                <div class="form-group">
                    <p>Phone Number: {{ $editbookingDetail->phone_number }}</p>
                </div>
            </div>
            <div class="mb-2">
                <div class="form-group">
                    <p>Type of Homestay: {{ $editbookingDetail->typeofhomestay }}</p>
                </div>
            </div>
            <div class="mb-2">
                <div class="form-group">
                    <p>Room Number: {{ $editbookingDetail->roomnumber }}</p>
                </div>
            </div>
            <div class="mb-2">
                <div class="form-group">
                    <p>Check-In: {{ $editbookingDetail->checkin }}</p>
                </div>
            </div>
            <div class="mb-2">
                <div class="form-group">
                    <p>Check-Out: {{ $editbookingDetail->checkout }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection