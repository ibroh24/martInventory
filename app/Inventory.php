<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Inventory extends Model
{
    use Notifiable;

    protected $fillable = [
        'productname', 'productdescription', 'productcategory', 'bulksellingprice', 'bulkbuyingprice', 'unitprofit', 'bulkprofit', 'enteredby', 'productbulkqty', 'productunitqty', 'productsupplier', 'productuom', 'productslug', 'unitsellingprice', 'unitbuyingprice'
    ];
}
