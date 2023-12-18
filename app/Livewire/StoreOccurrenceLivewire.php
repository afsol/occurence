<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Occurrence;
use App\Models\OccurrenceType;
use Livewire\WithFileUploads;
use Spatie\MediaLibraryPro\Livewire\Concerns\WithMedia;

class StoreOccurrenceLivewire extends Component
{
    use WithFileUploads;
    // use WithMedia;
    public $occurrenceTypes;
    public $occurrenceType;
    public $description;
    public $attachment;
    public function mount()
    {
        $this->occurrenceTypes = OccurrenceType::pluck('name', 'id');
    }
    public function render()
    {
        return view('livewire.store-occurrence-livewire');
    }

    public function saveOccurrence()
    {
        // dd($this->attachment);
        $this->validate([
            'occurrenceType' => 'required',
            'description' => 'required',
            'attachment' => 'nullable|image|max:1024',
        ]);

        $occurrence = Occurrence::create([
            'description' => $this->description,
            'occurrence_type_id' => $this->occurrenceType,
        ]);

        $occurrence->addFromMediaLibraryRequest($this->attachment)
        ->toMediaCollection('occurrences');

        if ($this->attachment) {

        }

        $this->reset(['occurrenceType', 'description', 'attachment']);
        session()->flash('success', 'Occurrence saved successfully.');
    }
}
