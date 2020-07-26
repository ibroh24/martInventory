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

                {{-- COMMING BACK --}}
                <div class="p-20">                    
                        <div class="row justify-content-center">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                              <input type="text" class="form-control text-center" style="font-size:30px;" id="searchitem" placeholder="Search Item Name">
                              <br>
                                <center>
                                    <button type="button" name="add" id="add" class="btn btn-info waves-effect waves-light w-md addrow">
                                                Add Item
                                    </button>
                                </center>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>
                    <br><br>
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
                                <th>Item Category</th>
                                <th>Item Name</th>
                                <th>Item Price</th>
                                <th>Item Qty</th>
                                <th>Total Pay</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    {{-- dynamic data --}}
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td style="border: none">&nbsp;</td>
                                    <td style="border: none">&nbsp;</td>
                                    <td style="border: none">&nbsp;</td>
                                    <td><b>Total: </b></td>
                                    <td colspan="2" id="grandtotal">0</td>
                                </tr>
                                @if (Auth::user()->isAdmin)
                                <tr>
                                    <td style="border: none">&nbsp;</td>
                                    <td style="border: none">&nbsp;</td>
                                    <td style="border: none">&nbsp;</td>
                                    <td><b>Discount (%) </b></td>
                                    <td colspan="2"> 
                                        <input type="number" id="discount" onchange="discountCal()" class="form-control" placeholder="Discount %">
                                    </td>
                                </tr>
                                    
                                @endif
                                <tr>
                                    <td style="border: none">&nbsp;</td>
                                    <td style="border: none">&nbsp;</td>
                                    <td style="border: none">&nbsp;</td>
                                    <td><b>Cash Paid: </b></td>
                                    <td colspan="2"> 
                                        <input type="number" id="cashpaid" onchange="totalChange()" class="form-control" placeholder="Cash Paid">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border: none">&nbsp;</td>
                                    <td style="border: none">&nbsp;</td>
                                    <td style="border: none">&nbsp;</td>
                                    <td><b>Change: </b></td>
                                    <td colspan="2" id="change">0</td>
                                </tr>
                            </tfoot>
                            
                        </table>

                          {{-- <br><br> --}}
                          <center>
                            <div class="form-group m-t-20">
                                <button type="submit" class="btn btn-info waves-effect waves-light w-md">
                                    Save
                                </button>
                                <a href="{{route('sales.view')}}" type="reset" class="btn btn-danger waves-effect m-l-5 w-md">
                                    Cancel
                                </a>
                            </div>
                        </center>
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

    function getItem(e){
        // console.log(e)

        $('#change').html('');
        $('#cashpaid').val('');


        let catData = e.getAttribute('id');
        let priceIndex = catData.replace('itemqty', ''); 
        let itemPrice = $('#itemprice'+priceIndex)
        let totalPrice = document.getElementById('totalprice'+priceIndex);
        let itemName = $('#itemname'+priceIndex).val();
        // console.log(itemName)
        let grandTotal = document.getElementById('grandtotal'); 
        
        let dataId = $(e).val();   
        
        totalPrice.value = parseFloat(itemPrice.val()) * parseFloat(dataId);
       
        //    checking item remaining balance in inventory
        $.get("/getProductPrice/"+itemName, function (data) {
                // console.log(data);
                let productRemain = parseInt(data[0].productremain);
                // console.log(productRemain);

                if(parseInt(dataId) == productRemain){
                    alert('This is the last "'+itemName+ '" we have in the Inventory');
                }
                
                // else if(productRemain < parseInt(dataId)){
                //     $('#itemqty'+priceIndex).val(parseInt('1'));
                //     $('#totalprice'+priceIndex).val(parseInt(data[0].sellingprice) * $('#itemqty'+priceIndex).val(parseInt(1)));
                //     alert('The Remaining Quantity is Lower Than Purchase Quantity');
                //     $('#change').html('');
                //     $('#cashpaid').val('');                    
                // }
                        
            });

        let getAllTotal = document.getElementsByClassName('pricetotal');
        
        let total = Object.keys(getAllTotal).map(function(key){
            return getAllTotal[key]['value'];
        });
        
        let toInt = total.map(Number);
        // console.log(toInt);

        let totalVal = sumResult(toInt);
        
        grandTotal.innerHTML = totalVal;

    }
    function sumResult(arrayVal){
        let res = 0
        arrayVal.forEach(element => {
            res += element;
        });
        return parseFloat(res);
    }
    function addGrandTotal(totalPrice){
        let data = document.getElementById('grandtotal')
        let tp = data.innerText
        data.innerText = parseFloat(tp)+parseFloat(totalPrice)
    }
    function deductTotal(totalPrice){
        let data = document.getElementById('grandtotal')
        let tp = data.innerText
        data.innerText = parseFloat(tp) - parseFloat(totalPrice)
    }

    // calculating percentage
    function discountCal() {
        $('#change').html('');
        $('#cashpaid').val('');
        let grandtotal = document.getElementById('grandtotal').innerHTML;
        

        let discount = $('#discount').val();
        if(discount !== '' && discount !== null){

            
            let discountPercent = parseFloat(discount) / 100;
            let discountValue = parseFloat(discountPercent) * parseFloat(grandtotal);
            console.log(grandtotal);
            console.log(discountValue);

            let customerPayment = parseFloat(grandtotal) - parseFloat(discountValue);
            console.log(customerPayment);
        
            document.getElementById('grandtotal').innerHTML = customerPayment;
        }
        
    }


    function totalChange() {
        let grandTotal = document.getElementById('grandtotal').innerHTML;
        let cashPaid = document.getElementById('cashpaid');
        let userChange = document.getElementById('change');
        if(parseFloat(cashPaid.value) > parseFloat(grandTotal)){
            userChange.innerHTML = parseFloat(cashPaid.value) - parseFloat(grandTotal);
            console.log(userChange.innerHTML);
        }else if(parseFloat(cashPaid.value) < parseFloat(grandTotal)){
            alert("The amount Paid is lower than the Item Purchased!")
            cashPaid.value = '';
        }
        console.log(grandTotal);
    }

        function getPrice(e){
            console.log(e.getAttribute('id'))
            let itemData = e.getAttribute('id');
            let itemIndex = itemData.replace('itemname', ''); 
            let dataId = $(e).val();
            console.log(dataId)

            $.get("/getProductPrice/"+dataId, function (data) {
                let itemPrice = $('#itemprice'+itemIndex);
                let itemQty = $('#itemqty'+itemIndex);
                let totalPrice = $('#totalprice'+itemIndex);

                console.log(data);
                itemPrice.val(data[0].sellingprice);
                console.log(itemPrice);
                itemQty.on('change', function () {
                    console.log(data); 
                    // var itemPrice = $('#itemprice').val();
                    var itemCheck = itemQty.val();
                    var productRemain = parseInt(data[0].productremain);
                    if(itemCheck > productRemain){
                        alert("The Remaining Quantity is Lower Than Purchase Quantity")
                        itemQty.val("");
                    }else{
                        totalPrice.val(parseFloat(itemPrice.val()) * parseFloat(itemQty.val()));
                    }            
                });
            });
        }

        let i = 1;
        
        function selectedItemData(dataId){
            
             $.get("/getProductPrice/"+dataId, function (data) {
                
                // let itemQty = $('#itemQty');
                // let totalPrice = $('#totalPrice');
                // let itemPrice = $('#itemPrice');
                // i++;
                
                $('#searchitem').val('');
                i++;                   
                console.log(i);
                 $('#dynamicTable').append(`<tr><td><input type="text" value="${data[0]['productcategory']}" id="itemcategory${i}" readonly name="itemcategory[]" class="form-control"></td><td><input type="text" value="${data[0]['productname']}"  id="itemname${i}" readonly name="itemname[]" class="form-control"></td><td><input type="text" value="${data[0]['sellingprice']}" id="itemprice${i}" readonly name="itemprice[]" class="form-control"></td><td><input type="number" onchange="getItem(this)" min="1" name="itemqty[]" value="1" id="itemqty${i}" class="form-control" placeholder="Item Quantity"></td><td><input type="number" readonly name="totalprice[]" id="totalprice${i}" value="${1*data[0]['sellingprice']}" class="form-control pricetotal" placeholder="Total Pay"></td><input type="hidden" name="soldby[]" value="{{Auth::user()->name}}" id="soldby${i}" class="form-control" placeholder="Total Pay"><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>`);

                addGrandTotal(data[0]['sellingprice']*1)
            });
        }
        $(document).ready(function () { 
            $('#searchitem').autocomplete({
                source : "{{url('/getProduct/{selectedCats}')}}",
            });   
            $('#add').click(function (e) { 
                selectedItemData($('#searchitem').val());
            });            


            $(document).on('click', '.remove-tr', function(){  
                $(this).parents('tr').remove();
                deductTotal($(this).parents('tr')[0]['children'][4].children[0].value);
                $('#change').html('');
                $('#cashpaid').val('');
                $('#discount').val('');
            });  
        });
    </script>
    
@endsection