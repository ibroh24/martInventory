<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class InventoryBackup extends Model
{
    use Notifiable;

    protected $fillable = [
        'productname', 'productdescription', 'productcategory', 'sellingprice', 'buyingprice', 'profit', 'enteredby', 'productqty', 'productsupplier', 'productuom', 'productslug', 'productremain'
    ];
}
