<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\Occurrence;
use App\Models\OccurrenceType;

class CardView extends Component
{
    public $occurrenceSum;
    public $occurrenceTypeSum;

    public function render()
    {
        return view('livewire.users.card-view');
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
