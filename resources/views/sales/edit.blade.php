@extends('layouts.master')
@section('title')
    Faajs | Edit Sales
@endsection

@section('breadcrumb')
    Sales
@endsection
@section('menuname')
    Sales 
@endsection
@section('submenu')
    Edit Sales
@endsection

@section('content')
<div class="col-xs-12">
    <div class="card-box">
        <div class="row">
            <div class="col-sm-12 col-xs-12 m-t-20">
                <h3 class="header-title m-t-0">Update {{$editSales->itemname}}'s Data</h3>
                {{-- <p class="text-muted font-13 m-b-10">
                    Parsley is a javascript form validation library. It helps you provide your users with feedback on their form submission before sending it to your server.
                </p> --}}
                <hr>

                <div class="p-20">
                    <form method="POST" action="{{route('sales.update', $editSales->itemslug)}}">
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
                              {{-- <label class="control-label" style="margin-bottom: -8px">Item Category</label>
                              <select class="form-control" id="itemcategory" name="itemcategory">
                                  <option>Select Item Category</option>
                                  @foreach ($productCategory as $category)
                                      <option class="m-t-20" value="{{$category->categoryname}}">{{$category->categoryname}}</option>    
                                  @endforeach  
                              </select> --}}
  
                              <label class="control-label" style="margin-bottom: -8px">Sales Type</label>
                              <select class="form-control" id="itemtype" name="itemtype">
                                  <option>Select Sales Type</option>
                                  <option class="m-t-20" value="Bulk"
                                    @if(strtolower($editSales->itemtype) == "bulk")
                                      selected
                                    @elseif(strtolower($editSales->itemtype) == "unit")
                                        selected
                                    @endif
                                  >Bulk</option>    
                                  <option class="m-t-20" value="Unit"
                                  >Unit</option>    
                              </select>
                            </div>
                            <div class="col-md-6">
                              <label class="control-label" style="margin-bottom: -8px">Item Name</label>
                              <select class="form-control" id="itemname" name="itemname">
                                  <option>Select Item</option>
                                  @foreach ($products as $product)
                                      <option class="m-t-20" value="{{$product->productname}}"
                                        @if ($product->productname == $editSales->itemname)
                                            selected
                                        @endif
                                        >{{$product->productname}}</option>    
                                  @endforeach  
                              </select>
                            </div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col-md-6">
                              <label class="control-label" style="margin-bottom: -8px">Item Price (Unit/Bulk)</label>
                              <input type="text" id="itemprice" value="{{$editSales->itemprice}}" readonly name="itemprice" class="form-control" placeholder="Item Price">
                            </div>
                            <div class="col-md-6">
                              <label class="control-label" style="margin-bottom: -8px">Item Quantity</label>
                                  <input type="number" name="itemqty" value="{{$editSales->itemqty}}" id="itemqty" class="form-control" placeholder="Item Quantity">
                            </div>
                          </div>
                          <br>
                          <div class="row">
                              <div class="col-md-6">
                                  <label class="control-label" style="margin-bottom: -8px">Total Pay</label>
                                  <input type="number" value="{{$editSales->totalprice}}" readonly name="totalprice" id="totalprice" class="form-control" placeholder="Total Pay">
                              </div>
                              <div class="col-md-6">
                                  <label class="control-label" style="margin-bottom: -8px">Sold By</label>
                                  <input type="text" readonly name="soldby" class="form-control" value="{{$editSales->soldby}}">
                              </div>
                            </div>
                            <br>
                            <br><br>
                            <div class="form-group m-t-20" style="margin-left: 70%">
                              {{-- <div> --}}
                                  <button type="submit" class="btn btn-info waves-effect waves-light w-md">
                                      Update
                                  </button>
                                  <a href="{{route('sales.view')}}" type="reset" class="btn btn-warning waves-effect m-l-5 w-md">
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
        });
    </script>
    
@endsection