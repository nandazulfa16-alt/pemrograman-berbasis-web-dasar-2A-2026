<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timeline Belajar Developer</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen p-6 md:p-12">

    <div class="max-w-2xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-3xl font-bold text-gray-800">Timeline Perjalanan Belajar</h1>
            <p class="text-gray-600 mt-2">Rekam jejak pengembangan diri dalam dunia teknologi.</p>
        </div>

        <?php
        // 1. Struktur Data: Array Asosiatif
        $riwayat_belajar = [
            [
                "tahun" => 2022,
                "judul" => "Awal Langkah di SMKN 1 Dlanggu",
                "deskripsi" => "Memasuki dunia RPL (Rekayasa Perangkat Lunak) dan mengenal dasar-dasar algoritma."
            ],
            [
                "tahun" => 2023,
                "judul" => "Pengalaman Magang Pertama",
                "deskripsi" => "Melakukan magang di Dinas Perindustrian dan Perdagangan Kabupaten Mojokerto."
            ],
            [
                "tahun" => 2025,
                "judul" => "Mahasiswa Sistem Informasi",
                "deskripsi" => "Resmi menjadi mahasiswa di Universitas Trunojoyo Madura (UTM) angkatan 2025."
            ],
            [
                "tahun" => 2026,
                "judul" => "Aktif di Organisasi Immunity",
                "deskripsi" => "Bergabung dengan divisi Kominfo dan mulai mengelola media sosial organisasi."
            ],
            [
                "tahun" => 2026,
                "judul" => "Proyek Landing Page FILM.ID",
                "deskripsi" => "Berhasil membangun proyek platform digital tiket bioskop menggunakan Tailwind CSS."
            ]
        ];

        // 4. Fungsi Kustom: Memberikan penekanan pada tahun tertentu
        function highlightYear($tahun) {
            $tahunSekarang = 2026;
            if ($tahun == $tahunSekarang) {
                // Menghasilkan class Tailwind untuk penekanan
                return "bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-bold shadow-md";
            } else {
                return "bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-sm font-semibold";
            }
        }
        ?>

        <!-- 2. Visualisasi Timeline Vertikal -->
        <div class="relative border-l-4 border-blue-200 ml-3 md:ml-6 space-y-10">
            
            <?php 
            // 3. Perulangan: Menggunakan foreach
            foreach ($riwayat_belajar as $item): 
            ?>
            <div class="mb-10 ml-8 relative">
                <!-- Dot Timeline -->
                <div class="absolute -left-[42px] mt-1.5 w-5 h-5 bg-blue-500 rounded-full border-4 border-white shadow-sm"></div>
                
                <!-- Konten Timeline -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <span class="<?php echo highlightYear($item['tahun']); ?>">
                        <?php echo $item['tahun']; ?>
                    </span>
                    <h3 class="text-xl font-bold text-gray-800 mt-4"><?php echo htmlspecialchars($item['judul']); ?></h3>
                    <p class="text-gray-600 mt-2 leading-relaxed">
                        <?php echo htmlspecialchars($item['deskripsi']); ?>
                    </p>
                </div>
            </div>
            <?php endforeach; ?>

        </div>

        <!-- 5. Navigasi -->
        <div class="mt-16 flex flex-col md:flex-row justify-center items-center gap-4">
            <a href="index.php" class="w-full md:w-auto text-center px-6 py-3 bg-white border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition">
                ← Kembali ke Profil
            </a>
            <a href="blog.php" class="w-full md:w-auto text-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition shadow-lg shadow-blue-200">
                Menuju Blog Developer →
            </a>
        </div>
    </div>

    <footer class="text-center text-gray-400 text-xs mt-20 pb-8">
        &copy; 2026 Perjalanan Belajar - Nanda Zulfa Septiana
    </footer>

</body>
</html>