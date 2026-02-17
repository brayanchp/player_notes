<div>
    <flux:heading size="xl" level="1" class="m-3.5">Listado de notas</flux:heading>
    @if (auth()->user()?->isAdmin())
        <flux:button wire:click="$set('openModal', true)">
            Crear Nota
        </flux:button>
    @endif
    <flux:table :paginate="$this->notes">
        <flux:table.columns>
            <flux:table.column>Fecha</flux:table.column>
            <flux:table.column>Autor</flux:table.column>
            <flux:table.column>Jugador</flux:table.column>
            <flux:table.column>Contenido</flux:table.column>
        </flux:table.columns>

        <flux:table.rows>
            @foreach ($this->notes as $note)
                <flux:table.row :key="$note->id">
                    <flux:table.cell class="whitespace-nowrap">{{ $note->created_at }}</flux:table.cell>

                    <flux:table.cell class="whitespace-nowrap">
                        {{ $note->user->name }}
                    </flux:table.cell>
                    <flux:table.cell class="whitespace-nowrap">
                        {{ $note->player->full_name }}
                    </flux:table.cell>
                    <flux:table.cell variant="strong">{{ $note->note }}</flux:table.cell>
                </flux:table.row>
            @endforeach
        </flux:table.rows>
    </flux:table>


    <flux:modal wire:model="openModal">

        <flux:heading size="lg">
            Crear Nota
        </flux:heading>

        <form wire:submit.prevent="save" class="space-y-4">
            <div class="relative">

                <flux:input type="search" label="Jugador" placeholder="Buscar jugador..."
                    wire:model.live.debounce.300ms="playerSearch" />
                @error('player_id')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
                @if ($showDropdown && $this->players->count())
                    <div class="absolute bg-white border w-full mt-1 rounded shadow z-50">
                        @foreach ($this->players as $player)
                            <div class="px-3 py-2 hover:bg-gray-100 cursor-pointer"
                                wire:click="selectPlayer({{ $player->id }}, '{{ $player->full_name }}')">
                                {{ $player->full_name }}
                            </div>
                        @endforeach
                    </div>
                @endif


            </div>

            <flux:textarea label="Nota" wire:model="note" />

            <div class="flex justify-end gap-2">
                <flux:button variant="ghost" wire:click="closeModal" type="button">
                    Cancelar
                </flux:button>

                <flux:button type="submit" variant="primary">
                    Guardar
                </flux:button>
            </div>

        </form>

    </flux:modal>

</div>
