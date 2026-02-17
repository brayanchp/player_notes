<?php

namespace App\Repositories\Eloquent;

use App\Models\Note;
use App\Repositories\Contracts\NoteRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class NoteRepository implements NoteRepositoryInterface
{
    public function paginate(int $perPage = 10): LengthAwarePaginator
    {
        return  Note::with(['player', 'user'])->latest()
            ->paginate($perPage);
    }

    public function create(array $data): Note
    {
        return Note::create($data);
    }
}
