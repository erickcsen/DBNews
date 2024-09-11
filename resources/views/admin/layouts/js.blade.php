<!--   Core JS Files   -->
<script src="/dashboard-asset/assets/js/core/jquery.3.2.1.min.js"></script>
<script src="/dashboard-asset/assets/js/core/popper.min.js"></script>
<script src="/dashboard-asset/assets/js/core/bootstrap.min.js"></script>

<!-- jQuery UI -->
<script src="/dashboard-asset/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="/dashboard-asset/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="/dashboard-asset/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>



<!-- Chart JS -->
{{-- <script src="{{asset('/dashboard-asset/assets/js/plugin/chart.js/chart.min.js')}}"></script> --}}

<!-- jQuery Sparkline -->
{{-- <script src="{{asset('/dashboard-asset/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script> --}}

<!-- Chart Circle -->
{{-- <script src="{{asset('/dashboard-asset/assets/js/plugin/chart-circle/circles.min.js')}}"></script> --}}

<!-- Datatables -->
{{-- <script src="{{asset('/dashboard-asset/assets/js/plugin/datatables/datatables.min.js')}}"></script> --}}

<!-- Bootstrap Notify -->
{{-- <script src="{{asset('/dashboard-asset/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script> --}}

<!-- jQuery Vector Maps -->
{{-- <script src="{{asset('/dashboard-asset/assets/js/plugin/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('/dashboard-asset/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js')}}"></script> --}}

<!-- Sweet Alert -->
{{-- <script src="{{asset('/dashboard-asset/assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script> --}}

<!-- Atlantis JS -->
{{-- <script src="{{asset('/dashboard-asset/assets/js/atlantis.min.js')}}"></script> --}}

<!-- Atlantis DEMO methods, don't include it in your project! -->
{{-- <script src="{{asset('/dashboard-asset/assets/js/setting-demo.js')}}"></script>
<script src="{{asset('/dashboard-asset/assets/js/demo.js')}}"></script>
<script>
    $('#lineChart').sparkline([102,109,120,99,110,105,115], {
        type: 'line',
        height: '70',
        width: '100%',
        lineWidth: '2',
        lineColor: 'rgba(255, 255, 255, .5)',
        fillColor: 'rgba(255, 255, 255, .15)'
    });

    $('#lineChart2').sparkline([99,125,122,105,110,124,115], {
        type: 'line',
        height: '70',
        width: '100%',
        lineWidth: '2',
        lineColor: 'rgba(255, 255, 255, .5)',
        fillColor: 'rgba(255, 255, 255, .15)'
    });

    $('#lineChart3').sparkline([105,103,123,100,95,105,115], {
        type: 'line',
        height: '70',
        width: '100%',
        lineWidth: '2',
        lineColor: 'rgba(255, 255, 255, .5)',
        fillColor: 'rgba(255, 255, 255, .15)'
    });
</script> --}}

{{-- ckeditor --}}
<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#txtarea'), {
            ckfinder: {
                uploadUrl: "{{route('ckeditor.upload',['_token'=>csrf_token()])}}", 
            }
        })
        .catch(error => {
            console.error(error);
        });
</script>

{{-- sweet alert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function() {
            const form = this.closest('.delete-form');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#1572e8',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>

{{-- jquery alert --}}
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<script>
    $(document).ready(function() {
        $('#search-form').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: $(this).attr('action'),
                type: 'GET',
                data: $(this).serialize(),
                success: function(response) {
                    $('body').html(response);
                }
            });
        });
    });
</script>




