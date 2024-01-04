@extends('layout.main')

@section('content')
<section class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12 jadwal">
                <h3>Informasi Client</h3>
                <table class="custom-table custom-striped-table" id="list-data">
                    <thead>
                        <tr class="background:#000">
                            <th>No</th>
                            <th>Nama Client</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Selesai</th>
                            <th>Masalah</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($counseling as $row)
                            <tr>
                                <td>{{ $loop->iteration}}</td>
                                <td>{{ $row->user->name }}</td>
                                <td>{{ date('Y-m-d', strtotime($row->tanggal))}}</td>
                                <td>{{ date('H:i', strtotime($row->tanggal))}}</td>
                                <td>{{ date('H:i', strtotime($row->selesai))}}</td>
                                <td>{{ $row->deskripsi }}</td>
                                <td>{{ $row->status }}</td>
                                {{-- <td class="bg-salmon">
                                    <a href="" class="btn text-center w-100" data-bs-toggle="modal" data-bs-target="#modalUpdate">Update</a>
                                </td>
                                <td class="bg-red">
                                    <form method="POST" action="" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn text-center w-100" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="p-5 d-flex justify-content-center">
                    <a href="" class="btn-apply mx-auto" style="text-decoration: none" data-bs-toggle="modal" data-bs-target="#modalTambah">Edit Status</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Status</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('update.counseling') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-body">
            <div class="form-group mb-3">
                <label for="">Pilih Client</label>
                <select name="id" id="" class="form-control">
                    @foreach ($counseling as $data)
                        <option value="{{ $data->id }}">{{ $data->user->name}} -  {{ $data->tanggal}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="">Selesai</label>
                <input type="time" name="selesai" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <select name="status" id="" class="form-control">
                    <option value="Belum">Belum</option>
                    <option value="Selesai">Selesai</option>
                </select>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
        </form>
      </div>
    </div>
</div>

@endsection
