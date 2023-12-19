<?php

namespace App\Livewire\Users;

use App\Models\Occurrence;
use App\Models\OccurrenceType;
use Livewire\Component;

class CardsLivewire extends Component
{
    public $occurrenceSum;
    public $occurrenceTypeSum;
    public function render()
    {
        // $occurrenceSum = Occurrence::count();
        return view('livewire.users.cards-livewire');

    }

    public function totalOccurrence()
    {
        $this->occurrenceSum = Occurrence::count();
    }

    public function totalOccurrenceType()
    {
        $this->occurrenceTypeSum = OccurrenceType::count();
    }
}
