@extends('layout.dashboard')
@section('maincontent');
<div class="content-wrapper">
    <div class="row">
        <div class="col-12">
            <div class="callout callout-info">
                <h5><i class="fas fa-info"></i> Note:</h5>
                This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
                @foreach ($order as $odr)
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <i class="fas fa-chocolate"></i> Laptop World               
                                <small class="float-right">Date: 2/10/2014</small>
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                          <strong>Billing address</strong>
                            <address>
                              <address>
                              
                            </address>
                                <strong>Admin, Inc.</strong><br>
                                795 Folsom Ave, Suite 600<br>
                                San Francisco, CA 94107<br>
                                Phone: (804) 123-5432<br>
                                Email: info@almasaeedstudio.com 
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                          <strong>Shipping address</strong>
                            <address>
                                <strong>Admin, Inc.</strong><br>
                                795 Folsom Ave, Suite 600<br>
                                San Francisco, CA 94107<br>
                                Phone: (804) 123-5432<br>
                                Email: info@almasaeedstudio.com
                            </address>
                        </div>
                        <address>
                            
                        </address>
                        <div class="col-sm-4 invoice-col">
                          <b>Invoice #007612</b><br>
                          <br>
                          <b>Order ID:</b>{{ $odr->id }}<br>
                          <b>Cash on delevery</b>
                      </div>
                    </div>
                    <!-- /.col -->
                   
                    <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Sr.No</th>
                                <th>order_Date</th>
                                <th>Qty</th>
                                <th>total_Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Order_detail as $odd)
                                <tr>
                                    <td>{{ $odd->id }}</td>
                                    <td>{{ $odd->created_at }}</td>
                                    <td>{{ $odd->qty }}</td>
                                    <td>{{ $odd->total_price }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <!-- accepted payments column -->

                <div class="col-12">
                    {{-- <p class="lead">Amount Due {{ $odr->payment->created_at }}</p> --}}

                    <div class="table-responsive">
                        <table class="table">


                            <tr>
                                <th>Total:</th>
                                <td>{{ $odr->totalprice }}</td>
                            </tr>
                        </table>
                        <hr>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- this row will not appear when printing -->
            <div class="row no-print">
                <div class="col-12">
                    {{-- <a href="#" rel="noopener" target="_blank" class="btn btn-default" ><i class="fas fa-print"></i> Print</a> --}}
                    {{-- <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                        Payment
                    </button> --}}
                    <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;"
                        onclick="window.print()">
                        <i class="fas fa-download"></i> Generate PDF
                    </button>
                </div>
            </div>
            @endforeach
        </div>
        <!-- /.invoice -->
    </div><!-- /.col -->
    </div><!-- /.row -->
@endsection
