-- =========================================================
-- Isi halaman profil sekolah (tabel posts, jenis 'Pages')
--
-- Cara pakai: phpMyAdmin -> pilih database -> tab "SQL" (atau "Import")
-- -> tempel / pilih file ini -> "Go".
--
-- Aman dijalankan berulang kali: setiap halaman hanya diperbarui jika
-- isinya masih teks contoh bawaan (kosong, hanya judul, "...dst.", atau
-- "... melalui menu admin Posts"). Halaman yang sudah diisi admin lewat
-- menu Posts tidak akan tertimpa. Butuh MySQL 8 / MariaDB 10.0.5 ke atas.
--
-- Sumber data identitas (SK Sekolah): Data Pokok Pendidikan (Dapodik)
-- Kemendikdasmen untuk NPSN 20276384. Periksa kembali nomor dan tanggal
-- akreditasi terbaru sebelum diunggah ke hosting.
-- =========================================================

-- ---------------------------------------------------------
-- Selayang Pandang
-- ---------------------------------------------------------
UPDATE `posts` SET `body` = '<p><strong>SMK Kosgoro Kota Bogor</strong> adalah Sekolah Menengah Kejuruan swasta di bawah naungan <strong>Yayasan Dharma Setia Kosgoro</strong>. Sekolah ini berdiri berdasarkan SK Pendirian Nomor 421.5/109-DISDIK 2008 tertanggal 17 Maret 2008 dan berlokasi di Jl. Raya Pajajaran No. 217A, Kelurahan Bantarjati, Kecamatan Bogor Utara, Kota Bogor.</p>
<p>Dengan semboyan <em>&ldquo;Sekolah Berwawasan Kebangsaan&rdquo;</em> dan semangat <strong>&ldquo;SIAP BISA!&rdquo;</strong>, SMK Kosgoro Kota Bogor berkomitmen mencetak lulusan yang kompeten di bidangnya, berakhlak mulia, dan memiliki rasa cinta tanah air yang kuat.</p>
<h3>Program Keahlian</h3>
<p>Saat ini SMK Kosgoro Kota Bogor membuka lima program keahlian yang disesuaikan dengan kebutuhan dunia usaha dan dunia industri:</p>
<ul>
<li><strong>Teknik Komputer dan Jaringan (TKJ)</strong>: jaringan komputer, perakitan dan perawatan perangkat, serta administrasi sistem.</li>
<li><strong>Rekayasa Perangkat Lunak (RPL)</strong>: pemrograman serta pengembangan aplikasi web dan mobile.</li>
<li><strong>Desain Komunikasi Visual (DKV)</strong>: desain grafis, multimedia, dan komunikasi visual.</li>
<li><strong>Produksi Siaran Program Televisi (PSPT)</strong>: produksi video, penyiaran, dan pertelevisian.</li>
<li><strong>Kecantikan Kulit dan Rambut (KKR)</strong>: tata kecantikan serta perawatan kulit dan rambut profesional.</li>
</ul>
<h3>Pembelajaran yang Dekat dengan Dunia Kerja</h3>
<p>Kegiatan belajar dirancang agar siswa tidak hanya memahami teori, tetapi juga terbiasa praktik. Melalui praktik kerja lapangan, kunjungan industri, dan kerja sama dengan mitra dunia usaha dan dunia industri, siswa mengenal lingkungan kerja yang sesungguhnya sejak di bangku sekolah.</p>
<p>Sejak tahun 2021, <strong>Bursa Kerja Khusus (BKK)</strong> SMK Kosgoro Kota Bogor aktif menjembatani lulusan dengan perusahaan mitra, mulai dari informasi lowongan kerja, pembekalan, hingga penyaluran tenaga kerja.</p>
<h3>Pengembangan Karakter dan Bakat</h3>
<p>Di luar jam pelajaran, siswa dapat mengembangkan minat dan bakat melalui kegiatan ekstrakurikuler, peringatan hari besar nasional, serta berbagai kegiatan kesiswaan lainnya. Seluruh kegiatan diarahkan untuk membentuk peserta didik yang mandiri, disiplin, kreatif, dan bertanggung jawab.</p>
<p>Kegiatan belajar mengajar berlangsung setiap hari sekolah pukul 07.30 &ndash; 15.00 WIB. Kami mengundang orang tua dan calon peserta didik untuk mengenal kami lebih dekat, baik melalui website ini maupun dengan berkunjung langsung ke sekolah.</p>',
`updated_at` = NOW()
WHERE `slug` = 'selayang-pandang' AND `jenis` = 'Pages' AND (`body` LIKE '%melalui menu admin Posts%' OR `body` LIKE '%...dst.%' OR TRIM(REGEXP_REPLACE(`body`, '<[^>]*>', '')) IN ('', `title`));

