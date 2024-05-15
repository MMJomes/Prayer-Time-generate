<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<!-- Favicon icon -->
<title>Prayer Time Generation</title>
<!-- Custom CSS -->
<style>
    .dataTables_filter {
        display: none !important;
    }

    @media (max-width: 767px) {

        .mini-sidebar .footer,
        .mini-sidebar .page-wrapper {
            margin-left: 0px !important;
        }
    }

    @media (min-width: 768px) {

        .mini-sidebar .footer,
        .mini-sidebar .page-wrapper {
            margin-left: 0px !important;
            margin-top: 0px !important;
        }
    }

    @media (min-width: 1024px) {

        .footer,
        .page-wrapper {
            margin-left: 0px !important;
        }
    }


    .avatar-container {
    position: relative;
    width: 100px; /* Adjust as needed */
    height: 100px; /* Adjust as needed */
    overflow: hidden;
    border-radius: 50%; /* Circular shape */
    margin: 0 auto; /* Center align horizontally */
}

.avatar {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Maintain aspect ratio */
    cursor: pointer; /* Change cursor to pointer on hover */
}

.tooltip-label {
    display: block; /* Make label a block element */
    margin-bottom: 10px; /* Add some space between label and avatar */
}

.language-selector {
        display: flex;
        align-items: center;
    }

    .language-selector img {
        width: 30px; /* Adjust as needed */
        height: 30px; /* Adjust as needed */
        border-radius: 50%;
        margin-right: 5px;
    }
</style>
<link href="{{ asset('assets/dist/css/style.min.css') }}" rel="stylesheet">

@if ($datatable ?? false)
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap4.min.css">
@endif
