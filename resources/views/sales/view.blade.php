@extends('layouts.master')
@section('title')
    Faajs | View Sales
@endsection

@section('breadcrumb')
    Sales
@endsection
@section('menuname')
    Sales 
@endsection
@section('submenu')
    View Sales
@endsection

@section('content')
{{-- <div class="row"> --}}
    
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title">
                {{-- <b>View Inventory</b> --}}
                <a href="{{route('sales.create')}}" class="btn btn-info waves-light waves-effect w-md font-weight-bold text-uppercase"><span class="glyphicon glyphicon-plus"><b> New</b></span></a>
            </h4>
            <hr>
            

            <br>
            <table id="datatable-buttons" class="table table-striped table-colored table-info">
                <thead>
                <tr>
                    @if (Auth::user()->isAdmin)
                        <th>Action</th>
                    @endif
                    <th>Item Name</th>
                    {{-- <th>Sales Type</th> --}}
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    {{-- <th>Unit Price</th> --}}
                    <th>Sold Date</th>
                    <th>Sold Time</th>
                    <th>Sold By</th>
                </tr>
                </thead>


                <tbody>
                    @if ($allSales->count() > 0)
                    @foreach ($allSales as $sales)
                <tr>
                    @if (Auth::user()->isAdmin)
                    <td>
                       <a href="{{ route('sales.edit', ['id'=>$sales->itemslug]) }}" title="Edit {{$sales->itemname}} Data" class="btn btn-sm btn-success  glyphicon glyphicon-edit" ></a>                            
                        
                        {{-- @else
                            <a href="{{ route('sales.edit', ['id'=>$sales->itemslug]) }}" title="Edit {{$sales->itemname}} Data" class="btn btn-sm btn-success glyphicon glyphicon-edit" ></a> --}}
                       
                        {{-- @if (Auth::user()->isAdmin)
                            <a onclick=" return confirm('Are you sure you want to delete {{$sales->itemname}} Data')" title="Delete {{$sales->itemname}} Data"  href="{{ route('sales.destroy', ['id'=>$sales->itemslug])}}" class="btn btn-sm btn-danger glyphicon glyphicon-trash"></a>
                        @endif --}}
                        <a onclick=" return confirm('Are you sure you want to delete {{$sales->itemname}} Data')" title="Delete {{$sales->itemname}} Data"  href="{{ route('sales.destroy', ['id'=>$sales->itemslug])}}" class="btn btn-sm btn-danger glyphicon glyphicon-trash"></a>
                    </td>
                    @endif
                    <td>{{$sales->itemname}}</td>
                    <td>{{$sales->itemqty}}</td>
                   
                    <td>{{number_format($sales->itemprice, 2)}}</td>
                    <td>{{number_format($sales->totalprice, 2)}}</td>
                    <td>{{$sales->created_at->format('l, F d, Y')}}</td>
                    <td>{{$sales->created_at->format('h:i a')}}</td>
                    <td>{{$sales->soldby}}</td>
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
