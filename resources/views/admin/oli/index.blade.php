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
                    <div class="section-header">
                        <h1>Admin Page</h1>
                    </div>
                    <a href="{{ url('admin/yamalube/add') }}" class="btn btn-success mb-1"><i class="fa fa-plus" aria-hidden="true"></i> Input Yamalube Oli </a>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12 ">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Tabel Oli</h4>
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
                                                        <th scope="col">Jenis</th>
                                                        {{-- <th scope="col">Keterangan</th>
                                                        <th scope="col">Harga</th> --}}
                                                        <th scope="col">Gambar</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $no=1;
                                                    @endphp
                                                    @foreach ($oli as $o)
                                                    <tr>
                                                        <th scope="row">{{ $no++ }}</th>
                                                        <td>{{ $o->nama_oli }}</td>
                                                        <td>{{ $o->jenis }}</td>
                                                        {{-- <td>{{ $o->keterangan }}</td>
                                                        <td>{{ $o->harga }}</td> --}}
                                                        <td><img src="{{ asset($o->gambar) }}" alt=""
                                                                style="height: 40px; width:70px;"></td>
                                                        <td>
                                                            <a href="{{ url('admin/yamalube/edit/'.$o->id) }}"
                                                                class="btn btn-transparent text-center text-dark">
                                                                <i class="fas fa-edit fa-2x"></i>
                                                            </a>
                                                            <a  href="{{ url('admin/yamalube/delete/'.$o->id) }}"
                                                                class="btn btn-transparent text-center text-dark" >
                                                                <i class="fas fa-trash-alt fa-2x"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            {{ $oli->links() }}
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
</body>

</html>
