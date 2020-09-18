<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="row">
            <h2 style="margin-left: 12px; margin-top:5px;"> Laporan tabel makanan</h2>
            <div class="form-group text-left" style="margin-top:10px" >
            </div>
        </div>
        <table class="table table-hover" style="text-align:center;" border="1">
        <thead>
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Nama</th>
            <th scope="col">harga</th>
            <th scope="col">stok</th>
            <th scope="col">deskripsi</th>
           
            </tr>
        </thead>
        <tbody>
        @foreach ($makanan as $m)
            <tr>
            <th scope="row">{{ $m->id }}</th>
            <td>{{ $m->nama }}</td>
            <td>{{ $m->harga }}</td>
            <td>{{ $m->stok }}</td>
            <td>{{ $m->deskripsi }}</td>
            


            
            </tr>
        </tbody>
        @endforeach
        </table>
</body>
</html>