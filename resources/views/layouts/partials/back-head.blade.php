<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<!-- Favicon icon -->
<title>Prayer Time Generation</title>
<!-- Custom CSS -->
<style>
    .dataTables_filter {
        display: none !important;
    }
</style>
<link href="{{ asset('assets/dist/css/style.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/dist/css/custom.css') }}">

@if ($datatable ?? false)
<link rel="stylesheet" type="text/css" href="{{ asset('assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css') }}">

{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css"> --}}
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap4.min.css">
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css"> --}}
@endif
