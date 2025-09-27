<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Collection;

class ProductFilter extends Component
{
    public Collection $products;
    public string $placeholder;
    public bool $showCategories;
    public bool $showSubcategories;
    public Collection $categories;
    public Collection $subcategories;
    public mixed $currentCategory;
    public mixed $currentSubcategory;

    /**
     * Create a new component instance.
     */
    public function __construct(
        Collection $products,
        string $placeholder = 'Search products...',
        bool $showCategories = false,
        bool $showSubcategories = false,
        Collection $categories = null,
        Collection $subcategories = null,
        mixed $currentCategory = null,
        mixed $currentSubcategory = null
    ) {
        $this->products = $products;
        $this->placeholder = $placeholder;
        $this->showCategories = $showCategories;
        $this->showSubcategories = $showSubcategories;
        $this->categories = $categories ?? collect();
        $this->subcategories = $subcategories ?? collect();
        $this->currentCategory = $currentCategory;
        $this->currentSubcategory = $currentSubcategory;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product-filter');
    }
}
