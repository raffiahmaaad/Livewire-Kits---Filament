<script>
    // Apply theme immediately to prevent FOUC
    (function() {
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

        // Apply theme immediately (synchronously)
        applyTheme();

        // Also apply on various navigation events
        document.addEventListener('turbo:load', applyTheme);
        if (window.Livewire) {
            document.addEventListener('livewire:navigated', applyTheme);
        }
        document.addEventListener('DOMContentLoaded', applyTheme);
    })();
</script>
<style>
    /* Prevent navbar glitching during page load */
    .navbar-loading {
        opacity: 0;
        transition: opacity 0.15s ease-in-out;
    }

    .navbar-loaded {
        opacity: 1;
    }

    /* Smooth transitions for theme switching */
    nav, nav *, [data-flux-header], [data-flux-sidebar] {
        transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, border-color 0.2s ease-in-out;
    }

    /* Prevent flash of unstyled content for Alpine and Flux components */
    [x-cloak], [data-flux-loading] {
        display: none !important;
    }

    /* Ensure consistent layout heights to prevent shifts */
    [data-flux-header] {
        min-height: 4rem;
    }

    [data-flux-sidebar] {
        transition: transform 0.2s ease-in-out, opacity 0.2s ease-in-out;
    }
</style>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>{{ $title ?? config('app.name') }}</title>

<link rel="icon" href="/favicon.ico" sizes="any">
<link rel="icon" href="/favicon.svg" type="image/svg+xml">
<link rel="apple-touch-icon" href="/apple-touch-icon.png">

<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

@vite(['resources/css/app.css', 'resources/js/app.js'])
@fluxAppearance
