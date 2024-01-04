@extends('layout.main')

@section('content')
<section class="container-fluid bg-img">
    <img src="{{ asset('img/grafik5.png')}}" class="bg-img" alt="">

    <div class="row d-flex justify-content-center">
        <div class="col-md-4">
            <div class="schedule">
                <h3>Counseling Schedule</h3>

                <form action="{{ route('post.counseling')}}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="">Short description of the problem :</label>
                        <textarea name="deskripsi" id="" cols="30" rows="5" class="form-control" placeholder="Write here"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="" class="mb-2">Select Date & Time :</label>
                        <input type="datetime-local" name="konsul" class="form-control form-schedule" />
                    </div>
                    <div class="form-group d-flex justify-content-center mt-5">
                        <button type="submit" class="btn btn-apply mx-auto">Apply</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
