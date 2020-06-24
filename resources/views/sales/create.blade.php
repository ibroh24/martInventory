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

                        <table class="table table-bordered table-colored table-info" id="dynamicTable">
                            <thead>
                            <tr>
                                <th>Item Cat</th>
                                <th>Item Name</th>
                                <th>Item Price</th>
                                <th>Item Qty</th>
                                <th>Total Pay</th>
                                <th>Action</th>
                            </tr>
                            </thead>
            
            
                            <tbody>
                                <tr>
                                    <td>
                                        <select class="form-control" id="itemcategory" name="itemcategory">
                                            <option>Select Item Category</option>
                                            @foreach ($productCategory as $category)
                                                <option class="m-t-20" value="{{$category->categoryname}}">{{$category->categoryname}}</option>    
                                            @endforeach  
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" id="itemname" name="itemname">
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" id="itemprice" readonly name="itemprice" class="form-control" placeholder="Item Price">
                                    </td>
                                    <td>
                                        <input type="number" name="itemqty" id="itemqty" class="form-control" placeholder="Item Quantity">
                                    </td>
                                    <td>
                                        <input type="number" readonly name="totalprice" id="totalprice" class="form-control" placeholder="Total Pay">
                                    </td>
                                    <td>
                                        <button type="button" name="add" id="add" class="btn btn-success">
                                            Add More
                                        </button>
                                    </td>
                                    
                                </tr>
                            </tbody>
                        </table>

                          {{-- <br><br> --}}
                            <div class="form-group m-t-20">
                                <button type="submit" class="btn btn-info waves-effect waves-light w-md">
                                    Save
                                </button>
                                <a href="{{route('inventory.view')}}" type="reset" class="btn btn-warning waves-effect m-l-5 w-md">
                                    Cancel
                                </a>
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
            let i = 0;
            $('#add').click(function() { 
                ++i;

                $(document).on('click', '.remove-tr', function(){  
                    $(this).parents('tr').remove();
                });                
                $('#dynamicTable').append('<tr><td><select class="form-control" id="itemcategory" name="itemcategory"><option>Select Item Category</option>@foreach($productCategory as $category)<option class="m-t-20" value="{{$category->categoryname}}">{{$category->categoryname}}</option>@endforeach</select></td><td><select class="form-control" id="itemname" name="itemname"></select></td><td><input type="text" id="itemprice" readonly name="itemprice" class="form-control" placeholder="Item Price"></td><td><input type="number" name="itemqty" id="itemqty" class="form-control" placeholder="Item Quantity"></td><td><input type="number" readonly name="totalprice" id="totalprice" class="form-control" placeholder="Total Pay"></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
                
                
                
            });
        });
    </script>
    
@endsection