@extends('layouts.master')
@section('title')
    Faajs | View Measurement
@endsection

@section('breadcrumb')
    Unit Of Measurement
@endsection
@section('menuname')
    UOM 
@endsection
@section('submenu')
    View UOM
@endsection

@section('content')
{{-- <div class="row"> --}}
    
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title">
                {{-- <b>View Inventory</b> --}}
                <a href="{{route('measure.create')}}" class="btn btn-info waves-light waves-effect w-md font-weight-bold text-uppercase"><span class="glyphicon glyphicon-plus"><b> New</b></span></a>
            </h4>
            <hr>
            

            <br>
            <table id="datatable-buttons" class="table table-striped table-hover table-colored table-info">
                <thead>
                <tr>
                    <th>Action</th>
                    <th>UOM Name</th>
                    <th>UOM Description</th>
                    <th>Created Date</th>
                </tr>
                </thead>


                <tbody>
                    @if ($measure->count() > 0)
                    @foreach ($measure as $uom)
                    <tr>
                        <td>
                            <a href="{{ route('measure.edit', ['id'=>$uom->uomslug]) }}" title="Edit {{$uom->uomname}} Data" class="btn btn-sm btn-success glyphicon glyphicon-edit m-r-5" ></a>
                            <a onclick=" return confirm('Are you sure you want to delete {{$uom->uomname}} Data')" title="Delete {{$uom->uomname}} Data"  href="{{ route('measure.destroy', ['id'=>$uom->uomslug])}}" class="btn btn-sm btn-danger glyphicon glyphicon-trash"></a>
                        </td>
                        <td>{{$uom->uomname}}</td>
                        <td>{{$uom->uomdescription}}</td>
                        <td>{{$uom->created_at->format('l, F d, Y')}}</td>
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
