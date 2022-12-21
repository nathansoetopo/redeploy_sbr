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
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Edit Wilayah</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ url('admin/wilayah/update/'.$wilayah->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="old_image" value="{{ $wilayah->gambar }}">
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nomor
                                                    Polisi</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" name="nomor_polisi" value="{{ $wilayah->nomor_polisi }}">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Provinsi</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" name="provinsi" value="{{ $wilayah->provinsi }}">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Wilayah</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" name="wilayah" value="{{ $wilayah->wilayah }}">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kota</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" name="kota" value="{{ $wilayah->kota }}">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="file" class="form-control mb-2" name="gambar">
                                                    <img src="{{ asset($wilayah->gambar) }}" alt="" style="height: 200px; width:400px;">
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                                <div class="col-sm-12 col-md-7">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </div>
                                        </form>
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
