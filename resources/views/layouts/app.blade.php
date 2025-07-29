<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('components.head', ['title' => $title ?? null])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('components.navbar')
        <main>
            {{ $slot ?? '' }}
        </main>
    </div>
    @livewireScripts
</body>

</html>
