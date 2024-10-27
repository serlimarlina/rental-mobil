@extends('halaman_dashboard.index')
@section('navitem')
@endsection
@section('main')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
                <h1>Tambah Data Mobil</h1>
            </div>

            <div class="section-body">
                <div class="mb-3">
                    <ol class="breadcrumb bg-primary">
                        <li class="breadcrumb-item"><a href="{{route('Profile.katalog.index')}}" class="text-white text-decoration-none">Kelola Data Mobil</a></li>
                        <li class="breadcrumb-item"><a href="#" class="text-white text-decoration-none">Tambah Data Mobil</a></li>
                    </ol>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-tags"></i> Tambah Data Mobil</h4>
                    </div>
                    <div class="card-body">
                    <form action="{{ route('Profile.katalog.post') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>GAMBAR</label>
                                <input type="file" name="gambar" value="{{ old('gambar') }}" class="form-control @error('gambar') is-invalid @enderror">

                                @error('gambar')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>MERK</label>
                                <input type="text" name="judul" value="{{ old('judul') }}" placeholder="Masukkan Judul" class="form-control @error('judul') is-invalid @enderror">

                                @error('judul')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>HARGA</label>
                                <input type="text" name="harga" value="{{ old('harga') }}" placeholder="Masukkan Harga Barang" class="form-control @error('harga') is-invalid @enderror">

                                @error('harga')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i> SIMPAN</button>
                            <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.12/tinymce.min.js"></script>
    <script>
        var editor_config = {
            selector: "textarea.alamat",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
        };

        tinymce.init({
            selector: 'textarea',
            height: 300
        });
    </script>
@endsection