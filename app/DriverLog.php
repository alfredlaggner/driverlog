<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriverLog extends Model
{
    public function driver()
    {
        return $this->belongsTo('App\Driver');
    }
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
    public function vehicle()
    {
        return $this->belongsTo('App\Driver');
    }

    public function sales_orders()
    {
        return $this->hasMany('App\SaleInvoice','sale_order_id','ext_id');
    }

    public function saleinvoices()
    {
        return $this->hasMany('App\SaleInvoice');
    }
}
