<html>
<head>
     <!-- Fonts -->
     @vite('resources/css/app.css')
   <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    @livewireStyles
</head>
<body>
    {{ $slot ?? '' }}

    @livewireScripts
    <script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>
