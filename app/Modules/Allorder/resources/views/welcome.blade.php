@extends('layout.dashboard')

@section('maincontent');
    <div class="content-wrapper">
        <div class="card-header">
            <h3 class="card-title"><b>Order</h3>
        </div>
        <div class="card-body">
            <!-- /.card-header -->
            <table id="myTable" class="display table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id </th>
                        <th>Order Date</th>
                        <th>Total Price</th>
                        <th>Payment Method </th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($order as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->totalprice }}</td>
                            <td>Cash on Delivery</td>
                            <td>{{ $item->order_status }}</td>
                            <td>
                                <div style="text-align: center;">
                                    <a href="{{ url('admin/allorder/edit', [$item->id]) }}" class="edit"><i class="fas fa-pencil-alt"></i></a>
                                    &nbsp;
                                    <a href="{{ url('admin/allorder/invoice', [$item->id]) }}"><i
                                            class="fas fa-eye"></i></a>
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
    <script src="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

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
        });
    </script>
@endpush

