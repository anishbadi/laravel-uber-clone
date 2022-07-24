<?php

namespace App\Services; 

use App\Repository\Interfaces\CustomerRepositoryInterface;

class CustomerServices
{
    protected $customer;

    public function __construct(CustomerRepositoryInterface $customer) {
        $this->customer = $customer;
    }

    /**
     * Get all Customer from the database 
     * 
     * @return object
     */
    public function getAllCustomers()
    {
        try {
            return $this->customer->getAll();
        } catch (\Exception $e) {
            // Log errors
            \Log::error( $e->getMessage() );
        }
    }
}

?>