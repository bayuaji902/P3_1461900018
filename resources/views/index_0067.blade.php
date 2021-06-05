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
                    <div class="card-header">Transaksi</div>
                    <div class="card-body">
                        <table data-toggle="table">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Nama Barang</th>
                            <th>Harga Barang</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksi as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_pelangagan }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->harga }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
                <br>

                {{-- Master Barang --}}
                <div class="card">
                    <div class="card-header">Daftar Barang</div>
                    <div class="card-body">
                        <form class="example">
                            <input type="text" placeholder="Search.." name="search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                        <button type="button" style="margin-buttom: 10px ;margin-top: 10px;" onclick="location.href='{{ url('tugas_praktikum3/create') }}'" class="btn btn-primary">Tambah Barang</button>
                        <br>
                        <table data-toggle="table">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($tugas_praktikum as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->harga }}</td>
                                <td>
                                    <button type="button" class="btn waves-effect btn-success btn-sm" onclick="location.href='{{ route('tugas_praktikum3.edit', $item->id) }}'"><i class="far fa-edit"></i> Edit</button>
                                    {!! Form::open( ['method' => 'delete', 'url' => route('tugas_praktikum3.destroy',['tugas_praktikum3' => $item->id]), 'style' => 'display: inline', 'onSubmit' => 'return confirm("Apakah Anda yakin menghapus data ini ?")']) !!}
                                        <button type="submit" class="btn waves-effect btn-danger btn-sm" data-toggle="tooltip" title="Hapus Barang"><i class="far fa-trash-alt"></i> Hapus</button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>