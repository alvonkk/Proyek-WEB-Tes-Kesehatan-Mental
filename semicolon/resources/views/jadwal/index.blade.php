@extends('layout.main')

@section('content')
<section class="container-fluid">
    <img src="{{ asset('img/grafik5.png')}}" class="bg-img" alt="">
    {{-- <div class="bg-img-2"></div> --}}
    <div class="container">
        <div class="row">
            <div class="col-md-12 jadwal">
                <h3>Atur Jadwal</h3>
                <table class="custom-table custom-striped-table" id="list-data">
                    <thead>
                        <tr class="background:#000">
                            <th>No</th>
                            <th>Hari</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>-</th>
                            <th>-</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jadwal as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ strftime('%A', strtotime($row->jadwal)) }}</td>
                            <td>{{ date('d-m-Y', strtotime($row->jadwal))}}</td>
                            <td>{{ date('H:i', strtotime($row->jadwal))}}</td>
                            <td class="bg-salmon">
                                <a href="" class="btn text-center w-100" data-bs-toggle="modal" data-bs-target="#modalUpdate{{$row->id}}">Update</a>
                            </td>
                            <td class="bg-red">
                                <form method="POST" action="{{ route('jadwal.destroy', $row->id) }}" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn text-center w-100" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>

                        <!-- Modal for Update -->
                        <div class="modal fade" id="modalUpdate{{ $row->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Jadwal</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('jadwal.update', $row->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <input type="datetime-local" name="jadwal" class="form-control" value="{{ date('Y-m-d\TH:i', strtotime($row->jadwal)) }}" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>

                <div class="p-5 d-flex justify-content-center">
                    <a href="" class="btn-tambah mx-auto" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah</a>
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
          <h1 class="modal-title fs-5" id="exampleModalLabel">Jadwal</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('jadwal.store') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <input type="datetime-local" name="jadwal" class="form-control" required>
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
