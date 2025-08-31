<div class="filament-widget">
    <div class="bg-white rounded-xl shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10">
        <div class="p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Sistem Bilgileri
                </h2>
                <div class="flex items-center space-x-2">
                    <x-heroicon-o-server class="h-5 w-5 text-blue-500" />
                </div>
            </div>
            
            <div class="space-y-3">
                <div class="flex justify-between items-center py-2 border-b border-gray-100 dark:border-gray-700">
                    <span class="text-sm font-medium text-gray-600 dark:text-gray-400">PHP Sürümü:</span>
                    <span class="text-sm text-gray-900 dark:text-gray-100 font-mono">{{ $php_version }}</span>
                </div>
                
                <div class="flex justify-between items-center py-2 border-b border-gray-100 dark:border-gray-700">
                    <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Laravel Sürümü:</span>
                    <span class="text-sm text-gray-900 dark:text-gray-100 font-mono">{{ $laravel_version }}</span>
                </div>
                
                <div class="flex justify-between items-center py-2 border-b border-gray-100 dark:border-gray-700">
                    <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Sunucu Zamanı:</span>
                    <span class="text-sm text-gray-900 dark:text-gray-100 font-mono">{{ $server_time }}</span>
                </div>
                
                <div class="flex justify-between items-center py-2 border-b border-gray-100 dark:border-gray-700">
                    <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Zaman Dilimi:</span>
                    <span class="text-sm text-gray-900 dark:text-gray-100 font-mono">{{ $timezone }}</span>
                </div>
                
                <div class="flex justify-between items-center py-2 border-b border-gray-100 dark:border-gray-700">
                    <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Ortam:</span>
                    <span class="text-sm text-gray-900 dark:text-gray-100 font-mono">
                        <span class="px-2 py-1 text-xs rounded-full 
                        {{ $environment === 'production' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 
                           'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200' }}">
                            {{ ucfirst($environment) }}
                        </span>
                    </span>
                </div>
                
                <div class="flex justify-between items-center py-2">
                    <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Debug Modu:</span>
                    <span class="text-sm text-gray-900 dark:text-gray-100 font-mono">
                        <span class="px-2 py-1 text-xs rounded-full 
                        {{ $debug_mode === 'Kapalı' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 
                           'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' }}">
                            {{ $debug_mode }}
                        </span>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
