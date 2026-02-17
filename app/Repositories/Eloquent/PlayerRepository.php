<?php

namespace App\Repositories\Eloquent;

use App\Models\Player;
use App\Repositories\Contracts\PlayerRepositoryInterface;
use Illuminate\Support\Collection;

class PlayerRepository implements PlayerRepositoryInterface
{
    public function searchByName(string $term, int $limit = 5): Collection
    {
        return Player::query()
            ->where('full_name', 'like', "%{$term}%")
            ->orderBy('full_name')
            ->limit($limit)
            ->get();
    }
}
