<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ViewProducts extends Component
{
   use WithPagination;

    public $sortField = 'created_at'; // default sorting field
    public $sortDirection = 'desc'; // default sorting direction

    protected $paginationTheme = 'tailwind'; // use Tailwind pagination styles

    // Reset page on updating sort/filter
    public function updatingSortField()
    {
        $this->resetPage();
    }

    public function updatingSortDirection()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            // toggle sort direction
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function render()
    {
        $products = Product::with('images')
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(25);

        return view('livewire.view-products', [
            'products' => $products,
        ]);
    }
}
