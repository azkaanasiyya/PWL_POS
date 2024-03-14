# JOBSHEET 4

## Azka Anasiyya Haris

## 2241720157

## 2F - 06

### Praktikum A

1. Menambahkan $fillable pada 'UserModel'

<img src = img/JS4_1.png>
Menampilkan data yang baru diinputkan dan data akan tersimpan pada database.
2. Menghapus 'password' dari $fillable

<img src = img/JS4_2.png>
Menampilkan pesan error dikarenakan input data baru memiliki value password sedangkan pada file UserModel tidak memiliki variabel untuk value password.

### Praktikum B

#### Praktikum 2.1 - Retrieving Single Models

1. `find(1)`

<img src = img/JS4_3.png>
Menampilkan data dari tabel `m_user` dengan `user_id` = 1.

2. `where('level_id', 1)->first()`

<img src = img/JS4_4.png>
Menampilkan data dari tabel `m_user` dengan `level_id` = 1.

3. `firstWhere('level_id, 1)`

<img src = img/JS4_5.png>
Menampilkan data dari tabel `m_user` dengan `level_id` = 1.

4. `findOr(1, ['username', 'nama'], function(){})`

<img src = img/JS4_6.png>
Menampilkan data dari tabel `m_user` dengan `user_id` = 1 dan yang ditampilkan hanya username dan nama saja.

5. `findOr(20, ['username', 'nama'], function(){})`

<img src = img/JS4_7.png>
Menampilkan data dari tabel `m_user` dengan `user_id` = 20, akan tetapi tidak ditemukan maka yang ditampilkan adalah `404 | NOT FOUND`.

#### Praktikum 2.2 - Not Found Exceptions

1. `findOrFail(1)`

<img src = img/JS4_8.png>
Menampilkan data dari tabel `m_user` dengan `user_id` = 1, apabila data ditemukan maka akan ditampilkan di browser sedangkan jika tidak ditemukan maka akan menampilkan `404 | NOT FOUND`.

2. `where('username', 'manager9')->firstOrFail()`

<img src = img/JS4_9.png>
Menampilkan `404 | NOT FOUND` dikarenakan data `username = manager9` tidak ditemukan.

#### Praktikum 2.3 - Retrieving Aggregates

1. `where('level_id', 2)->count()`

<img src = img/JS4_10.png>
Menampilkan jumlah pengguna yang memiliki `level_id` = 2 dalam tabel yang sesuai.

2. Menampilkan Jumlah Pengguna = 2

<img src = img/JS4_11.png>
Menampilkan Jumlah Pengguna = 2, dengan kode program :
<img src = img/JS4_12.png>
<img src = img/JS4_13.png>

#### Praktikum 2.4 - Retrieving or Creating Models

1. ```
    firstOrCreate([
    'username' => 'manager',
    'nama' => 'Manager'
    ])
    ```
<img src = img/JS4_14.png>
Menampilkan data dengan `username` = `manager` dan `nama` = `Manager` dari tabel `m_user`, jika data ditemukan maka data akan ditampilkan seperti diatas, namun jika data tidak ditemukan maka akan membuat data baru (create) ke dalam database lalu akan ditampilkan pada browser.

2. ```
    firstOrCreate([
    'username' => 'manager22',
    'nama' => 'Manager Dua Dua',
    'password' => Hash::make('12345'),
    'level_id' => 2
    ])
    ```
<img src = img/JS4_15.png>
Dikarenakan data yang tidak ditemukan maka akan membuat (create) data pada database terlebih dahulu.

<img src = img/JS4_16.png>
Lalu data akan ditampilkan pada browser.

3. ```
    firstOrNew([
    'username' => 'manager',
    'nama' => 'Manager'
    ])
    ```
<img src = img/JS4_17.png>
Menampilkan data dengan `username` = `manager` dan `nama` = `Manager` dari tabel `m_user`, jika data ditemukan maka akan ditampilkan seperti diatas, namun jika data tidak ditemukan maka data akan disiapkan untuk di insert kan ke dalam database. 

4. ```
    firstOrNew([
    'username' => 'manager33',
    'nama' => 'Manager Tiga Tiga',
    'password' => Hash::make('12345'),
    'level_id' => 2
    ])
    ```
