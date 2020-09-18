<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Makanan</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!--  -->

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    @include('admin.sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
       @include('admin.topbar')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

      

              <!-- Content Row -->
        <div class="row">
            <h2 style="margin-left: 12px; margin-top:5px;">tabel makanan</h2>
            <div class="form-group text-left" style="margin-top:10px">
              <a data-toggle="modal" data-target="#tambahmakan" class="btn btn-primary" style="color:white; margin-top:35px; margin-left:-170px"><i class="fa fa-plus-square" aria-hidden="true"></i></a>
             <a href="/pdfmakan"><button type="button" class="btn btn-dark" style="margin-top:35px;"><i class="fa fa-file" aria-hidden="true"></i></button></a> 
            </div>
        </div>
        <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Nama</th>
            <th scope="col">harga</th>
            <th scope="col">stok</th>
            <th scope="col">deskripsi</th>
            <th scope="col">Gambar</th>
            <th scope="col">Aksi</th>
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
            <td>@if (!empty($m->gambar))
              <img src="{{ asset('imagedb/' . $m->gambar)}}" alt="{{ $m->gambar }}" width="50px" height="50px">

              @else
               <img src="http://via.placeholder.com/50x50" alt=" {{ $m->name }}">
               @endif
            </td>


            <td><a href="/edit/{{ $m->id }}"><button class="btn btn-info"><i class="fa fa-magic" aria-hidden="true"></i></button></a></td>
               <td><a href="/deletemakan/{{ $m->id }}"><button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button></a></td>
            
            </tr>
        </tbody>
        @endforeach
        </table>

            <!-- Modal Tambah -->
            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambahmakan" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Tambah Makanan</h5>
                      </div>
                      <!-- <form class="form-horizontal" action="/tambahmkn" method="post" enctype="multipart/form-data" role="form"> -->
                      <form action="{{ action('makananController@tambahmakan')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field ()}}
                      <div class="modal-body">
                              <div class="form-group">
                                  <label class="col-lg-2 col-sm-2 control-label">Nama</label>
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control" name="nama" placeholder="Nama">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-lg-2 col-sm-2 control-label">Harga</label>
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control" name="harga" placeholder="harga">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-lg-2 col-sm-2 control-label">Stok</label>
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control" name="stok" placeholder="stok">
                                  </div>
                              </div>
                              <div class="form-group">
                                <label class="col-lg-2 col-sm-2 control-label">Deskripsi</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="deskripsi" placeholder="deskripsi">
                                </div>
                                <div class="form-group">
                                <label class="col-lg-2 col-sm-2 control-label">gambar</label>
                                <div class="col-lg-10">
                                    <input type="file" class="form-control" name="gambar" placeholder="gambar">
                                </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                              <button class="btn btn-primary" type="submit"> Save&nbsp;</button>
                              <button type="button" class="btn btn-secondary" data-dismiss="modal"> Cancel</button>
                          </div>
                          </form>
                      </div>
                  </div>
              </div>
            </div>


             <!-- Modal edit -->
             <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="editmakan" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      </div>
                      <!-- <form class="form-horizontal" action="/tambahmkn" method="post" enctype="multipart/form-data" role="form"> -->
                      <form class="edit_makan">
                            {{ csrf_field ()}}
                      <div class="modal-body">
                              <div class="form-group">
                                  <label class="col-lg-2 col-sm-2 control-label">Nama</label>
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control" name="nama" placeholder="Nama">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-lg-2 col-sm-2 control-label">Harga</label>
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control" name="harga" placeholder="harga">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-lg-2 col-sm-2 control-label">Stok</label>
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control" name="stok" placeholder="stok">
                                  </div>
                              </div>
                              <div class="form-group">
                                <label class="col-lg-2 col-sm-2 control-label">Deskripsi</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="deskripsi" placeholder="deskripsi">
                                </div>
                                <div class="form-group">
                                <label class="col-lg-2 col-sm-2 control-label">gambar</label>
                                <div class="col-lg-10">
                                    <input type="gambar" class="form-control" name="gambar" placeholder="gambar">
                                </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                              <button class="btn btn-primary" type="submit"> Save&nbsp;</button>
                              <button type="button" class="btn btn-secondary" data-dismiss="modal"> Cancel</button>
                          </div>
                          </form>
                      </div>
                  </div>
              </div>
            </div>


            
         

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  
  @include('template.footer')
  

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset ('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset ('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset ('js/sb-admin-2.min.js') }}"></script>

  <!-- Page level plugins -->
  <script src="{{ asset ('vendor/chart.js/Chart.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset ('js/demo/chart-area-demo.js') }}"></script>
  <script src="{{ asset ('js/demo/chart-pie-demo.js') }}"></script>

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
   
</body>

</html>

