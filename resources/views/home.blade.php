@extends('layouts.dashboard')

@section('content')

<!-- bookingDetails -->
<div class="col-lg-6">
    <div class="card">
      <div class="card-header">
        <h5 class="m-0">User Booking Details</h5>
      </div>
      <div class="card-body">
        <h6 class="card-title">Special title treatment</h6>

        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="{{ route('bookingDetails.index') }}" class="btn btn-primary">View</a>
      </div>
    </div>
</div>

<!-- room -->
<div class="col-lg-6">
  <div class="card">
    <div class="card-header">
      <h5 class="m-0">Room Availability</h5>
    </div>
    <div class="card-body">
      <h6 class="card-title">Special title treatment</h6>

      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
      <a href="{{ route('rooms.index') }}" class="btn btn-primary">View</a>
    </div>
  </div>
</div>

<!-- gallery -->
<div class="col-lg-6">
  <div class="card">
    <div class="card-header">
      <h5 class="m-0">Gallery</h5>
    </div>
    <div class="card-body">
      <h6 class="card-title">Special title treatment</h6>

      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
      <a href="{{ route('Galleries.index') }}" class="btn btn-primary">View</a>
    </div>
  </div>
</div>

<!-- feedback -->
<div class="col-lg-6">
  <div class="card">
    <div class="card-header">
      <h5 class="m-0">Feedback</h5>
    </div>
    <div class="card-body">
      <h6 class="card-title">Special title treatment</h6>

      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
      <a href="" class="btn btn-primary">View</a>
    </div>
  </div>
</div>

@endsection
