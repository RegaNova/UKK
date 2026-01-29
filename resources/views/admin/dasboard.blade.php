@extends('layouts.app')
@section('title','Dashboard Admin')

@section('content')
<h4>Dashboard Admin</h4>

<div class="row">
    <div class="col-md-3">
        <div class="card text-bg-primary mb-3">
            <div class="card-body">
                <h5>Total User</h5>
                <h3>10</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-bg-success mb-3">
            <div class="card-body">
                <h5>Total Alat</h5>
                <h3>25</h3>
            </div>
        </div>
    </div>
</div>
@endsection
