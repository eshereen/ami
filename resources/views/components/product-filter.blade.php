@props([
    'products' => collect(),
    'placeholder' => 'Search products...',
    'showCategories' => false,
    'showSubcategories' => false,
    'categories' => collect(),
    'subcategories' => collect(),
    'currentCategory' => null,
    'currentSubcategory' => null
])

<div class="mb-8" id="product-filter">
    <!-- Search Input -->
    <div class="mx-auto mb-6 max-w-md">
        <div class="relative">
            <input type="text"
                   id="search-input"
                   placeholder="{{ $placeholder }}"
                   class="py-3 pr-4 pl-12 w-full text-lg rounded-lg border border-gray-300 focus:ring-2 focus:ring-ami-blue focus:border-transparent">
            <i class="absolute top-4 left-4 text-gray-400 fas fa-search"></i>
        </div>
    </div>

    <!-- Products Count -->
    <div class="mb-6 text-center">
        <p class="text-gray-600" id="products-count">Showing {{ $products->count() }} products</p>
    </div>

    @if($showCategories && $categories->count() > 0)
    <!-- Categories Filter -->
    <div class="mx-auto mb-6 max-w-md">
        <select id="category-filter" class="px-4 py-2 w-full rounded-lg border border-gray-300 focus:ring-2 focus:ring-ami-blue focus:border-transparent">
            <option value="">All Categories</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $currentCategory && $currentCategory->id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>
    @endif

    @if($showSubcategories && $subcategories->count() > 0)
    <!-- Subcategories Filter -->
    <div class="mx-auto mb-6 max-w-md">
        <select id="subcategory-filter" class="px-4 py-2 w-full rounded-lg border border-gray-300 focus:ring-2 focus:ring-ami-blue focus:border-transparent">
            <option value="">All Subcategories</option>
            @foreach($subcategories as $subcategory)
                <option value="{{ $subcategory->id }}" {{ $currentSubcategory && $currentSubcategory->id == $subcategory->id ? 'selected' : '' }}>
                    {{ $subcategory->name }}
                </option>
            @endforeach
        </select>
    </div>
    @endif

    <!-- Clear Filters Button -->
    <div class="mb-6 text-center">
        <button onclick="clearFilters()"
                class="px-6 py-2 text-white bg-gray-500 rounded-lg transition-colors hover:bg-gray-600">
            Clear All Filters
        </button>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search-input');
    const categoryFilter = document.getElementById('category-filter');
    const subcategoryFilter = document.getElementById('subcategory-filter');
    const productCards = document.querySelectorAll('.product-card');
    const productsCount = document.getElementById('products-count');
    const noResults = document.getElementById('no-results');
    const productsGrid = document.getElementById('products-grid');

    // Product data from server
    const allProducts = @json($products->map(function($product) {
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
    }));

    function filterProducts() {
        const searchQuery = searchInput ? searchInput.value.toLowerCase().trim() : '';
        const selectedCategory = categoryFilter ? categoryFilter.value : '';
        const selectedSubcategory = subcategoryFilter ? subcategoryFilter.value : '';

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

    // Event listeners
    if (searchInput) {
        searchInput.addEventListener('input', filterProducts);
    }

    if (categoryFilter) {
        categoryFilter.addEventListener('change', filterProducts);
    }

    if (subcategoryFilter) {
        subcategoryFilter.addEventListener('change', filterProducts);
    }

    // Clear filters function
    window.clearFilters = function() {
        if (searchInput) searchInput.value = '';
        if (categoryFilter) categoryFilter.value = '';
        if (subcategoryFilter) subcategoryFilter.value = '';
        filterProducts();
    };
});
</script>
