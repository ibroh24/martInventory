@extends('layouts.master')
@section('title')
    Faajs | View Categories
@endsection

@section('breadcrumb')
    Product Categories
@endsection
@section('menuname')
    Categories 
@endsection
@section('submenu')
    View Categories
@endsection

@section('content')
{{-- <div class="row"> --}}
    
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title">
                {{-- <b>View Inventory</b> --}}
                <a href="{{route('category.create')}}" class="btn btn-info waves-light waves-effect w-md font-weight-bold text-uppercase"><span class="glyphicon glyphicon-plus"><b> New</b></span></a>
            </h4>
            <hr>
            

            <br>
            <table id="datatable-buttons" class="table table-striped table-hover table-colored table-info">
                <thead>
                <tr>
                    <th>Action</th>
                    <th>Category Name</th>
                    <th>Category Description</th>
                    <th>Created Date</th>
                </tr>
                </thead>


                <tbody>
                    @if ($categories->count() > 0)
                    @foreach ($categories as $category)
                <tr>
                    <td>
                        <a href="{{ route('category.edit', ['id'=>$category->categoryslug]) }}" title="Edit {{$category->categoryname}} Category" class="btn btn-sm btn-success glyphicon glyphicon-edit m-r-5" ></a>
                        <a onclick=" return confirm('Are you sure you want to delete {{$category->categoryname}} Category')" title="Delete {{$category->categoryname}} Category"  href="{{ route('category.destroy', ['id'=>$category->categoryslug])}}" class="btn btn-sm btn-danger glyphicon glyphicon-trash"></a>
                    </td>
                    <td>{{$category->categoryname}}</td>
                    <td>{{$category->categorydesc}}</td>
                    <td>{{$category->created_at->format('l, F d, Y')}}</td>
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
