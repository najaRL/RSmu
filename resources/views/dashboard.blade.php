<x-app-layout>
    <x-slot name="header">
        <!-- Kosongkan atau sembunyikan header -->
    </x-slot>

    <style>
        .bg-overlay {
            background: linear-gradient(to right, rgba(0, 191, 165, 0.8), rgba(0, 191, 255, 0.8));
        }
    </style>

    <div class="relative bg-white dark:bg-gray-800 min-h-screen">
        <!-- Header Banner -->
        <div class="relative w-full h-[350px] overflow-hidden">
            <img src="{{ asset('images/dokter.jpg') }}" alt="Dokter" class="w-full h-full object-cover brightness-75">
            <div class="absolute top-0 left-0 w-full h-full bg-overlay mix-blend-multiply"></div>
            <div class="absolute top-0 left-0 w-full h-full flex flex-col justify-center items-center text-white text-center px-4">
                <h1 class="text-4xl md:text-5xl font-bold">Selamat Datang di Rumah Sakit</h1>
                <p class="text-2xl mt-2">Seger Waras</p>
            </div>

            <!-- Navbar (opsional) -->
            <div class="absolute top-4 right-4 flex gap-4 text-white">
                <a href="#" class="hover:underline">Home</a>
                <a href="#" class="hover:underline">Dokter</a>
                <a href="#" class="hover:underline">Layanan</a>
                <a href="#" class="hover:underline">Kontak</a>
            </div>
        </div>

<!-- VISI & MISI -->
<div class="max-w-4xl mx-auto py-12 px-4">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-gray-800 dark:text-gray-100 items-start text-center">
        <div class="bg-teal-100 dark:bg-gray-700 p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-4">VISI</h2>
            <p>
                Menjadi rumah sakit terpercaya yang unggul dalam pelayanan kesehatan,
                berorientasi pada keselamatan pasien dan kepuasan masyarakat.
            </p>
        </div>
        <div class="bg-teal-100 dark:bg-gray-700 p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-4">MISI</h2>
            <ul class="list-disc list-inside text-left">
                <li>Memberikan layanan kesehatan yang bermutu dan profesional.</li>
                <li>Mengembangkan sumber daya manusia yang kompeten.</li>
                <li>Mewujudkan lingkungan pelayanan yang aman dan nyaman.</li>
                <li>Meningkatkan kualitas pelayanan melalui inovasi dan teknologi.</li>
            </ul>
        </div>
    </div>
</div>
</x-app-layout>

