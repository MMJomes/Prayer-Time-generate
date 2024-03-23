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
        <table class="table table-bordered DataTable table-hover table-striped table-condensed">
            <thead class="bg-info text-white text-center">
                <tr>
                    <th>Tarikh Miladi</th>
                    <th>Tarikh Hijri</th>
                    <th>Hari</th>
                    <th>Imsak</th>
                    <th>Subuh</th>
                    <th>Syuruk</th>
                    <th>Zohor</th>
                    <th>Asar</th>
                    <th>Maghrib</th>
                    <th>Isyak</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($innerArrayValues as $innerArray)
                    <tr>
                        <td>{{ $innerArray['date'] }}</td>
                        <td>{{ $innerArray['hijri'] }}</td>
                        <td>{{ $innerArray['day'] }}</td>
                        <td>{{ $innerArray['imsak'] }}</td>
                        <td>{{ $innerArray['fajr'] }}</td>
                        <td>{{ $innerArray['syuruk'] }}</td>
                        <td>{{ $innerArray['dhuhr'] }}</td>
                        <td>{{ $innerArray['asr'] }}</td>
                        <td>{{ $innerArray['maghrib'] }}</td>
                        <td>{{ $innerArray['isha'] }}</td>
                        <td><a href="{{ route('backend.song.detail', ['date' => $innerArray['date'], 'zone' => $zone]) }}">Detail</a></td>

                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

@endsection