-- ---------------------------------------------------------
-- Sambutan Kepala Sekolah
-- (draf, mohon ditinjau dan disetujui Kepala Sekolah sebelum dipublikasikan)
-- ---------------------------------------------------------
UPDATE `posts` SET `body` = '<p>Puji syukur kita panjatkan ke hadirat Allah SWT, Tuhan Yang Maha Esa, atas limpahan rahmat dan karunia-Nya sehingga SMK Kosgoro Kota Bogor dapat terus berkarya dalam dunia pendidikan kejuruan. Selamat datang di website resmi SMK Kosgoro Kota Bogor.</p>
<p>Website ini kami hadirkan sebagai sarana informasi dan komunikasi bagi seluruh warga sekolah, orang tua, alumni, mitra industri, serta masyarakat luas. Melalui website ini, kami ingin berbagi kabar terbaru, kegiatan, prestasi, dan berbagai informasi penting mengenai sekolah, termasuk Penerimaan Peserta Didik Baru (PPDB).</p>
<p>Sebagai sekolah yang berada di bawah naungan Yayasan Dharma Setia Kosgoro, kami berkomitmen menyelenggarakan pendidikan kejuruan yang bermutu, berwawasan kebangsaan, dan selaras dengan kebutuhan dunia usaha dan dunia industri. Perkembangan teknologi yang begitu cepat menuntut lulusan SMK tidak hanya terampil, tetapi juga mampu beradaptasi, berpikir kreatif, dan memiliki karakter yang kuat.</p>
<p>Oleh karena itu, kami terus berupaya meningkatkan kualitas pembelajaran, kompetensi tenaga pendidik, serta kerja sama dengan mitra industri, agar setiap peserta didik siap bekerja, siap melanjutkan pendidikan, dan siap berwirausaha. Semangat inilah yang kami rangkum dalam satu kalimat: <strong>&ldquo;SMK Kosgoro Kota Bogor SIAP BISA!&rdquo;</strong></p>
<p>Kami mengucapkan terima kasih kepada seluruh guru, tenaga kependidikan, orang tua, komite sekolah, dan mitra industri atas dukungan dan kerja samanya selama ini. Semoga website ini bermanfaat dan dapat menjadi jembatan komunikasi yang baik antara sekolah dan masyarakat.</p>
<p>Wassalamu&rsquo;alaikum Wr. Wb.</p>',
`updated_at` = NOW()
WHERE `slug` = 'sambutan-kepala-sekolah' AND `jenis` = 'Pages' AND (`body` LIKE '%melalui menu admin Posts%' OR `body` LIKE '%...dst.%' OR TRIM(REGEXP_REPLACE(`body`, '<[^>]*>', '')) IN ('', `title`));

-- ---------------------------------------------------------
-- SK Sekolah (data dari Dapodik)
-- ---------------------------------------------------------
UPDATE `posts` SET `body` = '<p>SMK Kosgoro Kota Bogor merupakan satuan pendidikan resmi yang terdaftar dalam Data Pokok Pendidikan (Dapodik) Kementerian Pendidikan Dasar dan Menengah. Berikut data legalitas sekolah:</p>
<table>
<tbody>
<tr><th>Nama Sekolah</th><td>SMKS Kosgoro (SMK Kosgoro Kota Bogor)</td></tr>
<tr><th>NPSN</th><td>20276384</td></tr>
<tr><th>Status</th><td>Swasta</td></tr>
<tr><th>Bentuk Pendidikan</th><td>Sekolah Menengah Kejuruan (SMK)</td></tr>
<tr><th>Penyelenggara</th><td>Yayasan Dharma Setia Kosgoro</td></tr>
<tr><th>SK Pendirian</th><td>Nomor 421.5/109-DISDIK 2008, tanggal 17 Maret 2008</td></tr>
<tr><th>Akreditasi</th><td>A, berdasarkan SK BAN-S/M Nomor 1214/BAN-SM/SK/2018 tanggal 31 Desember 2018</td></tr>
<tr><th>Alamat</th><td>Jl. Raya Pajajaran No. 217A, Kel. Bantarjati, Kec. Bogor Utara, Kota Bogor, Jawa Barat</td></tr>
</tbody>
</table>
<p>Data di atas dapat dicek langsung melalui laman Data Pokok Pendidikan (Dapodik) dan Referensi Data Kemendikdasmen dengan memasukkan NPSN <strong>20276384</strong>.</p>',
`updated_at` = NOW()
WHERE `slug` = 'sk-sekolah' AND `jenis` = 'Pages' AND (`body` LIKE '%melalui menu admin Posts%' OR `body` LIKE '%...dst.%' OR TRIM(REGEXP_REPLACE(`body`, '<[^>]*>', '')) IN ('', `title`));

