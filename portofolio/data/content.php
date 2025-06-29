<?php
// /data/content.php

// DATA UNTUK BAGIAN SKILLS
$skills = [
    [
        'icon' => 'fa-solid fa-wand-magic-sparkles',
        'title' => 'UI/UX Design',
        'percentage' => 85,
        'description' => 'Merancang antarmuka yang intuitif dan pengalaman pengguna yang menarik, dengan fokus pada kemudahan penggunaan dan estetika modern.'
    ],
    [
        'icon' => 'fa-solid fa-video',
        'title' => 'Video Editor',
        'percentage' => 90,
        'description' => 'Menguasai Alight Motion, Kinemaster, dan Capcut untuk menghasilkan video yang dinamis dan memikat, mulai dari konten sosial media hingga proyek kreatif.'
    ],
    [
        'icon' => 'fa-solid fa-code',
        'title' => 'Web Design',
        'percentage' => 75,
        'description' => 'Membangun website yang responsif dan fungsional dengan memperhatikan detail visual dan tren desain web terkini.'
    ],
    [
        'icon' => 'fa-solid fa-palette',
        'title' => 'Graphic Design',
        'percentage' => 80,
        'description' => 'Membuat berbagai materi visual seperti logo, poster, dan konten promosi dengan pemahaman yang kuat tentang komposisi dan warna.'
    ]
];

// DATA UNTUK BAGIAN EXPERIENCE
$work_experience = [
    [
        'year' => '2023 - Present',
        'title' => 'Freelance Web Designer',
        'description' => 'Merancang dan mengembangkan website untuk klien, dengan fokus pada desain yang bersih dan pengalaman pengguna yang lancar.'
    ],
    [
        'year' => '2022 - 2023',
        'title' => 'Graphic Design Intern • Creative Agency',
        'description' => 'Membantu tim desain dalam membuat materi pemasaran digital, termasuk postingan media sosial, banner, dan infografis.'
    ]
];

$organizational_experience = [
    [
        'year' => '2024',
        'title' => 'Ketua Divisi Desain • Pameran Teknologi Universitas',
        'description' => 'Memimpin tim desain untuk semua materi branding dan promosi acara, dari logo hingga dekorasi panggung.'
    ],
    [
        'year' => '2022 - 2023',
        'title' => 'Anggota Aktif • Komunitas Multimedia Kampus',
        'description' => 'Berpartisipasi dalam workshop dan proyek kolaboratif yang berfokus pada produksi video dan desain grafis.'
    ]
];

// DATA UNTUK BAGIAN WORKS (PORTOFOLIO)
$works = [
    [
        'id' => 'e-commerce-website',
        'image' => 'https://images.unsplash.com/photo-1541462608143-67571c6738dd?w=400&h=300&fit=crop',
        'title' => 'E-Commerce Website',
        'category' => 'Web Design',
        'category_slug' => 'web'
    ],
    [
        'id' => 'corporate-branding',
        'image' => 'https://images.unsplash.com/photo-1557426272-fc759fdf7a8d?w=400&h=300&fit=crop',
        'title' => 'Corporate Branding',
        'category' => 'Branding & Identity',
        'category_slug' => 'branding'
    ],
    [
        'id' => 'food-photography',
        'image' => 'https://images.unsplash.com/photo-1513104890138-7c749659a591?w=400&h=300&fit=crop',
        'title' => 'Food Photography',
        'category' => 'Food Photography',
        'category_slug' => 'food'
    ],
    [
        'id' => 'mobile-banking-app',
        'image' => 'https://images.unsplash.com/photo-1600721391689-2564bb8054de?w=400&h=300&fit=crop',
        'title' => 'Mobile Banking App',
        'category' => 'UI/UX Design',
        'category_slug' => 'web'
    ],
    [
        'id' => 'lego-batman',
        'image' => 'https://images.unsplash.com/photo-1611933933936-79383453303c?w=400&h=300&fit=crop',
        'title' => 'Lego Batman',
        'category' => 'Product Photography',
        'category_slug' => 'portrait'
    ],
    [
        'id' => 'music-fest-poster',
        'image' => 'https://images.unsplash.com/photo-1586528116311-06924151d159?w=400&h=300&fit=crop',
        'title' => 'Music Fest Poster',
        'category' => 'Graphic Design',
        'category_slug' => 'branding'
    ],
];


