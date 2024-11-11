<!-- jquery -->
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<!-- jquery Migrate -->
<script src="{{ asset('assets/js/jquery-migrate.min.js') }}"></script>
<!-- bootstrap -->
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<!-- Slick Slider -->
<script src="{{ asset('assets/js/slick.js') }}"></script>
<!-- Plugins Js -->
<script src="{{ asset('assets/js/plugin.js') }}"></script>
<!-- Fancy box Js -->
<script src="{{ asset('assets/js/fancybox.umd.js') }}"></script>
<!-- Map Js -->
<script src="{{ asset('assets/js/map/raphael.min.js') }}"></script>
<script src="{{ asset('assets/js/map/jquery.mapael.js') }}"></script>
<script src="{{ asset('assets/js/map/world_countries.js') }}"></script>

<!-- main js -->
<script src="{{ asset('assets/js/main.js') }}"></script>

<!-- Data table js -->
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script>
    $(document).ready(function() {
        if ($('.data-table tbody tr').length > 1) {
            $('.data-table').DataTable({
                processing: true,
                serverSide: false,
                responsive: true,
                fixedColumns: true,
                fixedHeader: true,
            });
        }

        $('.select2').select2();
    });
</script>

@if (session('success'))
    <script>
        Swal.fire({
            icon: "success",
            title: "Done!",
            text: "{{ session('success') }}",
        });
    </script>
@endif

@if (session('error'))
    <script>
        Swal.fire({
            icon: "error",
            title: "Error!",
            text: "{{ session('error') }}",
        });
    </script>
@endif

@stack('custom-scripts')
