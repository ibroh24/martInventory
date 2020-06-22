@extends('layouts.master')
@section('title')
    Faajs | Sales Information
@endsection

@section('breadcrumb')
    Sales
@endsection
@section('menuname')
    Daily Sales 
@endsection
@section('submenu')
    New Sales
@endsection

@section('content')
<div class="col-xs-12">
    <div class="card-box">
        <div class="row">
            <div class="col-sm-12 col-xs-12 m-t-20">
                <h4 class="header-title m-t-0">Sales Data Entry</h4>
                {{-- <p class="text-muted font-13 m-b-10">
                    Parsley is a javascript form validation library. It helps you provide your users with feedback on their form submission before sending it to your server.
                </p> --}}
                <hr>

                <div class="p-20">
                    <form method="POST" action="{{route('sales.store')}}">
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
                            <label class="control-label" style="margin-bottom: -8px">Item Category</label>
                            <select class="form-control" id="itemcategory" name="itemcategory">
                                <option>Select Item Category</option>
                                @foreach ($productCategory as $category)
                                    <option class="m-t-20" value="{{$category->categoryname}}">{{$category->categoryname}}</option>    
                                @endforeach  
                            </select>

                            {{-- <label class="control-label" style="margin-bottom: -8px">Sales Type</label>
                            <select class="form-control" id="itemtype" name="itemtype">
                                <option>Select Sales Type</option>
                                <option class="m-t-20" value="Bulk">Bulk</option>    
                                <option class="m-t-20" value="Unit">Unit</option>    
                            </select> --}}
                          </div>
                          <div class="col-md-6">
                            <label class="control-label" style="margin-bottom: -8px">Item Name</label>
                            <select class="form-control" id="itemname" name="itemname">
                                {{-- <option>Select Item</option>
                                @foreach ($products as $product)
                                    <option class="m-t-20" value="{{$product->productname}}">{{$product->productname}}</option>    
                                @endforeach   --}}
                            </select>
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-md-6">
                            <label class="control-label" style="margin-bottom: -8px">Item Price (Unit/Bulk)</label>
                            <input type="text" id="itemprice" readonly name="itemprice" class="form-control" placeholder="Item Price">
                          </div>
                          <div class="col-md-6">
                            <label class="control-label" style="margin-bottom: -8px">Item Quantity</label>
                                <input type="number" name="itemqty" id="itemqty" class="form-control" placeholder="Item Quantity">
                          </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="control-label" style="margin-bottom: -8px">Total Pay</label>
                                <input type="number" readonly name="totalprice" id="totalprice" class="form-control" placeholder="Total Pay">
                            </div>
                            <div class="col-md-6">
                                <label class="control-label" style="margin-bottom: -8px">Sold By</label>
                                <input type="text" readonly name="soldby" class="form-control" value="{{ Auth::user()->name }}">
                            </div>
                          </div>
                          <br>
                          <br><br>
                          <div class="form-group m-t-20" style="margin-left: 70%">
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
            // loading product ajax call
            $('#itemcategory').on('change', function () {
                var selectedCats = $('#itemcategory').val().toLowerCase();
                // console.log(selectedCats);
                if(selectedCats.toLowerCase() !==''){
                    $.get("/getProduct/"+selectedCats, function (data) {
                        $('#itemname').empty();
                        $('#itemname').append("<option value=''> - Select Item Name - </option>");
                        itemname += "";
                        $.each(data, function(i, item){
                            $('#itemname').append("<option value='"+ data[i].productname + "'>" + data[i].productname+ "</option>");
                        });
                    });
                }
            });
            
            $('#itemname').on('change', function () {
                var selectedItem = $('#itemname').val().toLowerCase();
                $('#totalprice').empty();
                $.get("/getProductPrice/"+selectedItem, function (data) {
                    $('#itemprice').val(data[0].sellingprice);

                    $('#itemqty').on('change', function () {
                        console.log(data); 
                        var itemPrice = $('#itemprice').val();
                        var itemQty = $('#itemqty').val();
                        var productRemain = parseInt(data[0].productremain);
                        // console.log(itemQty); console.log(bulkRemain); console.log(unitRemain)
                        if(itemQty >= productRemain){
                            alert("The Remaining Quantity is Lower Than Purchase Quantity")
                            $('#itemqty').val("");
                        }else{
                            $('#totalprice').val(parseFloat(itemPrice) * parseFloat(itemQty));
                        }             
                        $('#itemcategory').attr("style", "pointer-events: none;");
                        $('#itemname').attr("style", "pointer-events: none;");        
                
                    });
                });
            });
        });
    </script>
    
@endsection