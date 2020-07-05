@extends('layouts.master')
@section('title')
    Faajs | View Suppliers
@endsection

@section('breadcrumb')
    Suppliers Information
@endsection
@section('menuname')
    Suppliers 
@endsection
@section('submenu')
    View Suppliers
@endsection

@section('content')
{{-- <div class="row"> --}}
    
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title">
                {{-- <b>View Inventory</b> --}}
                <a href="{{route('supplier.create')}}" class="btn btn-info waves-light waves-effect w-md font-weight-bold text-uppercase"><span class="glyphicon glyphicon-plus"><b> New</b></span></a>
            </h4>
            <hr>
            

            <br>
            <table id="datatable-buttons" class="table table-striped table-hover table-colored table-info">
                <thead>
                <tr>
                    <th>Action</th>
                    <th>Supplier Name</th>
                    <th>Good Supplies</th>
                    <th>Supplier Phone</th>
                    <th>Supplier Address</th>
                    <th>Debt Amount</th>
                </tr>
                </thead>


                <tbody>
                    @if ($supplier->count() > 0)
                    @foreach ($supplier as $supply)
                    <tr>
                        <td>
                            <a href="{{ route('supplier.edit', ['id'=>$supply->supplierslug]) }}" title="Edit {{$supply->suppliername}} Information" class="btn btn-sm btn-success glyphicon glyphicon-edit m-r-5" ></a>
                            <a onclick=" return confirm('Are you sure you want to delete {{$supply->suppliername}} Information?')" title="Delete {{$supply->suppliername}} Information"  href="{{ route('supplier.destroy', ['id'=>$supply->supplierslug])}}" class="btn btn-sm btn-danger glyphicon glyphicon-trash"></a>
                        </td>
                        <td>{{$supply->suppliername}}</td>
                        <td>{{$supply->suppliedproduct}}</td>
                        <td>{{$supply->phone}}</td>
                        <td>{{$supply->address}}</td>
                        <td>{{number_format($supply->totaldebt, 2, '.', ',')}}</td>
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
