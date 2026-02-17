<?php

namespace App\Livewire\Pages\Note;


use App\Repositories\Contracts\NoteRepositoryInterface;
use App\Repositories\Contracts\PlayerRepositoryInterface;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    private NoteRepositoryInterface $repository;
    private PlayerRepositoryInterface $playerRepository;

    public bool $openModal = false;
    public string $note = '';
    public string $playerSearch = '';
    public ?int $player_id = null;
    public bool $showDropdown = false;


    public function boot(NoteRepositoryInterface $repository, PlayerRepositoryInterface $playerRepository): void
    {
        $this->repository = $repository;
        $this->playerRepository = $playerRepository;
    }

    #[Computed]
    public function notes()
    {
        return $this->repository
            ->paginate(10);
    }

    public function open()
    {
        $this->resetForm();
        $this->openModal = true;
    }


    public function save(): void
    {
        $this->validate(
            [
                'note' => 'required|string|max:255',
                'player_id' => 'required|exists:players,id',
            ],
            [
                'note.required' => 'La nota es obligatoria.',
                'note.max' => 'La nota no puede superar los 255 caracteres.',
                'player_id.required' => 'Debes seleccionar un jugador.',
                'player_id.exists' => 'El jugador seleccionado no es válido.',
            ]
        );


        $this->repository->create([
            'note' => $this->note,
            'player_id' => $this->player_id,
            'user_id' => auth()->id(),
        ]);

        $this->resetForm();

        $this->openModal = false;

        $this->resetPage();
    }
    public function closeModal(): void
    {
        $this->resetForm();
        $this->openModal = false;
    }

    public function selectPlayer(int $id, string $name): void
    {
        $this->player_id = $id;
        $this->playerSearch = $name;
        $this->showDropdown = false;
    }

    public function updatedPlayerSearch(): void
    {
        $this->showDropdown = true;
    }


    #[Computed]
    public function players()
    {
        if (!$this->showDropdown || strlen($this->playerSearch) < 2) {
            return collect();
        }

        return $this->playerRepository
            ->searchByName($this->playerSearch, 5);
    }


    private function resetForm(): void
    {
        $this->reset([
            'note',
            'player_id',
            'playerSearch',
            'showDropdown',
        ]);

        $this->resetValidation();
    }


    public function render()
    {
        return view('livewire.pages.note.index');
    }
}
