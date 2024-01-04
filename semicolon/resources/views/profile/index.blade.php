@extends('layout.main')

@section('content')
<section class="container-fluid dashboard">
    <img src="{{ asset('img/grafik5.png')}}" class="bg-img" alt="">

    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto profile-wrapper">
                <div class="d-flex justify-content-center flex-column align-items-center">
                    <div class="profile">
                        <span><a href="" data-bs-toggle="modal" data-bs-target="#modalEdit"><i class="fa-solid fa-user-pen"></i></a></span>
                    </div>
                    <div class="bar text-center d-flex flex-column justify-content-end">
                        <h4 class="name">{{ auth()->user()->name }}</h4>
                        <h4 class="email">{{ auth()->user()->email }}</h4>
                    </div>
                </div>

                @if(auth()->user()->role == 'client')

                <h5 class="my-2">Score</h5>

                <div class="d-flex justify-content-between">
                    @foreach ($stress_level as $row)
                        <div class="d-flex flex-column justify-content-center align-items-center">

                            <div class="score mb-3">
                                <h2>{{ $row->total }}</h2>
                            </div>

                            <h5>{{ $row->kelompok }}</h5>

                            <h6>
                            @if($row->kelompok == 'DEPRESI')
                                @if ($row->total >= 0 && $row->total <= 9)
                                    {{ 'Normal' }}
                                @elseif ($row->total >= 10 && $row->total <= 13)
                                    {{ 'Ringan' }}
                                @elseif ($row->total >= 14 && $row->total <= 20)
                                    {{ 'Sedang' }}
                                @elseif ($row->total >= 21 && $row->total <= 27)
                                    {{ 'Berat' }}
                                @elseif ($row->total >= 28)
                                    {{ 'Sangat Berat' }}
                                @else
                                    {{ 'Invalid score' }}
                                @endif
                            @elseif($row->kelompok == 'KECEMASAN')
                                @if ($row->total >= 0 && $row->total <= 7)
                                    {{ 'Normal' }}
                                @elseif ($row->total >= 8 && $row->total <= 9)
                                    {{ 'Ringan' }}
                                @elseif ($row->total >= 10 && $row->total <= 14)
                                    {{ 'Sedang' }}
                                @elseif ($row->total >= 15 && $row->total <= 19)
                                    {{ 'Berat' }}
                                @elseif ($row->total >= 20)
                                    {{ 'Sangat Berat' }}
                                @else
                                    {{ 'Invalid score' }}
                                @endif
                            @elseif($row->kelompok == 'STRESS')
                                @if ($row->total >= 0 && $row->total <= 14)
                                    {{ 'Normal' }}
                                @elseif ($row->total >= 15 && $row->total <= 18)
                                    {{ 'Ringan' }}
                                @elseif ($row->total >= 19 && $row->total <= 25)
                                    {{ 'Sedang' }}
                                @elseif ($row->total >= 26 && $row->total <= 33)
                                    {{ 'Berat' }}
                                @elseif ($row->total >= 34)
                                    {{ 'Sangat Berat' }}
                                @else
                                    {{ 'Invalid score' }}
                                @endif
                            @endif
                        </h6>
                        </div>
                    @endforeach
                </div>

                @else

                <br/>
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
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->user->name }}</td>
                                <td>{{ date('Y-m-d', strtotime($row->tanggal))}}</td>
                                <td>{{ date('H:i', strtotime($row->tanggal))}}</td>
                                <td>{{ date('H:i', strtotime($row->selesai))}}</td>
                                <td>{{ $row->deskripsi }}</td>
                                <td>{{ $row->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @endif

                <a href="" class="edit-profile" data-bs-toggle="modal" data-bs-target="#modalEdit"><i class="fa-solid fa-gear"></i> Edit</a>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profile</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('profile.update', auth()->user()->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="form-group">
            <label for="">Fullname</label>
            <input type="text" name="name" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Phone</label>
            <input type="text" name="phone" class="form-control">
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
