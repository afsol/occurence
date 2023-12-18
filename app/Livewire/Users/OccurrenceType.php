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

    protected $rules = [
        'newOccurrenceType' => 'required|unique:occurrence_types,name',
    ];

    public function mount()
    {
        // $this->refreshOccurrenceTypes();
    }

    public function render()
    {
        $occurrenceTypes = ModelsOccurrenceType::paginate(5);
        return view('livewire.users.occurrence-type', compact('occurrenceTypes'));
    }

    public function openModal()
    {
        $this->resetValidation();
        $this->newOccurrenceType = '';
        $this->selectedOccurrenceType ='';
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
        // $this->refreshOccurrenceTypes();
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
        // $this->refreshOccurrenceTypes();
    }

    public function deleteOccurrenceType($occurrenceTypeId)
    {
        $occurrenceType = ModelsOccurrenceType::findOrFail($occurrenceTypeId);
        $occurrenceType->delete();

        // $this->refreshOccurrenceTypes();
    }

    // private function refreshOccurrenceTypes()
    // {
    //     $this->occurrenceTypes = ModelsOccurrenceType::all();
    // }
}

