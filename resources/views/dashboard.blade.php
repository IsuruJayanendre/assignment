@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')

<div class="row">

  <div class="col-4">
    <div class="card" style="width: 15rem;">
        <img src="{{url('images/pericon.png')}}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title text-center">Registered people</h5>
          <h2 class="text-primary text-center">
              <b id="people-count">0</b>
          </h2>
        </div>
    </div>
  </div>

  <div class="col-8">
    <h4 class="mb-4">Number of People by Religion</h4>

    <div class="card p-4 shadow-sm">
        <canvas id="barChart" height="100"></canvas>
    </div>
  </div>
</div>
  

    <div class="row">
        <!-- Age Group Pie Chart -->
        <div class="col-md-6 mb-4">
            <div class="card p-2">
                <h5 class="card-title">Age Groups</h5>
                <canvas id="ageGroupChart"></canvas>
            </div>
        </div>

        <!-- Birth Month Pie Chart -->
        <div class="col-md-6 mb-4">
            <div class="card p-3">
                <h5 class="card-title">Birth Months</h5>
                <canvas id="birthMonthChart"></canvas>
            </div>
        </div>
    </div>


    <canvas id="barChart"></canvas>

<script>
    const ctx = document.getElementById('barChart').getContext('2d');

    const barChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($religionLabels) !!},
            datasets: [{
                label: 'Registered People',
                data: {!! json_encode($religionCounts) !!},
                backgroundColor: '#0d6efd'
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>


<script>
    // Age Group Pie Chart
    const ageGroupCtx = document.getElementById('ageGroupChart').getContext('2d');
    new Chart(ageGroupCtx, {
        type: 'pie',
        data: {
            labels: {!! json_encode(array_keys($ageGroups)) !!},
            datasets: [{
                data: {!! json_encode(array_values($ageGroups)) !!},
                backgroundColor: ['#0d6efd', '#ffc107', '#dc3545']
            }]
        },
        options: {
            responsive: true
        }
    });

    // Birth Month Pie Chart
    const birthMonthCtx = document.getElementById('birthMonthChart').getContext('2d');
    new Chart(birthMonthCtx, {
        type: 'pie',
        data: {
            labels: {!! json_encode($monthLabels) !!},
            datasets: [{
                data: {!! json_encode($monthCounts) !!},
                backgroundColor: [
                    '#0d6efd', '#6610f2', '#6f42c1', '#d63384',
                    '#dc3545', '#fd7e14', '#ffc107', '#198754',
                    '#20c997', '#0dcaf0', '#adb5bd', '#6c757d'
                ]
            }]
        },
        options: {
            responsive: true
        }
    });
</script>

<script>
    const target = {{ $totalPeople }};
    const duration = 500; 
    const frameRate = 30;
    const totalFrames = Math.round(duration / (1000 / frameRate));
    let count = 0;
    const increment = target / totalFrames;
    const counter = document.getElementById('people-count');

    const interval = setInterval(() => {
        count += increment;
        if (count >= target) {
            count = target;
            clearInterval(interval);
        }
        counter.textContent = Math.floor(count);
    }, 1000 / frameRate);
</script>


@endsection
