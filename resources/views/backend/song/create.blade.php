@extends('layouts.app')

@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-12">
        <h4 class="text-white">Box Management</h4>
    </div>
    <div class="col-md-6">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('backend.box.index') }}">Box</a></li>
            <li class="breadcrumb-item active">Box Create</li>
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
                <form action={{ route('backend.song.store') }} method="POST" enctype="multipart/form-data">
                    @csrf
                    <hr>
                    <div class="body mt-5">
                        <h6>Basic Information</h6>
                        <hr>
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="name">Prayer Zone</label>
                                    <input type="text" class="form-control" name="prayerzone" id="prayerzone" placeholder="Prayer Zone" value="{{ old('prayerzone') }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="name">Prayer Date </label>
                                    <input type="date" class="form-control" name="prayertimedate" id="prayertimedate" placeholder="Prayer Date" value="{{ old('prayertimedate') }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="name">Prayer Time-seq </label>
                                    <input type="text" class="form-control" name="prayertimeseq" id="prayertimeseq" placeholder="Prayer Time-seq" value="{{ old('prayertimeseq') }}">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="name">Prayer Time</label>
                                    <input type="time" class="form-control" name="prayertime" id="prayertim" placeholder="Prayer Time" value="{{ old('prayertime') }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="name">Subscriber</label>
                                    <select class="form-control" name="subscriber_id" id="subscriber_id">
                                        <option value="" disabled selected>Select Subscriber</option>
                                        @foreach ($subscribers as $subscriber)
                                        <option value="{{ $subscriber->id }}" {{ old('subscriber_id') == $subscriber->id ? 'selected' : '' }}>{{ $subscriber->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="name">Box</label>
                                    <select class="form-control" name="box_id" id="box_id">
                                        <option value="" disabled selected>Select Box</option>
                                        @foreach ($boxes as $box)
                                        <option value="{{ $box->id }}" {{ old('box_id') == $box->id ? 'selected' : '' }}>{{ $box->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5">
                            <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Save</button>
                            <a href="{{ route('backend.song.index') }}" class="btn btn-danger"><i class="icon-logout"></i> Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->
@endsection
