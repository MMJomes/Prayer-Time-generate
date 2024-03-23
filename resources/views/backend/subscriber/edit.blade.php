@extends('layouts.app')

@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-12">
            <h4 class="text-white">Subscriber Management</h4>
        </div>
        <div class="col-md-6">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('backend.subscriber.index') }}">Subscriber</a></li>
                <li class="breadcrumb-item active">Edit Subscriber</li>
            </ol>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action={{ route('backend.subscriber.update', $subscriber->id) }} method="POST">
                        @csrf
                        @method('PUT')

                        <div class="body">
                            <h6>Basic Information</h6>
                            <hr>
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Name"
                                            value="{{ old('name', $subscriber->name) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5">
                                <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Update</button>
                                <a href="{{ route('backend.subscriber.index') }}" class="btn btn-danger"><i
                                        class="icon-logout"></i> Back</a>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
@endsection
