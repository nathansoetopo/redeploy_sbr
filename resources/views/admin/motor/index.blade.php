<!DOCTYPE html>
<html lang="en">

<head>
    @include('stisla.head')
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            @include('stisla.navbar')
            @include('stisla.sidebar')

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-warning alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ $error }}
                        </div>
                    </div>
                    @endforeach
                    @endif
                    @if (session('status'))
                    <div class="alert alert-info alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ session('status') }}
                        </div>
                    </div>
                    @endif
                    <div class="section-header">
                        <h1>Admin Page</h1>
                    </div>
                    <a href="{{ url('admin/motor/add') }}" class="btn btn-success mb-1"><i class="fa fa-plus" aria-hidden="true"></i> Input Motor </a>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12 ">
                                <div class="card">
                                    <div class="card-header">
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4>Tabel Motor</h4>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group mt-3">
                                                    <select name="nopol" id="nopol_search" onchange="getNopol()" class="form-control mr-3" aria-label="Nomor Polisi">
                                                        <option value="all">-- Semua Produk --</option>
                                                        @foreach($nopol as $n)
                                                            <option value="{{$n->nomor_polisi}}">{{$n->nomor_polisi}}</option>
                                                        @endforeach
                                                    </select>
                                                    <select name="motor" id="motor_search" class="form-control mr-3" aria-label="Nama Motor">
                                                        <option value="all" disabled>-- Semua Produk --</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        @if (session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>{{ session('success') }}</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @endif
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-md">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col">No</th>
                                                        <th scope="col">Nama Produk</th>
                                                        <th scope="col">Tipe</th>
                                                        <th scope="col">Region</th>
                                                        <th scope="col">Gambar</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="result">
                                                    @foreach ($motors as $motor)
                                                    <tr>
                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                        <td>{{ $motor->nama_produk }}</td>
                                                        <td>{{ $motor->tipe }}</td>
                                                        <td>{{$motor->plat}}</td>
                                                        <td><img src="{{ asset($motor->gambar) }}" alt=""
                                                                style="height: 40px; width:70px;"></td>
                                                        <td>
                                                            <a href="{{ url('admin/motor/edit/'.$motor->id) }}"
                                                                class="btn btn-transparent text-center text-dark">
                                                                <i class="fas fa-edit fa-2x"></i>
                                                            </a>
                                                            <a href="{{ url('admin/motor/colour/'.$motor->id) }}"
                                                                class="btn btn-primary text-center text-white">
                                                                Warna
                                                            </a>
                                                            <a  href="{{ url('admin/motor/delete/'.$motor->id) }}"
                                                                class="btn btn-transparent text-center text-dark" >
                                                                <i class="fas fa-trash-alt fa-2x"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            {{ $motors->links() }}
                                            {{-- Halaman : {{ $motors->perPage() }}  --}}
                                            <br/>
                                            <br/>
                                        </div>
                                    </div>
                                    <!-- This is where your code ends -->
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <footer class="main-footer">
                @include('stisla.footer')
            </footer>
        </div>
    </div>
    @include('stisla.script')
    <script>
    function getNopol(){
        var nopol = $('#nopol_search').val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:"{{ url('/get-by-nopol') }}",
            method:'post',
            data:{nopol:nopol},
            success:function(response)
            {
                $('#result').html(response);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url:"{{ url('/show-list-motor') }}",
                    method:'post',
                    data:{nopol:nopol},
                    success:function(response)
                    {
                        $('#motor_search').html(response);
                    }
                })
            }
        })
    }

    $(document).on('change', '#motor_search', function(){
        var motor = $('#motor_search').val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:"{{ url('/get-motor-admin') }}",
            method:'POST',
            data:{motor:motor},
            success:function(response)
            {
                $('#result').html(response);
                //console.log(response);
            }
        })
    });
  </script>
</body>
</html>
