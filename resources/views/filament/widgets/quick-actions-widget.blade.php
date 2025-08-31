<div class="filament-widget">
    <div class="bg-white rounded-xl shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10">
        <div class="p-6">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Hızlı İşlemler
                </h2>
                <div class="flex items-center space-x-2">
                    <x-heroicon-o-bolt class="h-5 w-5 text-yellow-500" />
                </div>
            </div>
            
            <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($actions as $action)
                    <a 
                        href="{{ $action['url'] }}" 
                        @if(isset($action['target']))
                            target="{{ $action['target'] }}"
                        @endif
                        @if(isset($action['onclick']))
                            onclick="{{ $action['onclick'] }}"
                        @endif
                        class="group relative bg-gray-50 dark:bg-gray-800/50 p-4 rounded-lg border border-gray-200 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors duration-150"
                    >
                        <div class="flex items-start space-x-3">
                            <div class="flex-shrink-0">
                                @php
                                    $colorClasses = [
                                        'success' => 'bg-green-100 text-green-600 dark:bg-green-900/50 dark:text-green-400',
                                        'info' => 'bg-blue-100 text-blue-600 dark:bg-blue-900/50 dark:text-blue-400',
                                        'warning' => 'bg-yellow-100 text-yellow-600 dark:bg-yellow-900/50 dark:text-yellow-400',
                                        'danger' => 'bg-red-100 text-red-600 dark:bg-red-900/50 dark:text-red-400',
                                        'primary' => 'bg-indigo-100 text-indigo-600 dark:bg-indigo-900/50 dark:text-indigo-400',
                                        'gray' => 'bg-gray-100 text-gray-600 dark:bg-gray-700 dark:text-gray-400',
                                    ];
                                    $colorClass = $colorClasses[$action['color']] ?? $colorClasses['gray'];
                                @endphp
                                <div class="rounded-lg p-2 {{ $colorClass }} group-hover:scale-110 transition-transform duration-150">
                                    @svg($action['icon'], 'h-5 w-5')
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 dark:text-white group-hover:text-gray-600 dark:group-hover:text-gray-300">
                                    {{ $action['label'] }}
                                </p>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                    {{ $action['description'] }}
                                </p>
                            </div>
                        </div>
                        <div class="absolute inset-0 rounded-lg ring-1 ring-inset ring-gray-200 dark:ring-gray-700 group-hover:ring-gray-300 dark:group-hover:ring-gray-600"></div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
function generateQRCode() {
    // QR kod oluşturma fonksiyonu - daha sonra implement edilebilir
    alert('QR Kod oluşturma özelliği yakında eklenecek!');
}
</script>
