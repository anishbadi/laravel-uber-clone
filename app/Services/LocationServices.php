<?php

namespace App\Services; 

use App\Repository\Interfaces\LocationRepositoryInterface;
use App\Services\DistanceCalculatorServices;

class LocationServices
{
    protected $location;
    protected $distanceCalculatorServices;

    public function __construct(LocationRepositoryInterface $location, DistanceCalculatorServices $distanceCalculatorServices) {
        $this->location = $location;
        $this->distanceCalculatorServices = $distanceCalculatorServices;
    }

    /**
     * Get all locations from the database 
     * 
     * @return object
     */
    public function getAllLocation()
    {
        try {
            return $this->location->getAll();
        } catch (\Exception $e) {
            // Log errors
            \Log::error( $e->getMessage() );
        }
    }

    /**
     * Fetch location details 
     * 
     * @return int
     */
    public function getDistanceBtwnLocation($locationFrom,$locationTo)
    {
        try {
            $locationFromDetails = $this->location->fetchById($locationFrom);
            $locationToDetails = $this->location->fetchById($locationTo);
            return $this->distanceCalculatorServices->calculateDistance($locationFromDetails->latitude,$locationFromDetails->longitude,$locationToDetails->latitude,$locationToDetails->longitude);
        } catch (\Exception $e) {
            // Log errors
            \Log::error( $e->getMessage() );
        }
    }
}

?>