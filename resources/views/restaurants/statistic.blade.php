@extends('layouts.app')

@section('content')

<div class="chart" style="width: 50%; padding: 20px; background-color: red;">
    <canvas id="myChart" height="100" width="200"></canvas>
</div>



@endsection


@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
<script>


/* alert('ciao') */

let myChart = document.getElementById("myChart").getContext('2d');

let massPopChart = new Chart(myChart, {
    type: 'bar',
    data: {
        labels: ['Boston', 'Warcester', 'Springfield', 'Lowell', 'Cambridge', 'New Bedford'],
        datasets: [{
            label: 'Population',
            data: [
                617594,
                181045,
                153060,
                106519,
                105162,
                95072
            ]
        }],

    },
    options: {},


})










</script>

@endsection