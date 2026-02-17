<?php
namespace App\Repositories\Contracts;

use App\Models\Note;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface NoteRepositoryInterface
{
    public function paginate(int $perPage = 10): LengthAwarePaginator;

    public function create(array $data): Note;
}
