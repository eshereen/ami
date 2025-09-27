@php
    $products = $products ?? collect();
    $placeholder = $placeholder ?? 'Search products...';
    $showCategories = $showCategories ?? false;
    $showSubcategories = $showSubcategories ?? false;
    $categories = $categories ?? collect();
    $subcategories = $subcategories ?? collect();
    $currentCategory = $currentCategory ?? null;
    $currentSubcategory = $currentSubcategory ?? null;
@endphp

<div class="mb-8 lg:mb-0" id="product-filter">
    <!-- Search Input -->
    <div class="mb-6">
        <div class="relative">
            <input type="text"
                    id="search-input"
                    placeholder="{{ $placeholder }}"
                    class="py-3 pr-4 pl-12 w-full text-lg rounded-lg border border-gray-300 focus:ring-2 focus:ring-ami-blue focus:border-transparent">
            <i class="absolute top-4 left-4 text-gray-400 fas fa-search"></i>
        </div>
    </div>

    <!-- Products Count -->
    <div class="mb-6 text-center lg:text-left">
        <p class="text-gray-600" id="products-count">Showing {{ $products->count() }} products</p>
    </div>

    @if($showCategories && $categories->count() > 0)
    <!-- Categories Filter -->
    <div class="mb-6">
        <div class="filter-section">
            <button class="filter-toggle" onclick="toggleFilter('categories')">
                <span>Categories</span>
                <i class="transition-transform duration-200 fas fa-plus" id="categories-icon"></i>
            </button>
            <div class="filter-content" id="categories-content" style="display: none;">
                <div class="filter-options">
                    <label class="filter-option">
                        <input type="radio" name="category" value="" class="hidden" checked>
                        <span class="filter-option-text">All Categories</span>
                    </label>
                    @foreach($categories as $category)
                        <label class="filter-option">
                            <input type="radio" name="category" value="{{ $category->id }}" class="hidden"
                                   {{ $currentCategory && $currentCategory->id == $category->id ? 'checked' : '' }}>
                            <span class="filter-option-text">{{ $category->name }}</span>
                        </label>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif

    @if($showSubcategories && $subcategories->count() > 0)
    <!-- Subcategories Filter -->
    <div class="mb-6">
        <div class="filter-section">
            <button class="filter-toggle" onclick="toggleFilter('subcategories')">
                <span>Subcategories</span>
                <i class="transition-transform duration-200 fas fa-plus" id="subcategories-icon"></i>
            </button>
            <div class="filter-content" id="subcategories-content" style="display: none;">
                <div class="filter-options">
                    <label class="filter-option">
                        <input type="radio" name="subcategory" value="" class="hidden" checked>
                        <span class="filter-option-text">All Subcategories</span>
                    </label>
                    @foreach($subcategories as $subcategory)
                        <label class="filter-option">
                            <input type="radio" name="subcategory" value="{{ $subcategory->id }}" class="hidden"
                                   {{ $currentSubcategory && $currentSubcategory->id == $subcategory->id ? 'checked' : '' }}>
                            <span class="filter-option-text">{{ $subcategory->name }}</span>
                        </label>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Clear Filters Button -->
    <div class="text-center">
        <button onclick="clearFilters()"
                class="px-6 py-2 text-white bg-gray-500 rounded-lg transition-colors hover:bg-gray-600">
            Clear All Filters
        </button>
    </div>
</div>

<style>
.filter-section {
    margin-bottom: 1rem;
}

.filter-toggle {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
    padding: 0.75rem 0;
    background: none;
    border: none;
    font-weight: 600;
    color: #374151;
    cursor: pointer;
    transition: color 0.2s ease;
}

.filter-toggle:hover {
    color: #f97316;
}

.filter-content {
    margin-top: 0.5rem;
    padding-left: 0.5rem;
}

