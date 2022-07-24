<?php

namespace App\Repository;

use App\Repository\Interfaces\CustomerRepositoryInterface;
use App\Customer;

class CustomerRepository implements CustomerRepositoryInterface
{
    /**
     * Get all locations.
     *
     * @param int $details
     * @return object 
     */
    public function getAll()
    {
        return Customer::get();
    }

}
    
?>