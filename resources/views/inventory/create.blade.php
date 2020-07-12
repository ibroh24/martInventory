@extends('layouts.master')
@section('title')
    Faajs | Create Inventory
@endsection

@section('breadcrumb')
    Inventory
@endsection
@section('menuname')
    Inventory Data 
@endsection
@section('submenu')
    Create Inventory
@endsection

@section('content')
<div class="col-xs-12">
    <div class="card-box">
        <div class="row">
            <div class="col-sm-12 col-xs-12 m-t-20">
                <h4 class="header-title m-t-0">Product Details</h4>
                {{-- <p class="text-muted font-13 m-b-10">
                    Parsley is a javascript form validation library. It helps you provide your users with feedback on their form submission before sending it to your server.
                </p> --}}
                <hr>

                <div class="p-20">
                    <form method="POST" action="{{route('inventory.store')}}">
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
                            <label class="control-label" style="margin-bottom: -8px">Product Name</label>
                            <input type="text" name="productname" class="form-control" placeholder="Product Name">
                          </div>
                          <div class="col-md-6">
                            <label class="control-label" style="margin-bottom: -8px">Product UOM</label>
                            <select class="form-control" name="productuom">
                                <option>Select Product UOM</option>
                                @foreach ($uoms as $uom)
                                    <option class="m-t-20" value="{{$uom->uomname}}">{{$uom->uomname}}</option>    
                                @endforeach  
                            </select>
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-md-6">
                            <label class="control-label" style="margin-bottom: -8px">Product Description</label>
                            <input type="text" name="productdescription" class="form-control" placeholder="Product Description">
                          </div>
                          <div class="col-md-6">
                            <label class="control-label" style="margin-bottom: -8px">Product Category</label>
                            <select class="form-control" name="productcategory">
                                <option>Select Product Category</option>
                                @foreach ($categories as $category)
                                    <option class="m-t-20" value="{{$category->categoryname}}">{{$category->categoryname}}</option>    
                                @endforeach  
                            </select>
                          </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="control-label" style="margin-bottom: -8px">Product Quantity (Bulk/Unit)</label>
                                <input type="number" id="productqty" name="productqty" class="form-control" placeholder="Product Quantity (Bulk/Unit)">
                            </div>
                            <div class="col-md-6">
                                <label class="control-label" style="margin-bottom: -8px">Product Supplier</label>
                                <select class="form-control" name="productsupplier">
                                    <option>Select Product Supplier</option>
                                    @foreach ($suppliers as $supplier)
                                        <option class="m-t-20" value="{{$supplier->suppliername}}">{{$supplier->suppliername}}</option>    
                                    @endforeach  
                                </select>
                            </div>
                           
                          </div>
                          <br>
                         
                          {{-- <br> --}}
                          <div class="row">
                            <div class="col-md-6">
                                <label class="control-label" style="margin-bottom: -8px">Buying Price (Bulk/Unit)</label>
                              <input type="number" id="buyingprice" name="buyingprice" class="form-control" placeholder="Buying Price (Bulk/Unit)">
                            </div>
                            <div class="col-md-6">
                                <label class="control-label" style="margin-bottom: -8px">Selling Price (Bulk/Unit)</label>
                                <input type="number" id="sellingprice" name="sellingprice" class="form-control" placeholder="Selling Price">
                            </div>
                           
                          </div>
                          <br>
                         
                          {{-- <br> --}}
                          <div class="row">
                            <div class="col-md-6">
                                <label class="control-label" style="margin-bottom: -8px">Profit (Bulk/Unit)</label>
                                <input type="text" readonly id="profit" name="profit" class="form-control">
                            </div>
                            
                                <div class="col-md-6">
                                    {{-- <div class="form-group"> --}}
                                    <label class="control-label" style="margin-bottom: -8px">Re-Order Level</label>
                                    <input type="text" name="reorderlevel" class="form-control">
                                {{-- </div> --}}
                                <input type="hidden" readonly class="form-control" name="enteredby"  value="{{Auth::user()->name}}" id="enteredby">
                            </div>
                          </div>
                          <br><br><br>
                          <div class="form-group m-t-30" style="margin-left: 70%">
                            {{-- <div> --}}
                                <button type="submit" class="btn btn-info waves-effect waves-light w-md">
                                    Save
                                </button>
                                <a href="{{route('inventory.view')}}" type="reset" class="btn btn-warning waves-effect m-l-5 w-md">
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
@section('script')
    <script>
        $(document).ready(function () {
            $('#sellingprice').change(function () { 
                if ( $('#buyingprice').val() !=='' &&  $('#sellingprice').val() !== '') {
                    var buyingprice =  $('#buyingprice').val();
                    var sellingprice =  $('#sellingprice').val();
                    var result = parseFloat(sellingprice) - parseFloat(buyingprice);
                    $('#profit').val(parseFloat(result.toFixed(3)));
                }
            });
        });
    </script>




    
@endsection