.filter-options {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.filter-option {
    display: flex;
    align-items: center;
    padding: 0.5rem;
    cursor: pointer;
    border-radius: 0.375rem;
    transition: background-color 0.2s ease;
}

.filter-option:hover {
    background-color: #f3f4f6;
}

.filter-option input:checked + .filter-option-text {
    color: #f97316;
    font-weight: 600;
}

.filter-option-text {
    color: #6b7280;
    transition: all 0.2s ease;
}

.filter-toggle i {
    font-size: 0.875rem;
}

.filter-toggle i.rotated {
    transform: rotate(45deg);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search-input');
    const productCards = document.querySelectorAll('.product-card');
    const productsCount = document.getElementById('products-count');
    const noResults = document.getElementById('no-results');
    const productsGrid = document.getElementById('products-grid');

    // Product data from server
    const allProducts = {!! json_encode($products->map(function($product) {
        return [
            'id' => $product->id,
            'name' => $product->name,
            'model_name' => $product->model_name,
            'description' => $product->description,
            'category_id' => $product->subcategory->category_id ?? null,
            'subcategory_id' => $product->subcategory_id,
            'category_name' => $product->subcategory->category->name ?? '',
            'subcategory_name' => $product->subcategory->name ?? ''
        ];
    })) !!};

    function filterProducts() {
        const searchQuery = searchInput ? searchInput.value.toLowerCase().trim() : '';
        const selectedCategory = document.querySelector('input[name="category"]:checked')?.value || '';
        const selectedSubcategory = document.querySelector('input[name="subcategory"]:checked')?.value || '';

        let visibleCount = 0;

        productCards.forEach(function(card, index) {
            const product = allProducts[index];
            if (!product) return;

            let show = true;

            // Search filter
            if (searchQuery) {
                const matchesSearch =
                    product.name.toLowerCase().includes(searchQuery) ||
                    product.model_name.toLowerCase().includes(searchQuery) ||
                    product.description.toLowerCase().includes(searchQuery);
                if (!matchesSearch) show = false;
            }

            // Category filter
            if (selectedCategory && product.category_id != selectedCategory) {
                show = false;
            }

            // Subcategory filter
            if (selectedSubcategory && product.subcategory_id != selectedSubcategory) {
                show = false;
            }

            // Show/hide card
            if (show) {
                card.style.display = 'block';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        // Update count and show/hide no results message
        if (productsCount) {
            productsCount.textContent = 'Showing ' + visibleCount + ' products';
        }

        if (visibleCount === 0 && noResults && productsGrid) {
            productsGrid.style.display = 'none';
            noResults.style.display = 'block';
        } else if (productsGrid) {
            productsGrid.style.display = 'grid';
            if (noResults) noResults.style.display = 'none';
        }
    }

    // Toggle filter sections
    window.toggleFilter = function(filterType) {
        const content = document.getElementById(filterType + '-content');
        const icon = document.getElementById(filterType + '-icon');

        if (content.style.display === 'none') {
            content.style.display = 'block';
            icon.classList.add('rotated');
        } else {
            content.style.display = 'none';
            icon.classList.remove('rotated');
        }
    };

    // Event listeners
    if (searchInput) {
        searchInput.addEventListener('input', filterProducts);
    }

    // Add event listeners to radio buttons
    document.querySelectorAll('input[name="category"]').forEach(function(radio) {
        radio.addEventListener('change', filterProducts);
    });

    document.querySelectorAll('input[name="subcategory"]').forEach(function(radio) {
        radio.addEventListener('change', filterProducts);
    });

    // Clear filters function
    window.clearFilters = function() {
        if (searchInput) searchInput.value = '';

        // Reset radio buttons
        document.querySelectorAll('input[name="category"]').forEach(function(radio) {
            radio.checked = radio.value === '';
        });

        document.querySelectorAll('input[name="subcategory"]').forEach(function(radio) {
            radio.checked = radio.value === '';
        });

        // Close all filter sections
        document.querySelectorAll('.filter-content').forEach(function(content) {
            content.style.display = 'none';
        });

        document.querySelectorAll('.filter-toggle i').forEach(function(icon) {
            icon.classList.remove('rotated');
        });

        filterProducts();
    };
});
</script>
