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
                                        <h4>Edit Motor</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ url('admin/dealer/update/'.$dealers->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="old_image" value="{{ $dealers->gambar }}">
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama
                                                    Dealer</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" name="nama_dealer"
                                                        value="{{ $dealers->nama_dealer }}">
                                                </div>
                                            </div>

                                            @php
                                            // $provinces = DB::table('regions')->get();
                                            @endphp

                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Plat
                                                </label>
                                                <div class="col-sm-12 col-md-7">
                                                    <select class="form-control select2" name="plat">
                                                        <option value="AD"
                                                            {{ $dealers->plat == 'AD' ? 'selected' : '' }}>AD</option>
                                                        <option value="AB" {{ $dealers->plat == 'AB' ? 'selected' : ''}}>
                                                            AB</option>
                                                        <option value="G" {{ $dealers->plat == 'G' ? 'selected' : ''}}>G
                                                        </option>
                                                        <option value="AE" {{ $dealers->plat == 'AE' ? 'selected' : ''}}>
                                                            AE</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Lokasi</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" name="lokasi"
                                                        value=" {{ $dealers->lokasi}}">
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Link
                                                    Lokasi</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" name="link_lokasi"
                                                        value="{{ $dealers->link_lokasi }}">
                                                </div>
                                            </div>



                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="file" class="form-control mb-3" name="gambar">
                                                    <img src="{{ asset($dealers->gambar) }}" alt=""
                                                        style="height: 200px; width:400px;">
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
