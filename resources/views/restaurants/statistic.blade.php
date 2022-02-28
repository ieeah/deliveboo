@extends('layouts.app')

@section('content')

<main class="statistics container">
    <div class="chart">
        <h3 class="text-primary">Statistiche Mensili</h3>
        <canvas id="monthlyChart" height="100" width="200"></canvas>
    </div>

    <div class="chart">
        <h3 class="text-primary">Statistiche Annuali</h3>
        <canvas id="yearlyChart" height="100" width="200"></canvas>
    </div>

    <div class="chart">
        <h3 class="text-primary">Statistiche Ammontare Vendite</h3>
        <canvas id="myChart" height="100" width="200"></canvas>
    </div>
</main>



@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
<script>

const orders = @json($orders);




//MONTHLY CHART
const orderMonthly = [];

for (let i = 0; i < orders.length; i++) {
    const date = new Date(orders[i].created_at);
    const month = date.getUTCMonth() + 1;
    orderMonthly.push({
        month: month,
    });
}

const gennaio = [];
const febbraio = [];
const marzo = [];
const aprile = [];
const maggio = [];
const giugno = [];
const luglio = [];
const agosto = [];
const settembre = [];
const ottobre = [];
const novembre = [];
const dicembre = [];

orderMonthly.forEach(e => {
    switch(e.month) {
        case 1: 
        gennaio.push(e);
        break;

        case 2:
        febbraio.push(e);
        break;

        case 3:
        marzo.push(e);
        break;

        case 4:
        aprile.push(e);
        break;

        case 5:
        maggio.push(e);
        break;

        case 6:
        giugno.push(e);
        break;

        case 7:
        luglio.push(e);
        break;

        case 8:
        agosto.push(e);
        break;

        case 9:
        settembre.push(e);
        break;

        case 10:
        ottobre.push(e);
        break;

        case 11:
        novembre.push(e);
        break;

        case 12:
        dicembre.push(e);
        break;     
    }
})


let monthlyChart = document.getElementById("monthlyChart").getContext('2d');

let massPopChart = new Chart(monthlyChart, {
    type: 'line',
    data: {
        datasets: [{
            label: [],
            data: {
                Gennaio: gennaio.length,
                Febbraio: febbraio.length,
                Marzo: marzo.length,
                Aprile: aprile.length,
                Maggio: maggio.length,
                Giugno: giugno.length,
                Luglio: luglio.length,
                Settembre: settembre.length,
                Ottobre: ottobre.length,
                Novembre: novembre.length,
                Dicembre: marzo.length,
            },
            backgroundColor: [
                'rgba(0, 100, 255, 0.7)',
            ],
            borderColor: [
                'rgba(0, 100, 255, 0.7)',
            ]
            
        }], 

    },
    options: {
    },


})


//YEARLY CHART

let yearlyChart = document.getElementById("yearlyChart").getContext('2d');

let yearPopChart = new Chart(yearlyChart, {
    type: 'line',
    data: {
        datasets: [{
            
            data: {
                //Insert data
            },
            backgroundColor: [
                'rgba(255, 20, 0, 0.7)',
            ],
            borderColor: [
                'rgba(255, 20, 0, 0.7)',
            ],
        }]
    }
})







</script>

@endsection