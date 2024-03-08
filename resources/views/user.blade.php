<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data User</title>
</head>
<body>
    <h1>Data User</h1>
    <table border="1" cellpadding="2" cellspacing="0">
        <tr>
            {{-- <th>ID</th>
            <th>Username</th>
            <th>Nama</th>
            <th>ID Level Pengguna</th> --}}
            <td>Jumlah Pengguna</td>
        </tr>
            <tr>
                {{-- <td>{{$data->user_id}}</td>
                <td>{{$data->username}}</td>
                <td>{{$data->nama}}</td>
                <td>{{$data->level_id}}</td> --}}
                <td>{{$data}}</td>
            </tr>
    </table>
</body>
</html>