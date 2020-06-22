@extends('layouts.master')
@section('title')
    Faajs | View Users
@endsection

@section('breadcrumb')
    Users
@endsection
@section('menuname')
    Users 
@endsection
@section('submenu')
    View Users
@endsection

@section('content')
{{-- <div class="row"> --}}
    
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title">
                {{-- <b>View Inventory</b> --}}
                <a href="{{route('user.create')}}" class="btn btn-info waves-light waves-effect w-md font-weight-bold text-uppercase"><span class="glyphicon glyphicon-plus"><b> New</b></span></a>
            </h4>
            <hr>
            

            <br>
            <table id="datatable-buttons" class="table table-striped table-hover table-colored table-info">
                <thead>
                <tr>
                    <th>Action</th>
                    <th>Name</th>
                    <th>E - Mail</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Is Admin</th>
                </tr>
                </thead>


                <tbody>
                    @if ($users->count() > 0)
                    @foreach ($users as $user)
                <tr>
                    <td>
                        <a href="{{ route('user.edit', ['id'=>$user->slug]) }}" title="Edit {{$user->username}} user" class="btn btn-sm btn-success glyphicon glyphicon-edit m-r-5" ></a>
                        <a onclick=" return confirm('Are you sure you want to delete {{$user->name}} Data')" title="Delete {{$user->name}} Data"  href="{{ route('user.destroy', ['id'=>$user->slug])}}" class="btn btn-sm btn-danger glyphicon glyphicon-trash"></a>
                    </td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->address}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->isAdmin ? "True" : "False"}}</td>
                </tr>
                @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>


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
