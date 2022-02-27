@extends('layouts.app')

@section('content')

    <div class="chart" style="width: 50%; padding: 20px; background-color: red;">
        <canvas id="myChart" height="100" width="200"></canvas>
    </div>

@endsection

@section('scripts')

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
<script  src="{{ asset('js/chart.js')}}"></script>
@endsection
