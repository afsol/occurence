<?php

namespace App\Livewire\Users;

use App\Models\Occurrence;
use Livewire\Component;
use Livewire\WithPagination;

class IndexOccurrence extends Component
{

    use WithPagination;
    public $filters = ['query' => null];

    public function render()
    {
        $occurrences = $this->getData();

        return view('livewire.users.index-occurrence', compact('occurrences'));
    }
    public function getData()
    {
        $query = Occurrence::with(['type:id,name', 'media']);

        if ($this->filters['query'] != null) {
            $query->where('description', 'like', '%'.$this->filters['query'].'%')
                ->orWhereHas('type', function ($typeQuery) {
                    $typeQuery->where('name', 'like', '%'.$this->filters['query'].'%');
                });               
        }

        return $query->paginate(5);

    }
}
