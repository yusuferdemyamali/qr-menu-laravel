        <header class="p-6 bg-white text-black shadow-sm sticky top-0 z-50 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-3">
                    <h1 class="text-2xl font-light tracking-wide">{{ siteSetting('site_name') }}</h1>
                </div>
            </div>
        </header>
        <section class="p-6 bg-gray-50 text-black pt-8">
            <div class="flex flex-col gap-4">
                <div class="max-w-4xl mx-auto text-center py-12 px-4">
                    <h2 class="text-3xl md:text-4xl font-light mb-4 tracking-wide">
                        Hoş Geldiniz
                    </h2>
                    <p class="mb-8 text-gray-600 text-lg font-light">
                        Rahatlık ve <span class="text-amber-600 font-medium">lezzet</span> arasındaki mükemmel uyumu keşfedin
                    </p>
                </div>
            </div>
        </section>
        <nav class="p-6 sticky top-20 bg-white z-40 shadow-sm border-b border-gray-100">
            <div class="flex overflow-x-auto gap-3 pb-2 scrollbar-hide no-scrollbar">
                <button
                    class="category-btn bg-black text-white px-6 py-3 rounded-none shadow-sm whitespace-nowrap hover:bg-gray-800 transition-all duration-300 font-light tracking-wide"
                    data-category="all">
                    Tümü
                </button>
                @if(isset($categories))
                    @foreach($categories as $category)
                        <button
                            class="category-btn bg-white text-black px-6 py-3 rounded-none shadow-sm whitespace-nowrap hover:bg-gray-100 transition-all duration-300 border border-gray-200 font-light tracking-wide"
                            data-category="{{ $category->id }}">
                            {{ $category->name }}
                        </button>
                    @endforeach
                @endif
            </div>
        </nav>
