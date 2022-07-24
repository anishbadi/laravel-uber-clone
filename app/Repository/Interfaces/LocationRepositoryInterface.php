<?php

namespace App\Repository\Interfaces;

interface LocationRepositoryInterface
{
    public function getAll();

    public function fetchById(int $id);
}

?>