<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Reflektif Developer</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 min-h-screen">

    <div class="max-w-5xl mx-auto p-6 md:p-12">
        <!-- Header -->
        <header class="mb-10 border-b pb-6">
            <h1 class="text-3xl font-extrabold text-slate-800">DevJournal: Catatan Nanda</h1>
            <p class="text-slate-500">Berbagi pengalaman, error, dan kemenangan kecil dalam coding.</p>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <!-- 1. Navigasi GET (Sidebar) -->
            <aside class="space-y-4">
                <h2 class="text-lg font-bold text-slate-700 mb-4 uppercase tracking-wider text-sm">Daftar Artikel</h2>
                <nav class="flex flex-col gap-2">
                    <?php
                    $artikel_list = [
                        "html-dasar" => "Belajar HTML Pertama Kali",
                        "error-log" => "Menghadapi Error 404 & Syntax Error",
                        "tailwind-journey" => "Eksplorasi Desain dengan Tailwind CSS"
                    ];

                    foreach ($artikel_list as $slug => $judul) {
                        // Cek apakah menu ini sedang aktif
                        $activeClass = (isset($_GET['post']) && $_GET['post'] == $slug) ? 'bg-blue-600 text-white shadow-md' : 'bg-white text-slate-600 hover:bg-blue-50 border border-slate-200';
                        echo "<a href='?post=$slug' class='p-3 rounded-lg transition-all font-medium $activeClass'>$judul</a>";
                    }
                    ?>
                </nav>

                <!-- 2. Kutipan Motivasi (Random) -->
                <div class="mt-8 p-6 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl text-white shadow-lg">
                    <h3 class="text-xs font-bold uppercase opacity-80 mb-2 italic">Motivasi Hari Ini:</h3>
                    <?php
                    $quotes = [
                        "Bukan bahasa pemrogramannya yang sulit, tapi konsistensinya.",
                        "Setiap error adalah pelajaran yang membuatmu selangkah lebih ahli.",
                        "Coding adalah seni memecahkan masalah yang tidak kamu ketahui sebelumnya.",
                        "Jangan berhenti saat lelah, berhentilah saat selesai.",
                        "Programming is 10% coding and 90% staring at the screen wondering why it doesn't work."
                    ];
                    $random_quote = $quotes[array_rand($quotes)];
                    echo "<p class='font-medium'>\"$random_quote\"</p>";
                    ?>
                </div>
            </aside>

            <!-- 2. Konten Dinamis -->
            <main class="md:col-span-2">
                <?php
                // Data Konten Artikel
                $konten = [
                    "html-dasar" => [
                        "judul" => "Belajar HTML Pertama Kali",
                        "tanggal" => "15 September 2022",
                        "refleksi" => "Saat pertama kali melihat tag <html> di layar, saya merasa seperti sedang mempelajari bahasa rahasia. Membuat teks menjadi 'Hello World' di browser adalah kemenangan besar bagi saya saat itu.",
                        "gambar" => "html.jpg",
                        "link" => "https://www.w3schools.com/html/"
                    ],
                    "error-log" => [
                        "judul" => "Menghadapi Error 404 & Syntax Error",
                        "tanggal" => "10 Maret 2023",
                        "refleksi" => "Error pertama saya membuat saya panik selama berjam-jam, hanya karena kurang satu titik koma (;). Dari sini saya belajar bahwa ketelitian adalah kunci utama seorang developer.",
                        "gambar" => "error.jpg",
                        "link" => "https://developer.mozilla.org/en-US/docs/Web/HTTP/Status/404"
                    ],
                    "tailwind-journey" => [
                        "judul" => "Eksplorasi Desain dengan Tailwind CSS",
                        "tanggal" => "20 April 2026",
                        "refleksi" => "Tailwind mengubah cara saya memandang CSS. Tidak lagi pusing dengan penamaan class yang panjang, cukup utility class dan desain langsung jadi dengan rapi.",
                        "gambar" => "tailwind.jpg",
                        "link" => "https://tailwindcss.com/"
                    ]
                ];

                $selected_post = $_GET['post'] ?? null;

                if ($selected_post && isset($konten[$selected_post])) {
                    $post = $konten[$selected_post];
                    ?>
                    <article class="bg-white p-8 rounded-2xl shadow-sm border border-slate-200 animate-fade-in">
                        <header class="mb-6">
                            <span class="text-blue-600 text-sm font-bold uppercase tracking-widest"><?php echo $post['tanggal']; ?></span>
                            <h2 class="text-3xl font-bold text-slate-800 mt-2"><?php echo $post['judul']; ?></h2>
                        </header>
                        
                        <div class="mb-6 overflow-hidden rounded-xl h-64 bg-slate-200">
                            <!-- Gambar dari folder lokal -->
                            <img src="img/<?php echo $post['gambar']; ?>" alt="Ilustrasi" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500" onerror="this.src='https://via.placeholder.com/800x400?text=Gambar+Tidak+Ditemukan'">
                        </div>

                        <div class="prose prose-slate max-w-none">
                            <p class="text-slate-600 leading-relaxed text-lg italic">
                                "<?php echo $post['refleksi']; ?>"
                            </p>
                        </div>

                        <div class="mt-8 pt-6 border-t">
                            <p class="text-sm text-slate-500 mb-2">Pelajari lebih lanjut:</p>
                            <a href="<?php echo $post['link']; ?>" target="_blank" class="text-blue-600 font-semibold hover:underline flex items-center gap-1">
                                Referensi Dokumentasi Eksternal 
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                            </a>
                        </div>
                    </article>
                    <?php
                } else {
                    echo "
                    <div class='bg-blue-50 border-2 border-dashed border-blue-200 p-12 rounded-2xl text-center'>
                        <div class='text-5xl mb-4'>📑</div>
                        <h3 class='text-xl font-bold text-blue-800'>Selamat Datang di Blog</h3>
                        <p class='text-blue-600'>Silakan pilih salah satu judul artikel di samping untuk membaca refleksi saya.</p>
                    </div>";
                }
                ?>
            </main>
        </div>

        <nav class="mt-16 flex justify-between items-center border-t pt-8">
            <a href="timeline.php" class="text-slate-600 hover:text-blue-600 flex items-center gap-2 font-medium transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" /></svg>
                Halaman Timeline
            </a>
            <a href="index.php" class="text-slate-600 hover:text-blue-600 flex items-center gap-2 font-medium transition">
                Halaman Profil
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
            </a>
        </nav>
    </div>

     <footer class="text-center text-gray-400 text-xs mt-20 pb-8">
        &copy; 2026 Blog Developer - Nanda Zulfa Septiana
    </footer>

</body>
</html>