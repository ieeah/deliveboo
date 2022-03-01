@extends('layouts.app')

@section('content')

<main class="statistics container">
    {{-- <div class="chart">
        <h3 class="text-primary">Statistiche Mensili</h3>
        <canvas id="monthlyChart" height="100" width="200"></canvas>
    </div> --}}

    <div class="chart">
        <h3 class="text-primary">Statistiche Mensili</h3>
        <canvas id="monthlyChart" height="100" width="200"></canvas>

        <div class="buttons">
            <button class="btn btn-primary btn-left"><i class="fa-solid fa-caret-left"></i></button>
            <div class="btn btn-primary btn-year"></div>
            <button class="btn btn-primary btn-right"><i class="fa-solid fa-caret-right"></i></button>
        </div>
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


//Set Year
const orders = @json($orders);
console.log(orders);


const today = new Date();
let currentYear = today.getUTCFullYear()

const buttonLeft = document.querySelector('.btn-left');
const buttonRight = document.querySelector('.btn-right');
const buttonYear = document.querySelector('.btn-year');

buttonYear.innerHTML = `${currentYear}`


//MONTLY CHART


filteredOrder = []


//Select Order By Year
function getYearlyOrders() {
filteredOrder = [];
for (let i = 0; i < orders.length; i++) {
    const date = new Date(orders[i].created_at);
    const year = date.getUTCFullYear();
    if (year === currentYear) {
        filteredOrder.push(orders[i])
    }
}
}

//MONTHLY CHART
orderMonthly = [];
let gennaio = [];
let febbraio = [];
let marzo = [];
let aprile = [];
let maggio = [];
let giugno = [];
let luglio = [];
let agosto = [];
let settembre = [];
let ottobre = [];
let novembre = [];
let dicembre = [];

function getMonthlyOrders() {
    //Reset month Array
    gennaio = [];
    febbraio = [];
    marzo = [];
    aprile = [];
    maggio = [];
    giugno = [];
    luglio = [];
    agosto = [];
    settembre = [];
    ottobre = [];
    novembre = [];
    dicembre = [];

    for (let i = 0; i < filteredOrder.length; i++) {
        const date = new Date(filteredOrder[i].created_at);
        const month = date.getUTCMonth() + 1;
        switch (month) {
            case 1: 
            gennaio.push(filteredOrder[i]);
            break;

            case 2:
            febbraio.push(filteredOrder[i]);
            break;

            case 3:
            marzo.push(filteredOrder[i]);
            break;

            case 4:
            aprile.push(filteredOrder[i]);
            break;

            case 5:
            maggio.push(filteredOrder[i]);
            break;

            case 6:
            giugno.push(filteredOrder[i]);
            break;

            case 7:
            luglio.push(filteredOrder[i]);
            break;

            case 8:
            agosto.push(filteredOrder[i]);
            break;

            case 9:
            settembre.push(filteredOrder[i]);
            break;

            case 10:
            ottobre.push(filteredOrder[i]);
            break;

            case 11:
            novembre.push(filteredOrder[i]);
            break;

            case 12:
            dicembre.push(filteredOrder[i]);
            break;     
        }
    }
}

getYearlyOrders();
getMonthlyOrders();

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


function updateChart() {
    massPopChart.data.datasets[0].data = {
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
    };
    massPopChart.update()
}



buttonLeft.addEventListener('click', function() {
    currentYear-- 
    buttonYear.innerHTML = `${currentYear}`;
    getYearlyOrders()
    getMonthlyOrders();
    updateChart()
})

buttonRight.addEventListener('click', function() {
    currentYear++
    buttonYear.innerHTML = `${currentYear}`;
    getYearlyOrders();
    getMonthlyOrders()
    updateChart()
})










//YEARLY CHART
/* 
orderYearly = [] */

/* const date = new Date(orders[0].created_at);
const year = date.getUTCFullYear() + 1;
 */

/* for (let i = 0; i < orders.length; i++) {
    const date = new Date(orders[0].created_at);
    const year = date.getUTCFullYear();
    orderYearly.push(year);
}

console.log(orderYearly);




let yearlyChart = document.getElementById("yearlyChart").getContext('2d');

let yearPopChart = new Chart(yearlyChart, {
    type: 'line',
    data: {
        datasets: [{
            
            data: {
                
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


 */




</script>

@endsection