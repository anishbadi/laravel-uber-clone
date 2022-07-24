<?php

namespace App\Repository\Interfaces;

interface TripRepositoryInterface
{
    public function getAll();

    public function fetchById(int $id);

    public function create(array $details);

    public function update(int $id, array $details);

}

?>