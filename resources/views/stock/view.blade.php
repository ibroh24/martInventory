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
                <a href="{{route('inventory.create')}}" class="btn btn-info waves-light waves-effect w-md font-weight-bold text-uppercase"><span class="glyphicon glyphicon-plus"><b> New</b></span></a>
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
                    <th>Bulk Price</th>
                    <th>Unit Price</th>
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
                            <a href="{{ route('inventory.edit', ['id'=>$inventory->productslug]) }}" title="Edit {{$inventory->productname}} Data" class="btn btn-sm btn-success  glyphicon glyphicon-edit" ></a>                            
                        </center>
                        @else
                            <a href="{{ route('inventory.edit', ['id'=>$inventory->productslug]) }}" title="Edit {{$inventory->productname}} Data" class="btn btn-sm btn-success glyphicon glyphicon-edit" ></a>
                        @endif
                        @if (Auth::user()->isAdmin)
                            <a onclick=" return confirm('Are you sure you want to delete {{$inventory->categoryname}} Data')" title="Delete {{$inventory->productname}} Data"  href="{{ route('inventory.destroy', ['id'=>$inventory->productslug])}}" class="btn btn-sm btn-danger glyphicon glyphicon-trash"></a>
                        @endif
                    </td>
                    <td>{{$inventory->productname}}</td>
                    <td>{{$inventory->productqty}}</td>
                    <td>{{$inventory->productcategory}}</td>
                    <td>{{number_format($inventory->bulksellingprice, 2)}}</td>
                    <td>{{number_format($inventory->unitsellingprice, 2)}}</td>
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
