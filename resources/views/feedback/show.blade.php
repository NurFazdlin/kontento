@extends('layouts.dashboard')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-end">
                <a href="{{ route('Feedback.index') }}" class="btn btn-sm btn-danger">Back</a>
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
                    <p>Room Number: {{ $editbookingDetail->roomnumber }}</p>
                </div>
            </div>
            <div class="mb-2">
                <div class="form-group">
                    <p>Date: {{ $editbookingDetail->date }}</p>
                </div>
            </div>
            <div class="mb-2">
                <div class="form-group">
                    <p>Staff Service: {{ $editbookingDetail->staffservice }}</p>
                </div>
            </div>
            <div class="mb-2">
                <div class="form-group">
                    <p>Cleanliness: {{ $editbookingDetail->cleanliness }}</p>
                </div>
            </div>
            <div class="mb-2">
                <div class="form-group">
                    <p>Housekeeping: {{ $editbookingDetail->housekeeping }}</p>
                </div>
            </div>
            <div class="mb-2">
                <div class="form-group">
                    <p>Cafe Food: {{ $editbookingDetail->cafefood }}</p>
                </div>
            </div>
            <div class="mb-2">
                <div class="form-group">
                    <p>Amenities: {{ $editbookingDetail->amenities }}</p>
                </div>
            </div>
            <div class="mb-2">
                <div class="form-group">
                    <p>Overall Homestay Rating: {{ $editbookingDetail->overallhomestayrating }}</p>
                </div>
            </div>
            <div class="mb-2">
                <div class="form-group">
                    <p>Other Comments: {{ $editbookingDetail->othercomments }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection