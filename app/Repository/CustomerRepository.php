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

    // /**
    //  * Fetch customer base on email address.
    //  *
    //  * @param string $email
    //  * @return object
    //  */
    // public function fetchUserByEmail($email)
    // {
    //     return Customer::where('email',$email)->first();
    // }

    // /**
    //  * Store customer details.
    //  *
    //  * @param array $details
    //  * @return object 
    //  */
    // public function create(array $details)
    // {
    //     return Customer::create($details);
    // }

}
    
?>