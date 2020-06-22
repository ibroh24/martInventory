@extends('layouts.master')
@section('title')
    Faajs | Update Inventory
@endsection

@section('breadcrumb')
    Inventory
@endsection
@section('menuname')
    Inventory Data 
@endsection
@section('submenu')
    Update Inventory
@endsection

@section('content')
{{-- <div class="row"> --}}
    
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title">
                <b>Update Inventory</b>
            </h4>
            <hr>
            

            <br>
            <table id="datatable-buttons" class="table table-striped table-colored table-info">
                <thead>
                <tr>
                    <th>Action</th>
                    <th>Product Name</th>
                    <th>Bulk Remain Qty</th>
                    <th>Unit Remain Qty</th>
                    <th>Product Category</th>
                    {{-- <th>Bulk Remain</th>
                    <th>Unit Remain</th> --}}
                    {{-- <th>Added Date</th> --}}
                    <th>Entered By</th>
                </tr>
                </thead>


                <tbody>
                    @if ($inventoryDatas->count() > 0)
                    @foreach ($inventoryDatas as $inventory)
                    {{-- {{dd($inventory)}} --}}
                <tr>
                    <td>
                        @if (!Auth::user()->isAdmin)
                            <center>
                                <a href="{{ route('inventory.edit', ['id'=>$inventory->productslug]) }}" title="Edit {{$inventory->productname}} Data" class="btn btn-sm btn-success  glyphicon glyphicon-edit" ></a>                            
                            </center>
                        @else
                            <a href="{{ route('inventory.edit', ['id'=>$inventory->productslug]) }}" title="Edit {{$inventory->productname}} Data" class="btn btn-sm btn-success glyphicon glyphicon-edit" ></a>
                        @endif
                        @if (Auth::user()->isAdmin)
                            <a onclick=" return confirm('Are you sure you want to delete {{$inventory->productname}} Data')" title="Delete {{$inventory->productname}} Data"  href="{{ route('inventory.destroy', ['id'=>$inventory->productslug])}}" class="btn btn-sm btn-danger glyphicon glyphicon-trash"></a>
                        @endif
                    </td>
                    <td>{{$inventory->productname}}</td>
                    <td>{{$inventory->productbulkremain}}</td>
                    <td>{{$inventory->productunitremain}}</td>
                    <td>{{$inventory->productcategory}}</td>
                    {{-- <td>{{(int)number_format($inventory->bulksellingprice, 2)}}</td>
                    <td>{{(int)number_format($inventory->unitsellingprice, 2)}}</td> --}}
                    {{-- <td>{{$inventory->created_at->format('l, F d, Y')}}</td> --}}
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
