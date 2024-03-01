# JOBSHEET 3

## Azka Anasiyya Haris

## 2241720157

## 2F - 06

### Pertanyaan
1. Pada Praktikum 1 - Tahap 5, apakah fungsi dari APP_KEY pada file setting .env Laravel?
2. Pada Praktikum 1, bagaimana kita men-generate nilai untuk APP_KEY?
3. Pada Praktikum 2.1 - Tahap 1, secara default Laravel memiliki berapa file migrasi?
dan untuk apa saja file migrasi tersebut?
4. Secara default, file migrasi terdapat kode $table->timestamps();, apa tujuan/output
dari fungsi tersebut?
5. Pada File Migrasi, terdapat fungsi $table->id(); Tipe data apa yang dihasilkan dari
fungsi tersebut?
6. Apa bedanya hasil migrasi pada table m_level, antara menggunakan $table->id();
dengan menggunakan $table->id('level_id'); ?
7. Pada migration, Fungsi ->unique() digunakan untuk apa?
8. Pada Praktikum 2.2 - Tahap 2, kenapa kolom level_id pada tabel m_user
menggunakan $tabel->unsignedBigInteger('level_id'), sedangkan kolom level_id
pada tabel m_level menggunakan $tabel->id('level_id') ?
9. Pada Praktikum 3 - Tahap 6, apa tujuan dari Class Hash? dan apa maksud dari kode
program Hash::make('1234');?
10. Pada Praktikum 4 - Tahap 3/5/7, pada query builder terdapat tanda tanya (?), apa
kegunaan dari tanda tanya (?) tersebut?
11. Pada Praktikum 6 - Tahap 3, apa tujuan penulisan kode protected $table =
‘m_user’; dan protected $primaryKey = ‘user_id’; ?
12. Menurut kalian, lebih mudah menggunakan mana dalam melakukan operasi CRUD ke
database (DB Façade / Query Builder / Eloquent ORM) ? jelaskan

### Jawaban
1. Pada Praktikum 1 - Tahap 5, fungsi dari `APP_KEY` pada file setting `.env` Laravel adalah sebagai kunci enkripsi yang digunakan untuk mengamankan sesi pengguna, mengenkripsi data sensitif, serta menjaga keamanan aplikasi secara keseluruhan.
  
2. Pada Praktikum 1, nilai untuk `APP_KEY` dapat di-generate secara otomatis karena sudah tersedia file .env pada folder project.

3. Pada Praktikum 2.1 - Tahap 1, secara default Laravel memiliki 4 file migrasi. Empat file migrasi yang disebutkan memiliki fungsi sebagai berikut:

- `2014_10_12_000000_create_users_table.php`: File migrasi ini digunakan untuk membuat struktur tabel `users` yang umumnya digunakan untuk menyimpan informasi pengguna seperti nama, email, dan password.

- `2014_10_12_000000_create_password_reset_tokens_table.php`: File migrasi ini bertanggung jawab untuk membuat tabel `password_reset_tokens` yang digunakan untuk menyimpan token untuk proses reset password. Ketika pengguna meminta reset password, token akan dibuat dan dikirimkan ke email pengguna untuk verifikasi.

- `2014_10_12_000000_create_failed_jobs_table.php`: File migrasi ini membuat tabel `failed_jobs` yang digunakan oleh Laravel untuk menyimpan informasi tentang pekerjaan (jobs) yang gagal dieksekusi, misalnya pekerjaan yang dijadwalkan tetapi gagal karena beberapa alasan.

- `2014_10_12_000000_create_personal_access_tokens_table.php`: File migrasi ini menciptakan tabel `personal_access_tokens` yang digunakan untuk menyimpan token akses pribadi yang diberikan kepada pengguna untuk mengakses API atau sumber daya tertentu dalam aplikasi Laravel. Token ini biasanya digunakan untuk otentikasi pengguna dalam mengakses layanan tertentu di aplikasi.

4. Secara default, kode `$table->timestamps();` dalam file migrasi menghasilkan dua kolom tambahan dalam tabel, yaitu `created_at` dan `updated_at`, yang otomatis menyimpan waktu saat data dibuat dan diperbarui.

5. Fungsi `$table->id();` dalam file migrasi menghasilkan kolom dengan tipe data `bigIncrements`, yang merupakan jenis kolom auto-incrementing primary key dengan tipe data `BIGINT`.

6. Perbedaan antara menggunakan `$table->id();` dengan `$table->id('level_id');` pada hasil migrasi tabel `m_level` adalah penggunaan nama kolom primary key. Dalam kasus `$table->id('level_id');`, kolom primary key akan diberi nama `level_id`, sedangkan pada `$table->id();`, Laravel akan menggunakan konvensi default dengan nama kolom `id`.

7. Fungsi `->unique()` pada migration digunakan untuk menetapkan kolom dengan indeks unik, yang memastikan bahwa setiap nilai dalam kolom tersebut adalah unik(tidak ada yang sama) di dalam tabel.

8. Pada Praktikum 2.2 - Tahap 2, kolom `level_id` pada tabel `m_user` menggunakan `$tabel->unsignedBigInteger('level_id')` karena diasumsikan sebagai kunci asing (foreign key) yang mengacu pada kolom `id` di tabel `m_level`, sementara pada tabel `m_level` menggunakan `$tabel->id('level_id')` untuk mendefinisikan kolom primary key dengan nama `level_id`.

9. Tujuan dari Class Hash pada Praktikum 3 adalah untuk melakukan hashing pada data sensitif seperti password sehingga tidak tersimpan dalam format teks biasa. Kode program `Hash::make('12345');` digunakan untuk membuat hash dari string '12345' yang akan digunakan sebagai password, sehingga password tidak disimpan dalam bentuk teks biasa di dalam database.

10. Tanda tanya (?) pada query builder pada Praktikum 4 digunakan sebagai placeholder untuk nilai yang akan dimasukkan ke dalam query. Hal ini membantu dalam mencegah serangan SQL Injection dan memudahkan dalam menghindari kesalahan sintaksis.

11. Pada Praktikum 6 - Tahap 3, penulisan kode `protected $table = 'm_user';` digunakan untuk menentukan nama tabel yang akan digunakan oleh model, sedangkan `protected $primaryKey = 'user_id';` digunakan untuk menentukan nama kolom primary key yang akan digunakan oleh model.

12. Menurut saya lebih mudah menggunakan Query Builder saat melakukan CRUD karena lebih mudah dibaca dan dipahami karena Query Builder menggunakan sintaks SQL, lebih fleksibel, efisien, dan lebih mudah untuk dipelajari.
