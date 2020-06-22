@extends('layouts.master')
@section('title')
    Faajs | View Stock
@endsection

@section('breadcrumb')
    Stock Analysis
@endsection
@section('menuname')
    Stock Data 
@endsection
@section('submenu')
    View Stock
@endsection

@section('content')
{{-- <div class="row"> --}}
    
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title">
                {{-- <b>View Inventory</b> --}}
                {{-- <a href="{{route('inventory.create')}}" class="btn btn-info waves-light waves-effect w-md font-weight-bold text-uppercase"><span class="glyphicon glyphicon-plus"><b> New</b></span></a> --}}
            </h4>
            <hr>
            

            <br>
            <table id="datatable-buttons" class="table table-striped table-colored table-info">
                <thead>
                <tr>
                    <th>Action</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Product Category</th>
                    <th>Product UOM</th>
                    <th>Buying Price</th>
                    <th>Selling Price</th>
                    <th>Added Date</th>
                    <th>Entered By</th>
                </tr>
                </thead>


                <tbody>
                    @if ($productInfo->count() > 0)
                    @foreach ($productInfo as $inventory)
                <tr>
                    <td>
                        @if (!Auth::user()->isAdmin)
                        <center>
                            <a href="{{ route('stock.show', ['id'=>$inventory->productslug]) }}" title="Edit {{$inventory->productname}} Data" class="btn btn-sm btn-success  glyphicon glyphicon-stats" ></a>                            
                        </center>
                        @else
                            <a href="{{ route('stock.show', ['id'=>$inventory->productslug]) }}" title="Edit {{$inventory->productname}} Data" class="btn btn-sm btn-success glyphicon glyphicon-stats"></a>
                        @endif
                        @if (Auth::user()->isAdmin)
                            <a title="Print {{$inventory->productname}} Data"  href="{{ route('stock.print', ['id'=>$inventory->productslug])}}" class="btn btn-sm btn-primary glyphicon glyphicon-print"></a>
                        @endif
                    </td>
                    <td>{{$inventory->productname}}</td>
                    <td>{{$inventory->productqty}}</td>
                    <td>{{$inventory->productcategory}}</td>
                    <td>{{$inventory->productuom}}</td>
                    <td>{{number_format($inventory->buyingprice, 2)}}</td>
                    <td>{{number_format($inventory->sellingprice, 2)}}</td>
                    <td>{{$inventory->created_at->format('l, F d, Y')}}</td>
                    <td>{{$inventory->enteredby}}</td>
                </tr>
                @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
{{-- </div> --}}

@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#datatable').dataTable();
            $('#datatable-keytable').DataTable({keys: true});
            $('#datatable-responsive').DataTable();
            $('#datatable-colvid').DataTable({
                "dom": 'C<"clear">lfrtip',
                "colVis": {
                    "buttonText": "Change columns"
                }
            });
            $('#datatable-scroller').DataTable({
                ajax: "../plugins/datatables/json/scroller-demo.json",
                deferRender: true,
                scrollY: 380,
                scrollCollapse: true,
                scroller: true
            });
            var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
            var table = $('#datatable-fixed-col').DataTable({
                scrollY: "300px",
                scrollX: true,
                scrollCollapse: true,
                paging: false,
                fixedColumns: {
                    leftColumns: 1,
                    rightColumns: 1
                }
            });
        });
        TableManageButtons.init();

    </script>


    
@endsection
