@extends('layout.main')

@section('content')
<h3>Form Edit Data Mahasiswa</h3>
<div class="card">
    <div class="card-header">
        <a href="{{ url('students') }}" class="btn btn-sm btn-primary"><i class="fa-solid fa-circle-left"></i> Kembali</a>
    </div>
    <div class="card-body">
        <form action="{{ url('students/'.$nim) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row g-3">
                <div class="col-md-6">
                  <label for="nim">NIM</label>
                  <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan Nomor Induk Mahasiswa" value="{{ $nim }}" readonly>
                </div>
                <div class="col-md-6">
                  <label for="nama">Nama Mahasiswa</label>
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukkan Nama Mahasiswa" value="{{ $nama }}">
                  @error('nama')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="col-md-6">
                    <label>Jenis Kelamin</label>
                    <select class="form-select @error('gender') is-invalid @enderror" name="gender">
                        <option value="" selected>Pilih Gender</option>
                        <option value="L" {{ ($gender == 'L') ? 'selected' : ''  }}>Laki-Laki</option>
                        <option value="P" {{ ($gender == 'P') ? 'selected' : ''  }}>Perempuan</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="alamat">Alamat rumah</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Masukkan Alamat rumah" value="{{ $alamat }}">
                    @error('alamat')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="col-md-6">
                    <label>Jurusan</label>
                    <select class="form-select @error('jurusan') is-invalid @enderror" name="jurusan">
                        <option value="" selected>Pilih Jurusan</option>
                        <option value="TI" {{ ($jurusan == 'TI') ? 'selected' : ''  }}>Teknik Informatika</option>
                        <option value="SI" {{ ($jurusan == 'SI') ? 'selected' : ''  }}>Sistem Informasi</option>
                        <option value="TK" {{ ($jurusan == 'TK') ? 'selected' : ''  }}>Teknik Komputer</option>
                        <option value="MI" {{ ($jurusan == 'MI') ? 'selected' : ''  }}>Manajemen Informatika</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="angkatan">Angkatan Mahasiswa</label>
                    <input type="text" class="form-control @error('angkatan') is-invalid @enderror" id="angkatan" name="angkatan" placeholder="Masukkan Angkatan" value="{{ $angkatan }}">
                    @error('angkatan')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <button class="btn btn-primary" type="submit">SUBMIT</button>
            </div>
        </form>
    </div>
</div>
@endsection