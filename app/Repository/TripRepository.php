<?php

namespace App\Repository;

use App\Repository\Interfaces\TripRepositoryInterface;
use App\Trip;

class TripRepository implements TripRepositoryInterface
{
    /**
     * Get all Trip.
     *
     * @param int $details
     * @return object 
     */
    public function getAll()
    {
        return Trip::OrderBy('id','DESC')->paginate(10);
    }

    /**
     * Fetch trip details.
     *
     * @param int $id
     * @return object 
     */
    public function fetchById(int $id)
    {
        return Trip::find($id);
    }

    /**
     * Store trip details.
     *
     * @param array $details
     * @return object 
     */
    public function create(array $details)
    {
        return Trip::create($details);
    }

    /**
     * Update trip details.
     *
     * @param array $details
     * @return object 
     */
    public function update(int $id,array $details)
    {
        return Trip::where('id',$id)->update($details);
    }

}
    
?>