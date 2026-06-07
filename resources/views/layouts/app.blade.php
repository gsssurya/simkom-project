<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMKOM - @yield('title')</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body>
    <div class="size-full min-h-screen bg-[#F7F8FC]">
        <div class="flex h-screen bg-[#F7F8FC] overflow-hidden">
            @include('layouts.sidebar')
            <main class="flex-1 overflow-y-auto w-full">
                @include('layouts.header')
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>