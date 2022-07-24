<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $fillable = ['customer_id','from_location_id','to_location_id','distance','status','created_by','updated_by'];
    /**
     * Get the customer that owns the trip.
     */
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    /**
     * Get the from location of the trip.
     */
    public function fromLocation()
    {
        return $this->belongsTo('App\Location','from_location_id','id');
    }

    /**
     * Get the to location of the trip.
     */
    public function toLocation()
    {
        return $this->belongsTo('App\Location','to_location_id','id');
    }
}
