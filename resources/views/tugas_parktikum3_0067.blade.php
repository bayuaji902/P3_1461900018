</html>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    
    {{-- CSS --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.css">
    
    {{-- JS --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.js"></script>

    <title>Tugas Praktikum 3</title>
  </head>
  <body>
    <div class="container" style="margin-top: 10px;">
        <div class="row">   
            <div class="col-lg-12">
                <div class="card">
                    @if(isset($tugas_praktikum))
                        <div class="card-header bg-primary"><h5 class="text-white">Edit Barang</h5></div>
                    @else
                        <div class="card-header bg-primary"><h5 class="text-white">Tambah Barang</h5></div>
                    @endif
                    <div class="card-body">
                        @if(isset($tugas_praktikum))
                            <form id="validation" action="{{url('tugas_praktikum3/'.$tugas_praktikum->id)}}" method="post">
                            @method('PUT')
                            @csrf
                        @else
                            <form id="validation" action="{{ url('tugas_praktikum3') }}" method="post">
                            @csrf
                        @endif
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" class="form-control" value="{{ isset($tugas_praktikum->nama)? $tugas_praktikum->nama : old('nama') }}" placeholder="Masukkan Nama Barang" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Harga</label>
                                <input type="text" class="form-control" value="{{ isset($tugas_praktikum->harga)? $tugas_praktikum->harga : old('harga') }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" max="6" placeholder="Masukkan Harga" name="harga" required>
                            </div>
                            <button type="reset" onclick="location.href='{{ url('tugas_praktikum3') }}'" class="btn btn-secondary"><i class="fas fa-backspace"></i> Kembali</button>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>