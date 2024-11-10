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
        $('.data-table').DataTable({
            processing: true,
            serverSide: false,
            responsive: true,
            fixedColumns: true,
            fixedHeader: true,
        });
    });
</script>

@stack('custom-scripts')
