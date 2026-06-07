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
<body class="bg-[#F4F7FE] min-h-screen flex text-[#2B3674]">

    <!-- Include Komponen Sidebar -->
    @include('layouts.sidebar')

    <!-- Wrapper Konten Utama Kanan -->
    <div class="flex-1 flex flex-col min-w-0">
        
        <!-- Include Komponen Header -->
        @include('layouts.header')

        <!-- Area Konten Dinamis -->
        <main class="p-8 space-y-8 flex-1 overflow-y-auto">
            @yield('content')
        </main>
        
    </div>

</body>
</html>