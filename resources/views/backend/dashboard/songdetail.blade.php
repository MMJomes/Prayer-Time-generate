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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Song Detail</h4>
                </div>
                @php
                    $keysToLoop = ['imsak', 'fajr', 'syuruk', 'dhuhr', 'asr', 'maghrib', 'isha'];
                @endphp
                <div class="card-body">
                    <div class="row">
                        @foreach ($innerArrayValues as $innerArray)
                            @foreach ($keysToLoop as $key)
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <h4 class="card-title bold"
                                                style="text-transform: uppercase; text-align: left;">{{ ucfirst($key) }}
                                            </h4>
                                            <h4 class="card-subtitle bold"
                                                style="font-size: 14px !important; text-align: left; font-weight: bold;"> <i
                                                    class="fa fa-clock"></i> {{ $innerArray[$key] }}</h4>
                                            @foreach ($songs as $song)
                                                @php
                                                    $innerTime = date('H:i:s', strtotime($innerArray[$key]));
                                                    $songTime = date('H:i:s', strtotime($song->prayertime));
                                                @endphp
                                                @if ($innerTime == $songTime)
                                                    <h5 class="card-subtitle bold"
                                                        style="font-size: 13px !important; text-align: left;font-weight: bold;">
                                                        <i class="fa fa-music"></i>
                                                        {{ $song->name ? ucfirst($song->name) : '-' }}</h5>
                                                    <h5 class="card-subtitle bold"
                                                        style="font-size: 13px !important; text-align: left;font-weight: bold;">
                                                        <i class="fa fa-play"></i>
                                                        {{ $song->prayertimeseq ? ucfirst($song->prayertimeseq) : '-' }}
                                                    </h5>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
