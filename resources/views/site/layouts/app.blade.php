<!DOCTYPE html>
<html lang="tr">
@include('site.layouts.head')

<body>
    <div id="webcrumbs">
        <div class="bg-white min-h-screen font-sans relative text-black">
            @include('site.layouts.header')
            <main class="p-4 max-w-6xl mx-auto pb-20">
                @yield('content')
            </main>
            @include('site.layouts.footer')
        </div>
    </div>
    @include('site.layouts.script')

</body>
</html>
