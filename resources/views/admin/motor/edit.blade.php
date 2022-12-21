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
                                        <form action="{{ url('admin/motor/update/'.$motors->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="old_image" value="{{ $motors->gambar }}">
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama
                                                    Produk</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" name="nama_produk"
                                                        value="{{ $motors->nama_produk }}">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tipe</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" name="tipe"
                                                        value=" {{ $motors->tipe }}">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Transmisi</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <select class="form-control select2" name="transmisi">
                                                        <option value="Manual"
                                                            {{ $motors->transmisi == 'Manual' ? 'selected' : '' }}>
                                                            Manual</option>
                                                        <option value="Matic"
                                                            {{ $motors->transmisi == 'Matic' ? 'selected' : ''}}>Matic
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Plat
                                                    Nomor</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <select class="form-control select2" name="plat">
                                                        <option value="AD"
                                                            {{ $motors->plat == 'AD' ? 'selected' : '' }}>AD</option>
                                                        <option value="AB" {{ $motors->plat == 'AB' ? 'selected' : ''}}>
                                                            AB</option>
                                                        <option value="G" {{ $motors->plat == 'G' ? 'selected' : ''}}>G
                                                        </option>
                                                        <option value="AE" {{ $motors->plat == 'AE' ? 'selected' : ''}}>
                                                            AE</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" name="harga"
                                                        value="{{ $hargas }}">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Berat</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" name="berat"
                                                        value="{{ $motors->berat }}">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Type
                                                    Motor</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <select class="form-control select2" name="type_motor">
                                                        <option value="Matic"
                                                            {{ $motors->type_motor == 'Matic' ? 'selected' : '' }}>
                                                            Matic</option>
                                                        <option value="Maxi"
                                                            {{ $motors->type_motor == 'Maxi' ? 'selected' : ''}}>Maxi
                                                        </option>
                                                        <option value="Naked Bike"
                                                            {{ $motors->type_motor == 'Naked Bike' ? 'selected' : ''}}>
                                                            Naked Bike
                                                        </option>
                                                        <option value="Sport"
                                                            {{ $motors->type_motor == 'Sport' ? 'selected' : ''}}>Sport
                                                        </option>
                                                        <option value="Offroad"
                                                            {{ $motors->type_motor == 'Offroad' ? 'selected' : ''}}>
                                                            Offroad
                                                        </option>
                                                        <option value="Moped"
                                                            {{ $motors->type_motor == 'Moped' ? 'selected' : ''}}>Moped
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Volume
                                                    Silinder</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" name="vol_silinder"
                                                        value="{{ $motors->vol_silinder }}">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sistem
                                                    Starter</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" name="sistem_start"
                                                        value="{{ $motors->sistem_start }}">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Suspensi
                                                    Depan</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" name="suspensi_depan"
                                                        value="{{ $motors->suspensi_depan }}">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tipe
                                                    Ban</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" name="tipe_ban"
                                                        value="{{ $motors->tipe_ban }}">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">PxLxT</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" name="volume"
                                                        value="{{ $motors->volume }}">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kapasistas
                                                    Tangki</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" name="kapasitas_tangki"
                                                        value="{{ $motors->kapasitas_tangki }}">
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="file" class="form-control mb-3" name="gambar">
                                                    <img src="{{ asset($motors->gambar) }}" alt=""
                                                        style="height: 200px; width:400px;">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar
                                                    Judul</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="file" class="form-control mb-3" name="judul_image">
                                                    <img src="{{ asset($motors->judul_image) }}" alt=""
                                                        style="height: 200px; width:400px;">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar
                                                    Tabel</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="file" class="form-control mb-3" name="gambar_tabel">
                                                    <img src="{{ asset($motors->gambar_tabel) }}" alt=""
                                                        style="height: 200px; width:400px;">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar
                                                    Spesifikasi</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="file" class="form-control mb-3" name="gambar_spek">
                                                    <img src="{{ asset($motors->gambar_spek) }}" alt=""
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

    <script type="text/javascript">
        var rupiah = document.getElementById('rupiah');
        rupiah.addEventListener('keyup', function (e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value, 'Rp. ');
        });

        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }

    </script>
</body>

</html>
