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
                                        <h4>Tambah Motor</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('store.motor') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Produk</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" name="nama_produk">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tipe</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" name="tipe">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Transmisi</label>
                                                <div class="col-sm-12 col-md-7">
                                                <select class="form-control select2" name="transmisi">
                                                  <option value="Manual">Manual</option>
                                                  <option value="Matic">Matic</option>
                                                </select>
                                                </div>
                                            </div>
                                            @php
                                                $regions = DB::table('regions')->get();
                                            @endphp
                                            <div class="form-group row mb-4">
                                                <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Plat Nomor</label>
                                                <div class="col-sm-12 col-md-7">
                                                <select class="form-control select2" name="plat">
                                                  @foreach ($regions as $region)
                                                    <option value="{{ $region->nomor_polisi }}">{{ $region->nomor_polisi }}</option>
                                                  @endforeach
                                                </select>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" name="harga" id="rupiah">
                                                </div>
                                            </div>
                                            <!--<div class="form-group row mb-4">-->
                                            <!--    <label-->
                                            <!--        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Type Motor</label>-->
                                            <!--    <div class="col-sm-12 col-md-7">-->
                                            <!--        <input type="text" class="form-control" name="type_motor">-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                              <div class="form-group row mb-4">
                                                <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Transmisi</label>
                                                <div class="col-sm-12 col-md-7">
                                                <select class="form-control select2" name="type_motor">
                                                  <option value="Matic">Matic</option>
                                                  <option value="Maxi">Maxi</option>
                                                  <option value="Naked Bike">Naked Bike</option>
                                                  <option value="Sport">Sport</option>
                                                  <option value="Offroad">Offroad</option>
                                                  <option value="Moped">Moped</option>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Berat</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" name="berat">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Volume Silinder</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" name="vol_silinder">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sistem Starter</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" name="sistem_start">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Suspensi Depan</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" name="suspensi_depan">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tipe Ban</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" name="tipe_ban">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">PxLxT</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" name="volume">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kapasistas Tangki</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" name="kapasitas_tangki">
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="file" class="form-control" name="image">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar Judul</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="file" class="form-control" name="judul_image">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar Tabel</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="file" class="form-control" name="gambar_tabel">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar Spesifikasi</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="file" class="form-control" name="gambar_spek">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                                <div class="col-sm-12 col-md-7">
                                                    <button type="submit" class="btn btn-primary">Tambah</button>
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
                rupiah.addEventListener('keyup', function(e){
                    // tambahkan 'Rp.' pada saat form di ketik
                    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                    rupiah.value = formatRupiah(this.value, 'Rp. ');
                });

                /* Fungsi formatRupiah */
                function formatRupiah(angka, prefix){
                    var number_string = angka.replace(/[^,\d]/g, '').toString(),
                    split   		= number_string.split(','),
                    sisa     		= split[0].length % 3,
                    rupiah     		= split[0].substr(0, sisa),
                    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

                    // tambahkan titik jika yang di input sudah menjadi angka ribuan
                    if(ribuan){
                        separator = sisa ? '.' : '';
                        rupiah += separator + ribuan.join('.');
                    }

                    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
                }
        </script>

</body>

</html>

