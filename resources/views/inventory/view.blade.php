@extends('layouts.master')
@section('title')
    Faajs | View Inventory
@endsection

@section('breadcrumb')
    Inventory
@endsection
@section('menuname')
    Inventory Data 
@endsection
@section('submenu')
    View Inventory
@endsection

@section('content')
{{-- <div class="row"> --}}
    
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title">
                {{-- <b>View Inventory</b> --}}
                <a href="{{route('inventory.create')}}" class="btn btn-info waves-light waves-effect w-md font-weight-bold text-uppercase"><span class="glyphicon glyphicon-plus"><b> New</b></span></a>
            </h4>
            <hr>
            

            <br>
            <table id="datatable-buttons" class="table table-striped table-colored table-info">
                <thead>
                <tr>
                    @if (Auth::user()->isAdmin)
                        <th>Action</th>
                    @endif
                    <th>Product Name</th>
                    <th>Quantity</th>
                    {{-- <th>Unit Qty</th> --}}
                    <th>Product Category</th>
                    <th>Price</th>
                    {{-- <th>Unit Price</th> --}}
                    <th>Added Date</th>
                    <th>Entered By</th>
                </tr>
                </thead>


                <tbody>
                    @if ($inventories->count() > 0)
                    @foreach ($inventories as $inventory)
                    {{-- {{dd($inventory)}} --}}
                <tr>
                    @if (Auth::user()->isAdmin)
                     <td>
                        <a href="{{ route('inventory.edit', ['id'=>$inventory->productslug]) }}" title="Edit {{$inventory->productname}} Data" class="btn btn-sm btn-success glyphicon glyphicon-edit" ></a>  
                    </td>
                    @endif 
                    <td>{{$inventory->productname}}</td>
                    <td>{{$inventory->productqty}}</td>
                    <td>{{$inventory->productcategory}}</td>
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
