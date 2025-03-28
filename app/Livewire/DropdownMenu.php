<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;

class DropdownMenu extends Component
{
    public $categories = [];

    public function mount()
    {
        $this->loadCategories();
    }

    public function loadCategories()
    {
        $this->categories = [
            'Werken Onder Architectuur' => Article::where('category_id', 1)->whereNotNull('published_at')->get(),
            'Informatiemanagement' => Article::where('category_id', 2)->whereNotNull('published_at')->get(),
            'Data & Security' => Article::where('category_id', 3)->whereNotNull('published_at')->get(),
            'Applicaties & Tools' => Article::where('category_id', 4)->whereNotNull('published_at')->get(),
            'Governance & Compliance' => Article::where('category_id', 5)->whereNotNull('published_at')->get(),
            'Community & Kennisdeling' => Article::where('category_id', 6)->whereNotNull('published_at')->get(),
        ];
    }

    protected $listeners = ['refreshDropdown' => 'loadCategories'];

    public function render()
    {
        return view('livewire.dropdown-menu');
    }
}