// DATA UNTUK BAGIAN SERVICES
$services = [
    [
        'title' => 'UI/UX Design',
        'price' => 'Mulai dari Rp 1.500.000',
        'features' => ['Analisis Kebutuhan Pengguna', 'Wireframing & Prototyping', 'Desain Antarmuka (UI)', 'Pengujian Pengguna (UT)', '3x Revisi Desain']
    ],
    [
        'title' => 'Web Design',
        'price' => 'Mulai dari Rp 2.500.000',
        'features' => ['Desain Hingga 5 Halaman', 'Desain Responsif (Mobile-Friendly)', 'Integrasi Sistem Manajemen Konten', 'Optimasi Kecepatan Dasar', 'Konsultasi & Dukungan']
    ],
];


// DATA UNTUK HALAMAN DETAIL PROYEK
$projects = [
    'e-commerce-website' => [
        'title' => 'E-Commerce Website',
        'subtitle' => 'Sebuah studi kasus tentang desain dan pengembangan platform belanja online.',
        'overview' => 'Proyek ini bertujuan untuk merancang dan membangun platform e-commerce yang modern, responsif, dan mudah digunakan. Fokus utama adalah menciptakan pengalaman berbelanja yang mulus dari penemuan produk hingga proses checkout.',
        'gallery_images' => ['https://images.unsplash.com/photo-1556742111-a301076d9d18?w=800&fit=crop', 'https://images.unsplash.com/photo-1522199755839-a2bacb67c546?w=800&fit=crop'],
        'tech_tags' => ['HTML5', 'CSS3 (Grid & Flexbox)', 'JavaScript (ES6+)', 'Figma', 'Photoshop'],
        'challenges' => 'Tantangan utama adalah memastikan website tetap cepat dan ringan meskipun menampilkan banyak gambar produk berkualitas tinggi.',
        'results' => 'Peluncuran website ini berhasil meningkatkan konversi penjualan sebesar 25% dalam tiga bulan pertama.',
        'client' => 'Fashion Retail Inc.',
        'role' => 'Lead Web Designer, UI/UX',
        'timeline' => '8 Weeks',
        'status' => 'Completed'
    ],
    'mobile-banking-app' => [
        'title' => 'Mobile Banking App',
        'subtitle' => 'Desain antarmuka untuk aplikasi perbankan mobile yang aman dan intuitif.',
        'overview' => 'Proyek ini fokus pada perancangan ulang aplikasi mobile banking untuk meningkatkan kemudahan penggunaan dan keamanan. Prosesnya mencakup riset mendalam terhadap perilaku pengguna, pembuatan wireframe, prototipe interaktif, dan pengujian usabilitas secara ekstensif.',
        'gallery_images' => ['https://images.unsplash.com/photo-1580674288454-726a7a0b73b8?w=800&fit=crop', 'https://images.unsplash.com/photo-1612423284934-2850a4ea6b0f?w=800&fit=crop'],
        'tech_tags' => ['Figma', 'Adobe XD', 'User Research', 'Prototyping'],
        'challenges' => 'Tantangan terbesar adalah menyeimbangkan antara fitur yang lengkap dengan antarmuka yang sederhana.',
        'results' => 'Aplikasi hasil redesign mendapatkan rating 4.8 di App Store, naik dari 3.5. Tingkat adopsi fitur baru meningkat sebesar 60%.',
        'client' => 'Bank Digital Sejahtera',
        'role' => 'UI/UX Designer',
        'timeline' => '6 Weeks',
        'status' => 'Completed'
    ],
    'corporate-branding' => [
        'title' => 'Corporate Branding',
        'subtitle' => 'Membangun identitas visual baru untuk perusahaan teknologi.',
        'overview' => 'Studi kasus lengkap mengenai proses rebranding perusahaan teknologi, mulai dari pembuatan logo, palet warna, tipografi, hingga implementasi pada berbagai media promosi baik digital maupun cetak.',
        'gallery_images' => ['https://images.unsplash.com/photo-1557426272-fc759fdf7a8d?w=800&fit=crop'],
        'tech_tags' => ['Adobe Illustrator', 'Adobe Photoshop', 'Branding Strategy'],
        'challenges' => 'Tantangan utama adalah menciptakan identitas yang modern tanpa menghilangkan nilai-nilai inti yang sudah dikenal oleh pelanggan lama.',
        'results' => 'Identitas brand yang baru diterima dengan baik oleh pasar dan membantu meningkatkan citra perusahaan sebagai entitas yang inovatif dan relevan.',
        'client' => 'Tech Solutions Ltd.',
        'role' => 'Brand Strategist & Designer',
        'timeline' => '4 Weeks',
        'status' => 'Completed'
    ],
    'food-photography' => [
        'title' => 'Food Photography: Pizza',
        'subtitle' => 'Menangkap kelezatan pizza melalui lensa kamera.',
        'overview' => 'Proyek fotografi yang berfokus pada styling dan pengambilan gambar makanan untuk menu restoran dan media sosial. Tujuannya adalah membuat gambar yang menggugah selera.',
        'gallery_images' => ['https://images.unsplash.com/photo-1513104890138-7c749659a591?w=800&fit=crop'],
        'tech_tags' => ['Canon EOS R', 'Food Styling', 'Adobe Lightroom'],
        'challenges' => 'Mendapatkan pencahayaan yang pas agar keju terlihat meleleh dan topping tampak segar.',
        'results' => 'Foto-foto digunakan dalam kampanye media sosial yang meningkatkan pesanan take-away sebesar 30%.',
        'client' => 'Pizza Bella',
        'role' => 'Food Photographer',
        'timeline' => '1 Day',
        'status' => 'Completed'
    ],
    'lego-batman' => [
        'title' => 'Lego Batmobile',
        'subtitle' => 'Fotografi produk untuk mainan koleksi.',
        'overview' => 'Sesi foto produk untuk mainan Lego Batmobile, dengan fokus pada detail dan menciptakan suasana yang dramatis dengan pencahayaan studio.',
        'gallery_images' => ['https://images.unsplash.com/photo-1611933933936-79383453303c?w=800&fit=crop'],
        'tech_tags' => ['Product Photography', 'Studio Lighting', 'Focus Stacking'],
        'challenges' => 'Mengatasi pantulan cahaya pada permukaan plastik hitam dan menonjolkan setiap detail kecil dari mainan.',
        'results' => 'Gambar digunakan untuk katalog online dan materi promosi, mendapatkan pujian dari komunitas kolektor.',
        'client' => 'Hobby Store',
        'role' => 'Product Photographer',
        'timeline' => '2 Days',
        'status' => 'Completed'
    ],
    'music-fest-poster' => [
        'title' => 'Music Fest Poster',
        'subtitle' => 'Desain poster untuk acara festival musik tahunan.',
        'overview' => 'Desain poster promosi yang energik dan menarik untuk festival musik "Summer Vibes". Konsepnya adalah menggabungkan elemen retro dengan sentuhan modern.',
        'gallery_images' => ['https://images.unsplash.com/photo-1586528116311-06924151d159?w=800&fit=crop'],
        'tech_tags' => ['Graphic Design', 'Typography', 'Adobe Illustrator'],
        'challenges' => 'Memasukkan banyak informasi (nama artis, tanggal, sponsor) tanpa membuat poster terlihat berantakan.',
        'results' => 'Poster menjadi ikon acara dan desainnya diadopsi untuk semua materi promosi lainnya, menciptakan identitas visual yang kuat.',
        'client' => 'Summer Vibes Festival',
        'role' => 'Graphic Designer',
        'timeline' => '1 Week',
        'status' => 'Completed'
    ],
];

