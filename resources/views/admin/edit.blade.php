<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Edit</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>
    
    
<body id="page-top">
    <div id="wrapper">
        @include('admin.sidebar')
            <div id="content-wrapper" class="">
                @include('admin.topbar')
                
                <!-- konten -->
                <div class="container">
                    <div class="card mt-5">
                        <div class="card-header text-center">
                            <strong>Edit Data</strong> 
                        </div>
                        <div class="card-body">
                            <br/>
                            
                            <form method="post" action="/makann/update/{{ $makanan->id }}">
        
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
        
                                <div class="form-group">
                                    <label for="">Nama Makanan</label>
                                    @if($errors->has('nama'))
                                        <div class="text-danger">
                                            {{ $errors->first('nama')}}
                                        </div>
                                    @endif
                                    <input type="text" name="nama" class="form-control" value="{{ $makanan->nama }}">
                                </div>
        
                                <div class="form-group">
                                <label for="">Harga</label>
                                    @if($errors->has('harga'))
                                        <div class="text-danger">
                                            {{ $errors->first('harga')}}
                                        </div>
                                    @endif
                                    <input type="text" name="harga" class="form-control" value="{{ $makanan->harga }}">
                                </div>

                                <div class="form-group">
                                <label for="">Stok</label>
                                    @if($errors->has('stok'))
                                        <div class="text-danger">
                                            {{ $errors->first('stok')}}
                                        </div>
                                    @endif
                                    <input type="text" name="stok" class="form-control" value="{{ $makanan->stok}}">
                                </div>

                                
                                <div class="form-group">
                                <label for="">Deskripsi</label>
                                    @if($errors->has('deskripsi'))
                                        <div class="text-danger">
                                            {{ $errors->first('deskripsi')}}
                                        </div>
                                    @endif
                                    <textarea name="deskripsi" class="form-control">{{ $makanan->deskripsi }} </textarea>
                                </div>

                                <div class="form-group">
                                <label for="">gambar </label>
                                    @if($errors->has('gambar'))

                                <div class="text-danger">
                                            {{ $errors->first('gambar')}}
                                        </div>
                                    @endif
                                    <input type="text" name="gambar" class="form-control" value="{{ $makanan->gambar }}">
                                </div>

                                <div class="form-group">
                                <label for="">Stok Makanan </label>
                                    @if($errors->has('stok'))
                                        <div class="text-danger">
                                            {{ $errors->first('stok')}}
                                        </div>
                                    @endif
                                    <input type="text" name="stok" class="form-control" value="{{ $makanan->stok }}">
                                </div>


                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="Simpan">
                                    <a href="/makann" class="btn btn-primary">Kembali</a>
                                </div>
                            </form>
        
                        </div>
                    </div>
                </div>


  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('dash/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('dash/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('dash/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('dash/js/sb-admin-2.min.js') }}"></script>

  <!-- Page level plugins -->
  <script src="{{ asset('dash/vendor/chart.js/Chart.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('dash/js/demo/chart-area-demo.js')}}"></script>
  <script src="{{ asset('dash/js/demo/chart-pie-demo.js')}}"></script>

</body>

</html>