<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Sales extends Model
{
    // 
    use Notifiable;

    protected $fillable = [
        'itemname','itemprice','totalprice','itemqty','soldby','itemtype', 'itemslug','remainitem', 'itemcategory', 'totalprofit'
    ];
}
