<?php

namespace App\Services; 

use App\Repository\Interfaces\TripRepositoryInterface;
use App\Services\LocationServices;

class TripServices
{
    protected $trip;
    protected $locationService;

    public function __construct(TripRepositoryInterface $trip, LocationServices $locationService) {
        $this->trip = $trip;
        $this->locationService = $locationService;
    }

    /**
     * Get all trip from the database 
     * 
     * @return object
     */
    public function getAllTrip()
    {
        try {
            return $this->trip->getAll();
        } catch (\Exception $e) {
            // Log errors
            \Log::error( $e->getMessage() );
        }
    }

    /**
     * Fetch trip details 
     * 
     * @return object
     */
    public function fetchTripDetail($trip_id)
    {
        try {
            return $this->trip->fetchById($trip_id);
        } catch (\Exception $e) {
            // Log errors
            \Log::error( $e->getMessage() );
        }
    }

    /**
     * Store trip details
     * 
     * @return object
     */
    public function storeTrip($request,$auth_id)
    {
        try {
            $distance = $this->locationService->getDistanceBtwnLocation($request->from_location_id,$request->to_location_id);
            $requestData = $request->only(['customer_id','from_location_id','to_location_id']);
            $data = ['distance' => $distance,'created_by' => $auth_id,'updated_by' => $auth_id];
            return $this->trip->create(array_merge($requestData,$data));
        } catch (\Exception $e) {
            // Log errors
            \Log::error( $e->getMessage() );
        }
    }

    /**
     * update trip status details
     * 
     * @return object
     */
    public function updateStatus($request,$auth_id)
    {
        try {
            return $this->trip->update($request->trip_id,['status' => $request->status,'updated_by' => $auth_id]);
        } catch (\Throwable $th) {
            // Log errors
            \Log::error( $e->getMessage() );
        }
    }

}

?>