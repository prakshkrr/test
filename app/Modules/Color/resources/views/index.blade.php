@extends('layout.dashboard')

@section('maincontent2')

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Color</h3>
        </div>

        <div class="card-body">
            <div class="form-group text-right">
                <a href="{{ route('color.add') }}" class="btn btn-outline-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
                <a href="{{ route('color.showtrash') }}" class="btn btn-outline-danger"><i class="fas fa-trash"></i> Trash</a>
            </div>
            <!-- /.card-header -->
            <table id="myTable" class="display table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Color_Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($colors as $col)
                        <tr>
                            <td>{{ $col->id }}</td>
                            <td id="name-{{ $col->id }}">{{ $col->name }}</td>
                            <td>
                                <label class="switch">
                                    <input type="checkbox" data-id="{{ $col->id }}" class="toggle-class"
                                        {{ $col->status ? 'checked' : '' }}>
                                    <div class="slider round"></div>
                                </label>
                            </td>
                            <td>
                                <div>

                                    <a href="{{ url('/admin/color/edit',[$col->id]) }}" class="editdata" name="{{ $col->name }}"
                                        data-id="{{ $col->id }}"><i
                                            class="far fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="{{ route('color.index') }}" class="delete"
                                        data-id="{{ $col->id }}"><i class="fas fa-trash"></i> </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('custom-script')
    {{-- <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/dist/bootstrap-switch-button.min.js"></script> --}}
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/jquery.jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>


    <script>
        $(document).ready(function() {
            $('.card-body #myTable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "responsive": true,
                "autoWidth": true,
            });


            $('table .delete').click(function(e) {
                e.preventDefault();
                var id = $(this).attr('data-id');
                
                // console.log('idvalue',id);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/admin/color/deletecolor",
                    data: {
                        'id': id,
                    },
                    // dataType: "dataType",
                    success: function(response) {
                        alert("color name deleted");
                            console.log('response', response);
                            window.location='/admin/color'
                        
                    }
                    
                });
            });


            $('.toggle-class').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;

                var id = $(this).attr('data-id');
                console.log(status);
                console.log('id', id);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    // dataType: "json",
                    url: '/admin/color/changestatus',
                    data: {
                        'status': status,
                        'id': id
                    },
                    success: function(data) {}
                });
            });



        });
    </script>

@endpush
<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 24px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 20px;
        width: 20px;
        left: 2px;
        bottom: 2px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

</style>

</body>

</html>