// =======================================================
// DATA UNTUK HALAMAN ARTIKEL (BARU)
// =======================================================
$articles = [
    'studi-kasus-ecommerce' => [
        'slug' => 'studi-kasus-ecommerce',
        'title' => 'Studi Kasus: Membangun Website E-Commerce dari Nol',
        'category' => 'Studi Kasus',
        'image' => 'https://images.unsplash.com/photo-1541462608143-67571c6738dd?w=400&h=300&fit=crop',
        'date' => '28 Juni 2025',
        'excerpt' => 'Perjalanan lengkap di balik layar proyek E-Commerce, mulai dari riset awal, desain UI/UX, hingga peluncuran...',
        'full_content' => '
            <p>Membangun sebuah platform e-commerce bukanlah tugas yang mudah. Diperlukan perencanaan matang mulai dari tahap riset hingga eksekusi. Dalam studi kasus ini, kita akan membedah setiap langkah yang diambil dalam pengembangan proyek "Fashion Retail Inc.".</p>
            <h3>Tahap 1: Riset dan Perencanaan</h3>
            <p>Langkah pertama adalah memahami target audiens dan kompetitor. Kami melakukan survei dan wawancara untuk mengidentifikasi apa yang paling diinginkan pengguna dari sebuah situs belanja online. Hasilnya menunjukkan bahwa kemudahan navigasi dan proses checkout yang cepat adalah prioritas utama.</p>
            <h3>Tahap 2: Desain UI/UX</h3>
            <p>Berdasarkan hasil riset, tim desain membuat wireframe dan prototipe interaktif menggunakan Figma. Kami fokus pada tata letak yang bersih, gambar produk yang besar, dan alur pengguna yang intuitif. Beberapa versi desain diuji menggunakan A/B testing untuk menentukan tata letak yang paling efektif.</p>
            <p>Desain final mengedepankan visual yang menarik dengan tetap mempertahankan fungsionalitas yang optimal di berbagai perangkat, mulai dari desktop hingga mobile.</p>
        '
    ],
    '5-prinsip-ui-design' => [
        'slug' => '5-prinsip-ui-design',
        'title' => '5 Prinsip Utama UI Design yang Wajib Diketahui Pemula',
        'category' => 'UI/UX',
        'image' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f?w=400&h=300&fit=crop',
        'date' => '25 Juni 2025',
        'excerpt' => 'Pelajari lima prinsip fundamental dalam desain antarmuka yang akan meningkatkan kualitas proyek Anda secara drastis...',
        'full_content' => '
            <p>Desain antarmuka (UI) yang baik lebih dari sekadar estetika. Ini tentang menciptakan pengalaman yang fungsional dan menyenangkan bagi pengguna. Berikut adalah lima prinsip dasar yang harus dipegang oleh setiap desainer pemula.</p>
            <ol>
                <li><strong>Konsistensi:</strong> Pastikan elemen desain seperti tombol, ikon, dan tipografi konsisten di seluruh aplikasi atau situs web Anda.</li>
                <li><strong>Hierarki Visual:</strong> Atur elemen berdasarkan tingkat kepentingannya. Gunakan ukuran, warna, dan spasi untuk memandu mata pengguna ke bagian yang paling penting terlebih dahulu.</li>
                <li><strong>Feedback (Umpan Balik):</strong> Beri tahu pengguna apa yang terjadi. Misalnya, saat tombol diklik, ubah warnanya atau tampilkan animasi loading.</li>
                <li><strong>Kesederhanaan:</strong> Jangan membuat pengguna berpikir terlalu keras. Buang elemen yang tidak perlu dan fokus pada fungsi inti.</li>
                <li><strong>Fleksibilitas dan Efisiensi:</strong> Sediakan jalan pintas untuk pengguna ahli, namun tetap mudah digunakan bagi pemula.</li>
            </ol>
        '
    ],
    'proses-corporate-branding' => [
        'slug' => 'proses-corporate-branding',
        'title' => 'Proses di Balik Proyek Corporate Branding',
        'category' => 'Branding',
        'image' => 'https://images.unsplash.com/photo-1557426272-fc759fdf7a8d?w=400&h=300&fit=crop',
        'date' => '22 Juni 2025',
        'excerpt' => 'Bagaimana sebuah identitas brand diciptakan? Lihat proses brainstorming, pembuatan logo, dan panduan gaya...',
        'full_content' => '<p>Konten lengkap untuk artikel Proses Corporate Branding akan ditampilkan di sini. Ini menjelaskan proses dari awal hingga akhir.</p>'
    ],
    'teknik-transisi-video' => [
        'slug' => 'teknik-transisi-video',
        'title' => 'Teknik Transisi Cepat untuk Video yang Lebih Dinamis',
        'category' => 'Video Editing',
        'image' => 'https://images.unsplash.com/photo-1574717547378-6169b5981351?w=400&h=300&fit=crop',
        'date' => '18 Juni 2025',
        'excerpt' => 'Ubah video Anda dari biasa menjadi luar biasa dengan beberapa teknik transisi sederhana namun efektif di Capcut & Alight Motion...',
        'full_content' => '<p>Konten lengkap untuk artikel Teknik Transisi Video akan ditampilkan di sini. Ini berisi tutorial langkah demi langkah.</p>'
    ],
];