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
                                        <form action="{{ url('/admin/store-colour') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row mb-4">
                                                <input type="text" value="{{$data->nama_produk}}" class="form-control" readonly>
                                                <input type="hidden" name="id" value="{{$data->id}}" readonly>
                                            </div>
                                            <div class="form-group row mb-4">
                                                {{-- Select2 --}}
                                                <select class="js-example-basic-multiple" name="colour[]" multiple="multiple">
                                                    @foreach($warna as $w)
                                                        <option value="{{$w->id}}">{{$w->name}}</option>
                                                    @endforeach
                                                    @foreach($data->warna as $d)
                                                        <option value="{{$d->id}}" {{ $d->id == $d->id ? 'selected' : '' }}>{{$d->name}} (Digunakan Saat Ini)</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <input type="file" name="files[]" placeholder="Choose files" multiple>
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
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                placeholder: 'Masukkan Warna',
                allowClear: true,
            });
        });
    </script>
</body>

</html>
