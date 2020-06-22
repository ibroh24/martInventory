@extends('layouts.master')
@section('title')
    Faajs | Edit Inventory
@endsection

@section('breadcrumb')
    Inventory
@endsection
@section('menuname')
    Inventory Data 
@endsection
@section('submenu')
    Edit Inventory
@endsection

@section('content')
<div class="col-xs-12">
    <div class="card-box">
        <div class="row">
            <div class="col-sm-12 col-xs-12 m-t-20">
                <h3 class="header-title m-t-0">Update {{$editInventory->productname}}'s Data</h3>
                {{-- <p class="text-muted font-13 m-b-10">
                    Parsley is a javascript form validation library. It helps you provide your users with feedback on their form submission before sending it to your server.
                </p> --}}
                <hr>

                <div class="p-20">
                    <form method="POST" action="{{route('inventory.update', $editInventory->productslug)}}">
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
                          <div class="col-md-12">
                            <label class="control-label" style="margin-bottom: -8px">Product Name</label>
                            <input type="text" id="productname" value="{{$editInventory->productname}}" name="productname" class="form-control" placeholder="Product Name">
                          </div>
                          {{-- <div class="col-md-6">
                            <label class="control-label" style="margin-bottom: -8px">Product UOM</label>
                            <select class="form-control" name="productuom">
                                <option>Select Product UOM</option>
                                @foreach ($uoms as $uom)
                                    <option class="m-t-20" value="{{$uom->uomname}}"
                                        @if ($uom->uomname == $editInventory->productuom)
                                            selected
                                        @endif    
                                    >{{$uom->uomname}}</option>    
                                @endforeach  
                            </select>
                          </div> --}}
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-md-6">
                            <label class="control-label" style="margin-bottom: -8px">Product Description</label>
                            <input type="text" value="{{$editInventory->productdescription}}" name="productdescription" class="form-control" placeholder="Product Description">
                          </div>
                          <div class="col-md-6">
                            <label class="control-label" style="margin-bottom: -8px">Product Category</label>
                            <select class="form-control" name="productcategory">
                                <option>Select Product Category</option>
                                @foreach ($categories as $category)
                                    <option class="m-t-20" value="{{$category->categoryname}}"
                                        @if ($category->categoryname == $editInventory->productcategory)
                                            selected
                                        @endif     
                                    >{{$category->categoryname}}</option>    
                                @endforeach  
                            </select>
                          </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                    <label class="control-label" style="margin-bottom: -8px">Product Quantity (Bulk)</label>
                                    <input type="number" id="productbulkqty" name="productbulkqty" class="form-control" placeholder="Product Quantity (Bulk)">
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label" style="margin-bottom: -8px">Product Quantity (Unit)</label>
                                    <input type="number" id="productunitqty" name="productunitqty" class="form-control" placeholder="Product Quantity (Bulk)">                                
                                </div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col-md-6">
                                <label class="control-label" style="margin-bottom: -8px">Bulk Buying Price</label>
                              <input type="number" value="{{$editInventory->bulkbuyingprice}}" id="bulkbuyingprice" name="bulkbuyingprice" class="form-control" placeholder="Bulk Buying Price">
                            </div>
                            <div class="col-md-6">
                                <label class="control-label" style="margin-bottom: -8px">Bulk Selling Price</label>
                                <input type="number" value="{{$editInventory->bulksellingprice}}" id="bulksellingprice" name="bulksellingprice" class="form-control" placeholder="Bulk Selling Price">
                            </div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col-md-6">
                                <label class="control-label" style="margin-bottom: -8px">Unit Buying Price</label>
                              <input type="number" value="{{$editInventory->unitbuyingprice}}" id="unitbuyingprice" name="unitbuyingprice" class="form-control" placeholder="Unit Buying Price">
                            </div>
                            <div class="col-md-6">
                                <label class="control-label" style="margin-bottom: -8px">Unit Selling Price</label>
                                <input type="number" value="{{$editInventory->unitsellingprice}}" id="unitsellingprice" name="unitsellingprice" class="form-control" placeholder="Unit Selling Price">
                            </div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col-md-6">
                                {{-- <div class="form-group"> --}}
                                    <label class="control-label" style="margin-bottom: -8px">Bulk Profit</label>
                                    <input type="text" value="{{$editInventory->bulkprofit}}" readonly id="bulkprofit" name="bulkprofit" class="form-control">
                                {{-- </div> --}}
                            </div>
                            <div class="col-md-6">
                                {{-- <div class="form-group"> --}}
                                <label class="control-label" style="margin-bottom: -8px">Unit Profit</label>
                                <input type="text" value="{{$editInventory->unitprofit}}" readonly id="unitprofit" name="unitprofit" class="form-control">
                            {{-- </div> --}}
                          </div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col-md-6">
                                <label class="control-label" style="margin-bottom: -8px">Product Supplier</label>
                                <select class="form-control" name="productsupplier">
                                    <option>Select Product Supplier</option>
                                    @foreach ($suppliers as $supplier)
                                        <option class="m-t-20" value="{{$supplier->suppliername}}"
                                            @if ($supplier->suppliername == $editInventory->productsupplier)
                                                selected
                                            @endif 
                                        >{{$supplier->suppliername}}</option>    
                                    @endforeach  
                                </select>
                            </div>
                                <div class="col-md-6">
                                    <label class="control-label" style="margin-bottom: -8px">Entered By</label>
                                    <input type="text" readonly name="enteredby" class="form-control" value="{{$editInventory->enteredby}}">
                            </div>
                          </div>
                          <br><br><br>
                          <div class="form-group m-t-30" style="margin-left: 70%">
                            {{-- <div> --}}
                                <button type="submit" class="btn btn-info waves-effect waves-light w-md">
                                    Save
                                </button>
                                <a href="{{route('inventory.viewlowitem')}}" type="reset" class="btn btn-warning waves-effect m-l-5 w-md">
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
            $('#bulksellingprice').change(function () { 
                if ( $('#bulkbuyingprice').val() !=='' &&  $('#bulksellingprice').val() !== '') {
                    var buyingprice =  $('#bulkbuyingprice').val();
                    var sellingprice =  $('#bulksellingprice').val();
                    var result = parseFloat(sellingprice) - parseFloat(buyingprice);
                    $('#bulkprofit').val(parseFloat(result.toFixed(3)));
                }
            });
            $('#unitsellingprice').change(function () { 
                if ( $('#unitbuyingprice').val() !=='' &&  $('#unitsellingprice').val() !== '') {
                    var buyingprice =  $('#unitbuyingprice').val();
                    var sellingprice =  $('#unitsellingprice').val();
                    var result = parseFloat(sellingprice) - parseFloat(buyingprice);
                    $('#unitprofit').val(parseFloat(result.toFixed(3)));
                }
            });

            var productName = $('#productname').val();
            $.get("/getProductRemain/"+productName, function (data) {
                console.log(data); 
                var bulkRemain = parseInt(data[0].productbulkremain);
                var unitRemain = parseInt(data[0].productunitremain);
                
                

                $('#productbulkqty').on('change', function() { 
                    var productBulkQty = $('#productbulkqty').val();
                    productBulkQty = parseInt(productBulkQty) + bulkRemain;
                    console.log(productBulkQty);
                    $('#productbulkqty').val(productBulkQty);
                });
                $('#productunitqty').on('change', function() { 
                    var productUnitQty = $('#productunitqty').val();
                    productUnitQty = parseInt(productUnitQty) + unitRemain;
                    console.log(productUnitQty);
                    $('#productunitqty').val(productUnitQty);
                });
            });
        });
    </script>
    
@endsection