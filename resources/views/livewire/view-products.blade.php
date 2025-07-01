<div x-data="{ sortField: @entangle('sortField'), sortDirection: @entangle('sortDirection') }" class="p-4 max-w-7xl mx-auto">

    <h1 class="text-3xl font-bold mb-6">Products</h1>

    <!-- Sorting controls -->
    <div class="mb-4 flex flex-wrap items-center gap-4">
        <span class="font-semibold">Sort by:</span>

        <button
            @click="$wire.sortBy('created_at')"
            :class="sortField === 'created_at' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700'"
            class="px-3 py-1 rounded transition"
        >
            Date Added
            <template x-if="sortField === 'created_at'">
                <span x-text="sortDirection === 'asc' ? '↑' : '↓'"></span>
            </template>
        </button>

        <button
            @click="$wire.sortBy('price')"
            :class="sortField === 'price' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700'"
            class="px-3 py-1 rounded transition"
        >
            Price
            <template x-if="sortField === 'price'">
                <span x-text="sortDirection === 'asc' ? '↑' : '↓'"></span>
            </template>
        </button>

        <button
            @click="$wire.sortBy('title')"
            :class="sortField === 'title' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700'"
            class="px-3 py-1 rounded transition"
        >
            Title
            <template x-if="sortField === 'title'">
                <span x-text="sortDirection === 'asc' ? '↑' : '↓'"></span>
            </template>
        </button>
    </div>

    <!-- Products grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($products as $product)
            <div class="border rounded-lg shadow-sm overflow-hidden flex flex-col">
                @if ($product->images->first())
                    <img
                        src="{{ $product->images->first()->url }}"
                        alt="{{ $product->title }}"
                        class="w-full h-48 object-cover"
                    />
                @else
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500">
                        No Image
                    </div>
                @endif

                <div class="p-4 flex flex-col flex-grow">
                    <h2 class="text-lg font-semibold mb-2">{{ $product->title }}</h2>
                    <p class="text-gray-600 flex-grow">{{ Str::limit($product->description, 100) }}</p>
                    <div class="mt-4 flex justify-between items-center">
                        <span class="font-bold text-blue-600">{{ number_format($product->price, 2) }} €</span>
                        <span class="text-sm text-gray-500">{{ $product->category }}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination links -->
    <div class="mt-6">
        {{ $products->links() }}
    </div>
</div>
