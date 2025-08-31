        <footer class="bg-white text-black py-8 px-6 mt-12 relative z-20 border-t border-gray-200">
            <div class="max-w-6xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div>
                        <h3 class="font-light text-xl mb-4 tracking-wide text-amber-600">{{ siteSetting('site_name') }}</h3>
                        <p class="text-gray-600 text-sm font-light leading-relaxed">
                            2010&#x27;dan beri mükemmel kahve deneyimini yaratıyoruz.
                        </p>
                    </div>
                    <div>
                        <h3 class="font-light mb-4 text-lg tracking-wide">Çalışma Saatleri</h3>
                        <p class="text-gray-600 text-sm font-light">{{ siteSetting('site_working_hours') }}</p>
                    </div>
                    <div>
                        <h3 class="font-light mb-4 text-lg tracking-wide">İletişim</h3>
                        <p class="text-gray-600 text-sm font-light">{{ siteSetting('site_address') }}</p>
                        <p class="text-gray-600 text-sm font-light">{{ siteSetting('site_email') }}</p>
                    </div>
                    <div>
                        <h3 class="font-light mb-4 text-lg tracking-wide">Bizi Takip Edin</h3>
                        <div class="flex space-x-4">
                            <a href="{{ siteSetting('site_instagram_url') }}" class="text-black hover:text-gray-600 transition-colors duration-300">
                                <i class="fa-brands fa-instagram text-xl"></i>
                            </a>
                            <a href="{{ siteSetting('site_facebook_url') }}" class="text-black hover:text-gray-600 transition-colors duration-300">
                                <i class="fa-brands fa-facebook text-xl"></i>
                            </a>
                            <a href="{{ siteSetting('site_twitter_url') }}" class="text-black hover:text-gray-600 transition-colors duration-300">
                                <i class="fa-brands fa-twitter text-xl"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="border-t border-gray-300 mt-8 pt-8 text-center text-gray-500 text-sm font-light">
                    <p>© 2025 {{ siteSetting('site_name') }} Tüm hakları saklıdır.</p>
                </div>
            </div>
        </footer>
