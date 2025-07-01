<div x-data="{ sortField: @entangle('sortField'), sortDirection: @entangle('sortDirection') }" class="p-4 max-w-7xl mx-auto">

    <h1 class="text-3xl font-bold mb-6 text-center sm:text-left">Products</h1>

    <!-- Sorting controls -->
    <div class="mb-4 flex flex-wrap items-center gap-4 justify-center sm:justify-start">
        <span class="font-semibold">Sort by:</span>

        <button
            @click="$wire.sortBy('created_at')"
            :class="sortField === 'created_at' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700'"
            class="px-3 py-1 rounded transition hover:bg-blue-500 hover:text-white"
            type="button"
        >
            Date Added
            <template x-if="sortField === 'created_at'">
                <span x-text="sortDirection === 'asc' ? '↑' : '↓'"></span>
            </template>
        </button>

        <button
            @click="$wire.sortBy('price')"
            :class="sortField === 'price' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700'"
            class="px-3 py-1 rounded transition hover:bg-blue-500 hover:text-white"
            type="button"
        >
            Price
            <template x-if="sortField === 'price'">
                <span x-text="sortDirection === 'asc' ? '↑' : '↓'"></span>
            </template>
        </button>

        <button
            @click="$wire.sortBy('title')"
            :class="sortField === 'title' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700'"
            class="px-3 py-1 rounded transition hover:bg-blue-500 hover:text-white"
            type="button"
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
            <div class="border rounded-lg shadow-sm overflow-hidden flex flex-col bg-white">
                @if ($product->images->first())
                    <img
                        src="{{ $product->images->first()->url }}"
                        alt="{{ $product->title }}"
                        class="w-full h-48 object-cover"
                        loading="lazy"
                    />
                @else
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500">
                        No Image
                    </div>
                @endif

                <div class="p-4 flex flex-col flex-grow">
                    <h2 class="text-lg font-semibold mb-2 truncate" title="{{ $product->title }}">{{ $product->title }}</h2>
                    <p class="text-gray-600 flex-grow text-sm">{{ Str::limit($product->description, 100) }}</p>
                    <div class="mt-4 flex justify-between items-center text-sm">
                        <span class="font-bold text-blue-600">{{ number_format($product->price, 2) }} €</span>
                        <span class="text-gray-500">{{ $product->category }}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination links -->
    <div class="mt-6 flex justify-center">
        {{ $products->links() }}
    </div>
</div>
