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
        $namaFile = 'web-'.time().".".$extfile;
        $path = $request->berkas->storeAs('uploads', $namaFile);
        echo "proses upload berhasil, data disimpan pada: $path";
        // echo $request->berkas->getClientOriginalName() . "lolos validasi";
    }
}
