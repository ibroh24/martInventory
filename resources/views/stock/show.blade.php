@extends('layouts.master')
@section('title')
    Faajs | Market Flows
@endsection

@section('breadcrumb')
    Inventory
@endsection
@section('menuname')
    Inventory Stock Flows 
@endsection
@section('submenu')
    Show Inventory Flows
@endsection

@section('content')
<div class="col-xs-12">
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title"><b>Product Detail</b></h4>
                <hr>

                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th class="text-center">Product Name</th>                           
                            <th class="text-center">Product Category</th>
                            <th class="text-center">Product Initial Qty</th>
                            <th class="text-center">Product Current Qty</th>
                            <th class="text-center">Added Date and Time</th>
                            <th class="text-center">Updated Date and Time</th>
                            <th class="text-center">Entered By</th>
                        </tr>
                    </thead>
                    <tbody class="m-t-20">
                        @if (isset($productDetail[0]) && !empty($productDetail[0]))
                        <tr class="text-center">
                            <td>{{$productDetail[0]->productname}}</td>
                            <td>{{$productDetail[0]->productcategory}}</td>
                            <td>{{$productDetail[0]->productqty}}</td>
                            <td>{{$productDetail[0]->productremain}}</td>
                            <td>{{date('l, F d, Y', strtotime($productDetail[0]->created_at))}} at {{date('h:i a', strtotime($productDetail[0]->created_at))}}</td>
                            <td>{{date('l, F d, Y', strtotime($productDetail[0]->updated_at))}} at {{date('h:i a', strtotime($productDetail[0]->updated_at))}}</td>
                            <td>{{$productDetail[0]->enteredby}}</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
                <hr>
                {{-- <br> --}}
                <h4 class="m-t-0 header-title"><b>Product and Sales Detail</b></h4>
                <hr>
                <table class="table table-bordered">
                    <thead class="m-t-20">
                        <tr>
                            <th class="text-center">Entered By</th>
                            <th class="text-center">Sold By</th>
                            <th class="text-center">Sales Qty</th>
                            <th class="text-center">Total Price</th>
                            <th class="text-center">Sold Date</th>
                            <th class="text-center">Sold Time</th>
                        </tr>
                    </thead>
                    <tbody class="m-t-20">
                        @if ($salesDetail->count() > 0)
                    @foreach ($salesDetail as $sales)
                        <tr class="text-center">
                            <td>{{$sales->enteredby}}</td>
                            <td>{{$sales->soldby}}</td>
                            {{-- <td>{{$sales->itemtype}}</td> --}}
                            <td>{{$sales->itemqty}}</td>
                            <td>{{$sales->totalprice}}</td>
                            <td>{{date('l, F d, Y', strtotime($sales->created_at))}} </td> 
                            <td>{{date('h:i a', strtotime($sales->created_at))}}</td>
                            {{-- <td>{{date('l, F d, Y', strtotime($sales->updated_at))}} at {{date('h:i a', strtotime($sales->updated_at))}}</td> --}}
                        </tr>
                        @endforeach
                        @else
                        <tr class="odd">
                            <td colspan="11" class="text-center"><h5>There is Currently No Sales Detail for {{$productDetail[0]->productname}}.</h5></td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div><!-- end col-->
@endsection
@section('script')
    {{-- <script>
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
    </script> --}}
    
@endsection