@extends('layouts.master')
@section('title')
    Faajs | Create Supplier
@endsection

@section('breadcrumb')
    Supplier Information
@endsection
@section('menuname')
    Supplier Data
@endsection
@section('submenu')
    New Supplier
@endsection

@section('content')
<div class="col-xs-12">
    <div class="card-box">
        <div class="row">
            <div class="col-sm-12 col-xs-12 m-t-20">
                <h4 class="header-title m-t-0">Create New Supplier</h4>
                <hr>
                {{-- <p class="text-muted font-13 m-b-10">
                    Parsley is a javascript form validation library. It helps you provide your users with feedback on their form submission before sending it to your server.
                </p> --}}

                <div class="p-20">
                    <form method="POST" action="{{route('supplier.store')}}">
                        {{ csrf_field() }}
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                          <strong>Whoops!</strong> There were some problems with your input.<br><br>
                          <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                        </div>
                        @endif
                        @if(session('success'))
                          <div class="alert alert-success">
                              {{ session('success') }}
                          </div> 
                      @endif
                        <div class="row">
                          <div class="col-md-6">
                            <input type="text" name="suppliername" class="form-control" placeholder="Supplier Name">
                          </div>
                          <div class="col-md-6">
                            <input type="text" name="phone" class="form-control" placeholder="Supplier Phone Number">
                          </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                              <input type="text" name="address" class="form-control" placeholder="Supplier Address">
                            </div>
                            <div class="col-md-6">
                                <select class="form-control" name="suppliedproduct">
                                    <option>Select Product Category</option>
                                    @foreach ($productCategories as $category)
                                    <option class="m-t-20" value="{{$category->categoryname}}">{{$category->categoryname}}</option>    
                                    @endforeach  
                                </select>
                            </div>
                          </div>
                      

                          <div class="form-group m-t-30" style="margin-left: 70%">
                            {{-- <div> --}}
                                <button type="submit" class="btn btn-info waves-effect waves-light w-md">
                                    Save
                                </button>
                                <a href="{{route('supplier.view')}}" type="reset" class="btn btn-warning waves-effect m-l-5 w-md">
                                    Cancel
                                </a>
                            {{-- </div> --}}
                        </div>
                      </form>
                </div>

            </div>

        </div>
        <!-- end row -->


    </div> <!-- end ard-box -->
</div><!-- end col-->
@endsection