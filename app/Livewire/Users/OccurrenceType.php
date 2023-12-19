<?php

namespace App\Livewire\Users;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\OccurrenceType as ModelsOccurrenceType;


class OccurrenceType extends Component
{
    use WithPagination;
    // public $occurrenceTypes;
    public $newOccurrenceType;
    public $selectedOccurrenceType;
    public $isModalOpen = false;
    public $filters = ['query' => null];

    protected $rules = [
        'newOccurrenceType' => 'required|unique:occurrence_types,name',
    ];

    public function mount()
    {
        // $this->refreshOccurrenceTypes();
    }

    public function render()
    {
        $occurrenceTypes = $this->getData();
        return view('livewire.users.occurrence-type', compact('occurrenceTypes'));
    }

    public function getData()
    {
        $query = ModelsOccurrenceType::query();

        $query->when($this->filters['query'], function ($q, $searchQuery) {
            return $q->where(function ($subquery) use ($searchQuery) {
                $subquery->where('id', 'like', "%{$searchQuery}%")
                    ->orWhere('name', 'like', "%{$searchQuery}%");
            });
        });
        return $query->paginate(2);
    }

    public function openModal()
    {
        $this->resetValidation();
        $this->newOccurrenceType = '';
        $this->selectedOccurrenceType = '';
    }

    public function closeModal()
    {
        $this->dispatch('hide-modal');
    }

    public function saveOccurrenceType()
    {
        $this->validate();

        ModelsOccurrenceType::create([
            'name' => $this->newOccurrenceType,
        ]);

        $this->closeModal();
        $this->dispatch('hide-modal');
    }

    public function editOccurrenceType($occurrenceTypeId)
    {
        $this->selectedOccurrenceType = ModelsOccurrenceType::findOrFail($occurrenceTypeId);
        $this->newOccurrenceType = $this->selectedOccurrenceType->name;
    }

    public function updateOccurrenceType()
    {
        $this->validate([
            'newOccurrenceType' => 'required|unique:occurrence_types,name,' . $this->selectedOccurrenceType->id,
        ]);

        $this->selectedOccurrenceType->update(['name' => $this->newOccurrenceType]);

        $this->closeModal();
    }

    public function deleteOccurrenceType($occurrenceTypeId)
    {
        $occurrenceType = ModelsOccurrenceType::findOrFail($occurrenceTypeId);
        $occurrenceType->delete();
    }
}
