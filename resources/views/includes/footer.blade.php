<footer class="bg-black text-white text-sm py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-4 gap-8">

        <!-- Tautan -->
        <div>
            <h3 class="text-base font-semibold mb-2">TAUTAN</h3>
            <ul class="space-y-1">
                <li class="flex items-center space-x-2">
                    <img src="{{ asset('icons/world.svg') }}" alt="world" class="w-5 h-5">
                    <a href="https://www.winnicode.com" target="_blank"
                        class="hover:underline text-zinc-300">www.winnicode.com</a>
                </li>
                <li class="flex items-center space-x-2">
                    <img src="{{ asset('icons/instagram.svg') }}" alt="instagram" class="w-5 h-5">
                    <a href="https://www.instagram.com/winnicodeofficial/" target="_blank"
                        class="hover:underline text-zinc-300">@winnicodeofficial</a>
                </li>
            </ul>
        </div>

        <!-- Sitemap -->
        <div>
            <h3 class="text-base font-semibold mb-2">SITEMAP</h3>
            <ul class="space-y-1 text-zinc-300">
                <li><a href="{{ route('landing') }}" class="hover:underline">Beranda</a></li>
                <li><a href="https://winnicode.com/kontak-kami" class="hover:underline">Kontak Kami</a></li>
                <li><a href="https://winnicode.com/privasi-policy" class="hover:underline">Privasi & Policy</a></li>
                <li><a href="https://winnicode.com/tentang" class="hover:underline">Tentang</a></li>
            </ul>
        </div>

        <!-- Kontak -->
        <div>
            <h3 class="text-base font-semibold mb-2">KONTAK KAMI</h3>
            <ul class="space-y-2 text-zinc-300">
                <li><strong>E-Mail:</strong> winnicodegarudaofficial@gmail.com</li>
                <li><strong>Call Center:</strong> 6285159932501 (24 Jam)</li>
                <li><strong>Alamat (Cabang Bandung):</strong><br>Jl. Asia Afrika No.158, Kb. Pisang, Kec. Sumur Bandung,
                    Kota Bandung, Jawa Barat 40261</li>
                <li><strong>Alamat (Cabang Yogyakarta):</strong><br>Bantul, Yogyakarta</li>
                <li><strong>Alamat (Cabang Jakarta):</strong><br>Bekasi, Jawa Barat</li>
                <li><strong>Administrasi Berkas:</strong><br>Hubungi Admin Telp: +6285159932501</li>
            </ul>
        </div>

        <!-- Kolom 4: Deskripsi -->
        <div>
            <p class="text-zinc-300">
                Jurnalistik Program winnicode adalah program pengembangan sumber daya manusia yang ditujukan bagi pemuda
                pemudi yang berkarir di dunia report.
            </p>
        </div>
    </div>

    <!-- Copyright -->
    <div class="border-t border-zinc-700 mt-10 pt-4 text-center text-zinc-500 px-4">
        Copyright © 2025 PT. WINNICODE GARUDA TEKNOLOGI
    </div>
</footer>
