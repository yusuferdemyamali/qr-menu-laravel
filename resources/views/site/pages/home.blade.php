@extends('site.layouts.app')
@section('content')
    <section class="mb-12">
        <h2 class="text-3xl font-light text-black mb-8 tracking-wide">
            Ürünlerimiz
        </h2>
        <div id="products-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @if (isset($products) && $products->count() > 0)
                @foreach ($products as $product)
                    <div class="product-item bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-xl transition-all duration-700 transform hover:-translate-y-2 border border-gray-200 group"
                        data-category="{{ $product->category_id }}">
                        <div class="h-56 bg-gray-100 relative overflow-hidden">
                            @if ($product->image)
                                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}"
                                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gray-100">
                                    <span class="material-symbols-outlined text-gray-400 text-6xl transition-colors duration-300 group-hover:text-gray-600">restaurant</span>
                                </div>
                            @endif
                            @if ($product->category)
                                <div class="absolute top-4 right-4 text-white text-xs px-4 py-2 rounded-full font-light tracking-wide shadow-lg transition-all duration-300"
                                    style="background-color: {{ $product->category->color ?? '#000000' }};">
                                    {{ $product->category->name }}
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-10 transition-all duration-300"></div>
                        </div>
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-4">
                                <h3 class="font-light text-black text-xl group-hover:text-gray-700 transition-colors duration-300">{{ $product->name }}</h3>
                                <span class="font-light text-amber-500 text-2xl tracking-wide">{{ number_format($product->price, 2) }} ₺</span>
                            </div>
                            @if ($product->description)
                                <p class="text-gray-600 text-sm leading-relaxed font-light">
                                    {{ Str::limit($product->description, 120) }}
                                </p>
                            @endif
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-span-full text-center py-16">
                    <div class="text-gray-500">
                        <span class="material-symbols-outlined text-8xl mb-6 block opacity-50">restaurant_menu</span>
                        <h3 class="text-3xl font-light mb-4 tracking-wide">Henüz Ürün Eklenmemiş</h3>
                        <p class="text-gray-400 text-lg font-light">Yakında lezzetli ürünlerimizi burada bulabileceksiniz.</p>
                    </div>
                </div>
            @endif
        </div>

        <div id="no-products-message" class="text-center py-16 hidden">
            <div class="text-gray-500">
                <span class="material-symbols-outlined text-8xl mb-6 block opacity-50">search_off</span>
                <h3 class="text-3xl font-light mb-4 tracking-wide">Bu Kategoride Ürün Bulunamadı</h3>
                <p class="text-gray-400 text-lg font-light">Farklı bir kategori seçerek diğer lezzetlerimizi keşfedebilirsiniz.</p>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const categoryButtons = document.querySelectorAll('.category-btn');
            const productItems = document.querySelectorAll('.product-item');
            const noProductsMessage = document.getElementById('no-products-message');

            categoryButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const selectedCategory = this.getAttribute('data-category');

                    // Buton stillerini güncelle
                    categoryButtons.forEach(btn => {
                        btn.classList.remove('bg-black', 'text-white');
                        btn.classList.add('bg-white', 'text-black');
                    });
                    this.classList.remove('bg-white', 'text-black');
                    this.classList.add('bg-black', 'text-white');

                    // Ürünleri filtrele
                    let visibleProductsCount = 0;
                    productItems.forEach(item => {
                        const productCategory = item.getAttribute('data-category');

                        if (selectedCategory === 'all' || productCategory ===
                            selectedCategory) {
                            item.style.display = 'block';
                            visibleProductsCount++;
                        } else {
                            item.style.display = 'none';
                        }
                    });

                    // Hiç ürün görünmüyorsa mesaj göster
                    if (visibleProductsCount === 0) {
                        noProductsMessage.classList.remove('hidden');
                    } else {
                        noProductsMessage.classList.add('hidden');
                    }
                });
            });
        });
    </script>
@endsection
