<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\Occurrence;
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

        $query->when($this->filters['query'], function ($q, $searchQuery) {
            return $q->where(function ($subquery) use ($searchQuery) {
                $subquery->where('id', 'like', "%{$searchQuery}%")
                    ->orWhere('description', 'like', "%{$searchQuery}%")
                    ->orWhereHas('type', function ($typeQuery) use ($searchQuery) {
                        $typeQuery->where('name', 'like', "%{$searchQuery}%");
                    });
            });
        });
        
        return $query->paginate(2);
    }
}
