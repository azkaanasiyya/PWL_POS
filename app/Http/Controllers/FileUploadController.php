<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function fileUpload()
    {
        return view('file-upload');
    }

    public function prosesFileUpload(Request $request)
    {
        // dump($request->berkas);
        // return "Pemrosesan file upload di sini";
        $request->validate([
            'berkas' => 'required|file|image|max:500'
        ]);
        $extfile = $request->berkas->getClientOriginalName();
        $namaFile = 'web-' . time() . "." . $extfile;

        $path = $request->berkas->storeAs('gambar', $namaFile);
        $path = str_replace("\\", "//", $path);
        echo "Variabel path berisi: $path <br>";

        $pathBaru = asset('gambar/' . $namaFile);
        echo "proses upload berhasil, data disimpan pada: $path";
        echo "<br>";
        echo "Tampilkan link:<a href='$pathBaru'>$pathBaru</a>";
        // echo $request->berkas->getClientOriginalName() . "lolos validasi";
    }

    public function fileUploadRename()
    {
        return view('file-upload-rename');
    }

    public function prosesFileUploadRename(Request $request)
    {
        $request->validate(['berkas' => 'required|file|image|max:500']);

        $extfile = $request->berkas->getClientOriginalExtension();

        $nama_file = $request->input('namaFile');
        $namaFile = 'web-' . time() . "." . $nama_file . "." . $extfile;

        $path = $request->berkas->move('gambar', $namaFile);
        $path = str_replace("\\", "//", $path);

        $pathBaru = asset('gambar/' . $namaFile);

        echo "Gambar berhasil diupload di <a href='$pathBaru'>$nama_file.$extfile</a>";
        echo "<br><br>";
        echo "<img src='$pathBaru' alt='Gambar' style='max-width: 300px; max-height: 300px;'>";
    }
}
