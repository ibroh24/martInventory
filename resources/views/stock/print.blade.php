 <!-- App css -->
 <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
 <link href="{{asset('assets/css/core.css')}}" rel="stylesheet" type="text/css" />
 <link href="{{asset('assets/css/components.css')}}" rel="stylesheet" type="text/css" />
 <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
 <link href="{{asset('assets/css/pages.css')}}" rel="stylesheet" type="text/css" />
 <link href="{{asset('assets/css/menu.css')}}" rel="stylesheet" type="text/css" />
 <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet" type="text/css" />
 <link rel="stylesheet" href="{{asset('plugins/switchery/switchery.min.css')}}">




<div class="container-fluid">
<div class="row">
<div class="col-md-12">
    <div class="row">        
        <div class="col-sm-1"></div>
        <div class="col-sm-9">
            <div class="card-box">
                <table class="table table-light">
                    <tr>
                        <td rowspan="3" style="width:10%">
                            <img src="{{asset('images/faaajs.png')}}" height="120px" width="140px">
                        </td>
                        <td class="text-uppercase" style="font-size:16pt; font-weight:bold;">
                            Faajs Aneefat Ventures
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size:14pt;">
                            <b>Report Executed By: {{Auth::User()->name}}</b>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size:14pt;">
                            <b>Executed Date: {{date('l, M d, Y')}} at {{date('h:i a')}}</b>
                        </td>
                    </tr>
                </table>
                <hr>
                <h4 class="m-t-0 header-title text-center text-uppercase"><b>Product Detail</b></h4>
                <hr>

                <table class="table table-bordered table-responsive" >
                    <thead style="background-color:#00004D; color: #fff">
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
                <h4 class="m-t-0 header-title text-center text-uppercase"><b>Product and Sales Detail</b></h4>
                <hr>
                <table class="table table-bordered">
                    <thead class="m-t-20" style="background-color:#00004D; color: #fff">
                        <tr>
                            <th class="text-center">Entered By</th>
                            <th class="text-center">Sold By</th>
                            <th class="text-center">Sales Qty</th>
                            <th class="text-center">Total Price</th>
                            <th class="text-center">Total Profit</th>
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
                            <td>{{$sales->totalprofit}}</td>
                            <td>{{date('l, F d, Y', strtotime($sales->created_at))}} </td> 
                            <td>{{date('h:i a', strtotime($sales->created_at))}}</td>
                            {{-- <td>{{date('l, F d, Y', strtotime($sales->updated_at))}} at {{date('h:i a', strtotime($sales->updated_at))}}</td> --}}
                            
                        </tr>
                        @endforeach
                        <tr style="height:10px;">
                            <td class="text-center text-uppercase"><b>Total</b></td>
                            <td>&nbsp;</td>
                            <td class="text-center"><b>{{$totalQty ? $totalQty : ''}}</b></td>
                            <td class="text-center"><b>{{$totalSum ? number_format($totalSum,2,'.',',') : ''}}</b></td>
                            <td class="text-center"><b>{{$totalProfit ? number_format($totalProfit,2,'.',',') : ''}}</b></td>
                            <td>&nbsp;</td>
                        </tr>
                        @else
                        <tr class="odd">
                            <td colspan="11" class="text-center"><h5>There is Currently No Sales Detail for {{$productDetail[0]->productname}}.</h5></td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        {{-- <div class="col-sm-1"></div> --}}
    </div>

</div><!-- end col-->
</div>
{{-- @endsection --}}
