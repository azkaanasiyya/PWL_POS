# JOBSHEET 6

## Azka Anasiyya Haris

## 2241720157

## 2F - 06

### Praktikum 1 - Template Form

1. Penggunaan template AdminLTE Bootstrap Admin Dashboard Template

<img src = img/JS6_1.png>
Penggunaan template dilakukan pada project PWL_2024. Berikut link projectnya:

 https://github.com/azkaanasiyya/PWL_2024.git 

 2. Membuat form General Elements pada dashboard

<img src = img/JS6_2.png>
Form akan ditampilkan pada halaman dashboard seperti pada gambar di atas.

### Praktikum 2 - Validasi Pada Server

1. Tulis perbedaan penggunaan validate dengan validateWithBag!

validate:
- `validate()` digunakan untuk melakukan validasi pada data input. Metode ini seringkali digunakan pada request langsung, seperti pada controller atau form request.
- Hasil validasi bisanya diperiksa menggunakan conditional statement (biasanya `if`) dan dapat menangani respons yang sesuai jika validasi gagal.

validateWithBag:
- `validateWithBag()` digunakan untuk melakukan validasi dan menambahkan pesan kesalahan validasi ke dalam "error bag". Biasanya digunakan ketika ingin menangani pesan kesalahan validasi secara manual.
- Dapat berguna ketika perlu mengakses pesan kesalahan validasi secara terperinci atau memproses pesan kesalahan secara kustom.

Perbedaan utama antara keduanya adalah bahwa `validate()` biasanya digunakan untuk validasi langsung dengan respons yang dihasilkan secara otomatis, sementara `validateWithBag()` memberikan kontrol lebih besar terhadap pesan kesalahan validasi yang dihasilkan dan cara menangani responsnya.

2. Aturan `bail`

<img src = img/JS6_3.png>
Saat menginput data melebihi batas maksimal 

<img src = img/JS6_4.png>
Maka akan muncul pesan kesalahan seperti pada gambar di atas.

3. `$errors->any()`

<img src = img/JS6_5.png>
Jika create data tanpa menginputkan data

<img src = img/JS6_6.png>
Maka akan muncul pesan kesalahan seperti pada gambar di atas.

4. `@error('kategori_kode')`

<img src = img/JS6_7.png>
Jika create data tanpa menginputkan data maka akan muncul pesan kesalahan seperti pada gambar di atas.

<img src = img/JS6_8.png>
Jika menginputkan data melebihi batas maksimal

<img src = img/JS6_9.png>
Maka akan muncul pesan kesalahan seperti pada gambar di atas.

### Praktikum 3 - Form Request Validation

1. Validasi dengan `StorePostRequest`

<img src = img/JS6_10.png>
Jika create data tanpa menginputkan data 

<img src = img/JS6_11.png>
Maka akan muncul pesan kesalahan seperti pada gambar di atas.

### Praktikum 4 - CRUD

1. Tampilan `/m_user`

<img src = img/JS6_12.png>

2. Input data

- Form input data

<img src = img/JS6_13.png>

- Data berhasil diinputkan

<img src = img/JS6_14.png>

- Baris data baru dalam tabel

<img src = img/JS6_15.png>

3. Show data

<img src = img/JS6_16.png>

4. Edit data

- Form edit data

<img src = img/JS6_17.png>

- Edit data

<img src = img/JS6_18.png>

- Data berhasil di edit

<img src = img/JS6_19.png>

- Baris data yang telah di edit

<img src = img/JS6_20.png>

4. Hapus data

<img src = img/JS6_21.png>

### Tugas Praktikum 

1. Coba tampilkan `level_id` pada halaman web tersebut dimana field ini merupakan foreign key

<img src = img/JS6_22.png>

`level_id` berhasil ditampilkan.

2. Modifikasi dengan tema atau template kesukaan Anda

Sudah menggunakan template kesukaan saya.

3. Apa fungsi `request->validate`, $error dan alert yang ada pada halaman CRUD tersebut

- Fungsi `request->validate` digunakan untuk melakukan validasi data yang dikirim melalui form. Digunakan dalam controller untuk menvalidasi data yang diterima dari request sebelum data tersebut disimpan ke dalam database. Jika validasi gagal, maka secara otomatis akan mengarah kembali ke halaman sebelumnya dengan pesan kesalahan yang sesuai.

- Fungsi `$error` digunakan untuk menampung pesan-pesan kesalahan yang muncul saat validasi gagal.

- Fungsi `alert` digunakan untuk memberikan pesan pemberitahuan kepada user. Dalam konteks halaman CRUD tersebut, alert digunakan untuk memberikan pesan pemberitahuan ketika data berhasil ditambahkan, diupdate, dan dihapus.



