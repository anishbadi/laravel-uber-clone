<?php

namespace App\Services;

class DistanceCalculatorServices
{

    /**
     * Calculate distance between two location base on their latlong
     * 
     * @param float $latitudeFrom
     * @param float $longitudeFrom
     * @param float $latitudeTo
     * @param float $longitudeTo
     * @return int
     */
    public function calculateDistance(float $latitudeFrom, float $longitudeFrom, float $latitudeTo, float $longitudeTo)
    {
        try {
            $theta = $longitudeFrom - $longitudeTo;
            $dist = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) + cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
            $dist = acos($dist);
            $dist = rad2deg($dist);
            return (int)round($dist * 60 * 1.1515 * 1.609344);
        } catch (\Exception $e) {
            // Log errors
            \Log::error( $e->getMessage() );
        }
    }
}

?>