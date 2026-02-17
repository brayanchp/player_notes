<?php
namespace App\Repositories\Contracts;
use Illuminate\Support\Collection;


interface PlayerRepositoryInterface
{
    public function searchByName(string $term, int $limit = 5): Collection;

}
