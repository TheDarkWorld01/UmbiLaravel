@extends('layout.main')

@section('content')
    <h3>Data Mahasiswa Duta Bangsa</h3>
    <div class="card">
        <div class="card-header">
            <a href="{{ url('students/add') }}" class="btn btn-sm btn-primary"><i class="fa-solid fa-plus"></i> Tambah Mahasiswa Baru</a>
        </div>
        <div class="card-body">
            @if (session('msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> {{ session('msg') }}.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <table class="table table-sm table-striped table-bordered">
                <thead>
                    <tr>
                        <th style="text-align:center;">NO</th>
                        <th style="text-align:center;">NIM</th>
                        <th style="text-align:center;">Nama Mahasiswa</th>
                        <th style="text-align:center;">Jenis Kelamin</th>
                        <th style="text-align:center;">Alamat</th>
                        <th style="text-align:center;">Jurusan</th>
                        <th style="text-align:center;">Angkatan</th>
                        <th style="text-align:center;">OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $row)
                    <tr>
                        <td style="text-align:center;">{{ $loop->iteration }}</td>
                        <td>{{ $row-> id_mahasiswa }}</td>
                        <td>{{ $row-> nama_mahasiswa }}</td>
                        <td>{{ ($row-> gender == 'L') ? 'Laki-laki' : 'Perempuan' }}</td>
                        <td>{{ $row-> alamat }}</td>
                        <td>{{ $row-> jurusan }}</td>
                        <td>{{ $row-> angkatan }}</td>
                        <td style="text-align:center;">
                            <button onclick="window.location='{{ url('students/'.$row->id_mahasiswa) }}'" class="btn btn-primary" type="button">
                                <i class="fa-solid fa-pen-to-square"></i>
                                EDIT
                            </button>
                            <form action="{{ url('students/'.$row->id_mahasiswa) }}" method="POST" style="display: inline;" onsubmit="return deleteData({{ $row -> nama_mahasiswa }})">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash-can"></i>DELETE</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function deleteData(name){
            // alert = confirm(`Yakin ingin menghapus data dengan nama ${name} ?`);
            // if(alert) return true;
            // else return false;
            Swal.fire({
                title: 'Apakah kamu yakin ingin menghapusnya?',
                text: "Data yang dihapus secara permanent!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yakin'
                }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                    'Terhapus!',
                    'Data berhasil dihapus',
                    'success'
                    )
                }
            })
        }
    </script>
@endsection