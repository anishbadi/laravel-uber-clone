<?php

namespace App\Repository;

use App\Repository\Interfaces\LocationRepositoryInterface;
use App\Location;

class LocationRepository implements LocationRepositoryInterface
{
    /**
     * Get all locations.
     *
     * @param int $details
     * @return object 
     */
    public function getAll()
    {
        return Location::get();
    }

    /**
     * Fetch Location by location id.
     *
     * @param int $id
     * @return object 
     */
    public function fetchById(int $id)
    {
        return Location::find($id);
    }
}
    
?>