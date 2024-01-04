@extends('layout.main')

@section('content')
<section class="container-fluid">
    <div class="bg-img-2">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto soal p-5">
                    <h3>Stress Level Test</h3>
                    @if($row > 0)
                        <h2 class="text-center">Anda Sudah Melakukan Test !!!</h2>

                        <p class="text-center">Apakah Ingin Tes Ulang ?</p>

                        <form method="POST" action="{{ route('stress-level.destroy', auth()->user()->id ) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-success text-center w-100" onclick="return confirm('Are you sure?')">Mulai Tes</button>
                        </form>
                    @else
                    <form action="{{ route('stress-level.store') }}" method="POST">
                        @csrf

                        @foreach ($aspek_penilaian as $index => $item)
                            <h5 class="text-center">{{ $item->pertanyaan }}</h5>

                            <div class="d-flex justify-content-center align-items-center mb-5 mt-3">
                                @php
                                    $colors = ['#CA2828', '#EC7777', '#F2F1F4', '#388C4A']; // Yellow, Red, Green, Brown
                                    $texts = ['None', 'Sometimes', 'Often', 'Always'];
                                @endphp

                                @foreach ($colors as $colorIndex => $color)
                                    <label class="custom-radio" style="color: white;background-color: {{ $color }};border-radius:25px;">
                                        <input type="radio" name="jawaban{{ $index }}" value="{{ $colorIndex }}" required>
                                        <span class="custom-radio d-flex justify-content-lg-center align-items-center">
                                            <span style="background-color: {{ $color }};"></span>
                                            <span class="text-center" style="padding-top:10px;left:-10px;color:{{ $texts[$colorIndex] == 'Often' ? '#000' : '#fff' }}">{{ $texts[$colorIndex] }}</span>
                                        </span>
                                    </label>
                                @endforeach
                            </div>
                        @endforeach

                        <div class="p-5 d-flex justify-content-center">
                            <button type="submit" class="btn-finish mx-auto">Finish Test</button>
                        </div>
                    </form>

                    @endif
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