-- ---------------------------------------------------------
-- Prestasi
-- ---------------------------------------------------------
UPDATE `posts` SET `body` = '<p>SMK Kosgoro Kota Bogor percaya bahwa setiap peserta didik memiliki potensi untuk berprestasi. Karena itu, sekolah terus mendorong dan membina siswa agar berani berkompetisi, baik di bidang akademik, kejuruan, maupun nonakademik.</p>
<h3>Bidang Pembinaan Prestasi</h3>
<ul>
<li><strong>Akademik</strong>: olimpiade, cerdas cermat, dan lomba mata pelajaran.</li>
<li><strong>Kejuruan</strong>: lomba kompetensi siswa sesuai program keahlian (TKJ, RPL, DKV, PSPT, dan KKR) serta pameran karya.</li>
<li><strong>Nonakademik</strong>: olahraga, seni, kepramukaan, dan kegiatan ekstrakurikuler lainnya.</li>
</ul>
<h3>Apresiasi Peserta Didik Berprestasi</h3>
<p>Setiap semester, sekolah memberikan apresiasi kepada peserta didik yang meraih prestasi, sebagai bentuk penghargaan sekaligus motivasi bagi seluruh siswa untuk terus mengembangkan diri.</p>
<p>Kabar terbaru mengenai prestasi siswa dan sekolah dapat diikuti melalui menu <a href="/kategori/prestasi">Berita &raquo; Prestasi</a>.</p>',
`updated_at` = NOW()
WHERE `slug` = 'prestasi' AND `jenis` = 'Pages' AND (`body` LIKE '%melalui menu admin Posts%' OR `body` LIKE '%...dst.%' OR TRIM(REGEXP_REPLACE(`body`, '<[^>]*>', '')) IN ('', `title`));

-- ---------------------------------------------------------
-- Struktur Organisasi (teks pengantar di bawah bagan)
-- ---------------------------------------------------------
UPDATE `posts` SET `body` = '<p>Struktur organisasi SMK Kosgoro Kota Bogor disusun agar pengelolaan sekolah berjalan efektif, terarah, dan saling mendukung. Kepala Sekolah memimpin seluruh kegiatan sekolah dengan dibantu oleh para Wakil Kepala Sekolah bidang Kurikulum, Kesiswaan, serta Administrasi dan Sarana Prasarana.</p>
<p>Di tingkat program, Kepala Program Keahlian bertanggung jawab atas mutu pembelajaran di setiap jurusan, sedangkan bagian Hubungan Industri dan Masyarakat (Hubinmas) menjalin kerja sama dengan dunia usaha dan dunia industri, termasuk melalui Bursa Kerja Khusus (BKK).</p>',
`updated_at` = NOW()
WHERE `slug` = 'struktur-organisasi' AND `jenis` = 'Pages' AND (`body` LIKE '%melalui menu admin Posts%' OR `body` LIKE '%...dst.%' OR TRIM(REGEXP_REPLACE(`body`, '<[^>]*>', '')) IN ('', `title`));

-- ---------------------------------------------------------
-- Visi dan Misi (teks pengantar; isi visi & misi diambil dari menu Konfigurasi)
-- ---------------------------------------------------------
UPDATE `posts` SET `body` = '<p>Visi dan misi SMK Kosgoro Kota Bogor menjadi arah dan pedoman seluruh warga sekolah dalam menyelenggarakan pendidikan kejuruan yang unggul, berwawasan kebangsaan, dan berlandaskan akhlak mulia, agar setiap lulusan siap bekerja, siap melanjutkan pendidikan, dan siap berwirausaha.</p>',
`updated_at` = NOW()
WHERE `slug` = 'visi-dan-misi' AND `jenis` = 'Pages' AND (`body` LIKE '%melalui menu admin Posts%' OR `body` LIKE '%...dst.%' OR TRIM(REGEXP_REPLACE(`body`, '<[^>]*>', '')) IN ('', `title`));
