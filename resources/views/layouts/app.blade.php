<html>
<head>
    @livewireStyles
</head>
<body>
    {{ $slot ?? '' }}

    @livewireScripts
    <script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>