<img src = img/JS4_18.png>
Dikarenakan data yang dicari tidak ditemukan/tidak ada dalam database.

<img src = img/JS4_19.png>
Maka data tetap ditampilkan tetapi data belum masuk dalam database.

5. ```
    firstOrNew([
    'username' => 'manager33',
    'nama' => 'Manager Tiga Tiga',
    'password' => Hash::make('12345'),
    'level_id' => 2
    ]);
    $user->save();
    ```
<img src = img/JS4_20.png>
Dikarenakan data yang dicari tidak ditemukan maka dengan tambahan kode program `$user->save()` maka data akan diinsertkan pada database seperti gambar diatas.

<img src = img/JS4_21.png>
Lalu data akan ditampilkan.

#### Praktikum 2.5 - Attribute Changes

1. `isDirty()`

<img src = img/JS4_22.png>
`isDirty()` digunakan untuk memeriksa apakah suatu objek atau data telah mengalami perubahan sejak terakhir kali diproses atau dimodifikasi. Jika terdapat perubahan maka akan mengembalikan `true` dan `false` sebaliknya. Sedangkan `isClean()` adalah kebalikan dari `isDirty()` yang mengembalikan `true` jika tidak ada perubahan sejak terakhir kali diproses atau dimodifikasi.

<img src = img/JS4_23.png>
Dikarenakan terdapat metode `save()` maka data baru tersebut akan disimpan dalam database.

2. `wasChanged()`

<img src = img/JS4_24.png>
Kode ini digunakan untuk memeriksa apakah atribut tertentu telah diubah sejak objek model dibuat atau disimpan terakhir kali. Jika ada perubahan pada atribut yang diberikan, metode ini akan mengembalikan true, dan false sebaliknya.

<img src = img/JS4_25.png>
Dikarenakan terdapat metode `save()` maka data baru tersebut akan disimpan dalam database.

#### Praktikum 2.6 - CRUD

1. Menampilkan data user

<img src = img/JS4_26.png>
Menampilkan data yang ada pada tabel `m_user`

2. Membuat form `+ Tambah User`

<img src = img/JS4_27.png>
Setelah klik `+ Tambah User` maka akan diarahkan pada halaman tersebut

3. Menambahkan data dan menyimpan dalam Database

<img src = img/JS4_28.png>
Isi data yang ingin ditambahkan dalam form tersebut lalu klik tombol `Simpan`.

<img src = img/JS4_29.png>
Maka data akan ditampilkan pada browser.

<img src = img/JS4_30.png>
Dan data telah tersimpan dalam database.

4. Membuat form `Ubah`

<img src = img/JS4_31.png>
Klik `Ubah` pada data yang ingin dirubah lalu akan menampilkan seperti pada gambar diatas

5. Mengubah data

<img src = img/JS4_32.png>
Mengisi data baru dan klik `Ubah`

<img src = img/JS4_33.png>
Maka data akan ditampilkan pada browser.

<img src = img/JS4_34.png>
Data juga akan masuk pada database.

6. Menghapus data dengan `Hapus`

<img src = img/JS4_35.png>
Tampilan data sebelum dihapus pada browser.

<img src = img/JS4_36.png>
Setelah klik `Hapus`.

<img src = img/JS4_37.png>
Database sebelum data terhapus.

<img src = img/JS4_38.png>
Database setelah data terhapus.

#### Praktikum 2.7 - Relationship

1. Membuat `LevelModel`

LevelModel adalah model yang akan dihubungkan dengan relasi dari model `UserModel`. Metode ini mengembalikan hasil dari fungsi `belongsTo()`, yang menunjukkan bahwa setiap objek pengguna atau UserModel "mengikuti" (belongs to) atau mempunyai `hasMany` hubungan satu objek tingkat atau LevelModel yang diberi nama `level` sebagai nama relasinya.

<img src = img/JS4_39.png>

Maka hasilnya sebagai berikut.

<img src = img/JS4_40.png>

Maka akan terjadi error, karena dalam `LevelModel` tidak didefinisikan akan menampilkan tabel apa, sehingga dalam `levelModel` sebaiknya didefinisikan dahulu.

<img src = img/JS4_41.png>

Maka hasilnya sebagai berikut.

<img src = img/JS4_42.png>


