@extends('layouts.app')

@section('content')
    <div class="row page-titles">
        <div class="col-md-12">
            <h4 class="text-white">Priyar Time Management</h4>
        </div>
        <div class="col-md-6">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('backend.song.index') }}">Add New Songs</a></li>
                <li class="breadcrumb-item active">Create New Song</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 center">
            <h1 style="text-align: center">There are no songs available.</h1>
        </div>
    </div>
@endsection
