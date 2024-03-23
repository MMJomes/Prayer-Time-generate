<script src="{{ asset('assets/node_modules/jquery/jquery-3.2.1.min.js') }}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{ asset('assets/node_modules/popper/popper.min.js') }}"></script>
<script src="{{ asset('assets/node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{ asset('assets/dist/js/perfect-scrollbar.jquery.min.js') }}"></script>
<!--Wave Effects -->
<script src="{{ asset('assets/dist/js/waves.js') }}"></script>
<!--Menu sidebar -->
<script src="{{ asset('assets/dist/js/sidebarmenu.js') }}"></script>
<!--stickey kit -->
<script src="{{ asset('assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
<script src="{{ asset('assets/node_modules/sparkline/jquery.sparkline.min.js') }}"></script>
<!--Custom JavaScript -->
<script src="{{ asset('assets/dist/js/custom.min.js') }}"></script>

<script src="{{ asset('js/env-setup.js') }}"></script>

<script src="{{ asset('js/app.js') }}"></script>

<script src="{{ asset('assets/dist/js/main.js') }}"></script>

@if ($rolesJS ?? false)
    <script src="{{ asset('assets/dist/js/roles.js') }}"></script>
@endif

@if ($datatable ?? false)
    <!-- This is data table -->
    <script src="{{ asset('assets/node_modules/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js') }}"></script>
     <!-- start - This is for export functionality only -->
     <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
     <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
     <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
     <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
@endif

@stack('scripts')
