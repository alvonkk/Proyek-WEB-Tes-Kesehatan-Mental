@extends('layout.main')

@section('content')
<section class="container-fluid dashboard">
    <img src="{{ asset('img/grafik5.png')}}" class="bg-img" alt="">
    @if(auth()->user()->role == 'client' || auth()->user()->role == 'konselor')
    <div class="row d-flex justify-content-center ">

        <div class="col-md-3">
            <div class="stress-level">
                <img src="{{ asset('img/dashboard1.png') }}"  alt="">
                <div class="stress-level-link d-flex justify-content-center align-items-center">
                    <a href="{{ route('stress-level.index') }}">STRESS LEVELS TESTS</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 px-4">
            <div class="d-flex align-items-center justify-content-center coming">
                <h4>COMING SOON...</h4>
            </div>
        </div>
    </div>
    @elseif(auth()->user()->role == 'admin')
    <div class="row">
        <div class="col-md-6 mx-auto bg-white" style="margin-top:100px">
            <canvas id="lineChart" width="400" height="200"></canvas>
        </div>
    </div>
    @endif
</section>


@endsection

@section('page-scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById('lineChart').getContext('2d');
        var statusChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Selesai', 'Belum'],
                datasets: [{
                    label: 'Counseling Status',
                    backgroundColor: ['green', 'red'],
                    data: [{{ json_encode($selesaiCount) }}, {{ json_encode($belumCount) }}],
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                    }
                }
            }
        });
    });
</script>
@endsection
