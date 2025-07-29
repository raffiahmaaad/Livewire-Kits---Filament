<script>
    function applyTheme() {
        if (
            localStorage.theme === 'dark' ||
            (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)
        ) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    }
    applyTheme();
    document.addEventListener('turbo:load', applyTheme); // Turbo/Volt
    if (window.Livewire) {
        document.addEventListener('livewire:navigated', applyTheme); // Livewire v3+
    }
    document.addEventListener('DOMContentLoaded', applyTheme); // fallback
</script>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>{{ $title ?? config('app.name') }}</title>
<link rel="icon" href="/favicon.ico" sizes="any">
<link rel="icon" href="/favicon.svg" type="image/svg+xml">
<link rel="preconnect" href="https://fonts.bunny.net" crossorigin>
<link rel="preload" as="style" href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600">
<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
@vite(['resources/css/app.css', 'resources/js/app.js'])
@livewireStyles
@fluxAppearance
