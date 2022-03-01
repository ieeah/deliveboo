@extends('layouts.app')

@section('content')

<main class="statistics container mt-3">
    <h1 class="text-primary">Statistiche</h1>
    <div class="select">
        <h5 class="text-primary">Seleziona L'anno</h5>
        <div class="buttons">
            <button class="btn btn-primary btn-left"><i class="fa-solid fa-caret-left"></i></button>
            <div class="btn btn-primary btn-year"></div>
            <button class="btn btn-primary btn-right"><i class="fa-solid fa-caret-right"></i></button>
        </div>
    </div>
    <div class="chart">
        <h3 class="text-primary">Statistiche Numero Ordini per Mese</h3>
        <canvas id="monthlyChart" height="100" width="200"></canvas>

    </div>

    
    <div class="chart">
        <h3 class="text-primary">Statistiche Guadagni per Mese</h3>
        <canvas id="earningChart" height="100" width="200"></canvas>
    </div>

    <hr>
    
    
    <div class="chart">
        <h3 class="text-primary">Statistiche Numero Ordini per Anno</h3>
        <canvas id="yearlyChart" height="100" width="200"></canvas>
    </div>
</main>



@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
<script>


//Set Year
const orders = @json($orders);

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
let anno = [
    gennaio = [
        order = [],
        total_earn = 0,
    ],
    febbraio = [
        order = [],
        total_earn = 0,
    ],
    marzo = [
        order = [],
        total_earn = 0,
    ],
    aprile = [
        order = [],
        total_earn = 0,
    ],
    maggio = [
        order = [],
        total_earn = 0,
    ],
    giugno = [
        order = [],
        total_earn = 0,
    ],
    luglio = [
        order = [],
        total_earn = 0,
    ],
    agosto = [
        order = [],
        total_earn = 0,
    ],
    settembre = [
        order = [],
        total_earn = 0,
    ],
    ottobre = [
        order = [],
        total_earn = 0,
    ],
    novembre = [
        order = [],
        total_earn = 0,
    ],
    dicembre = [
        order = [],
        total_earn = 0,
    ],
];

function getMonthlyOrders() {
    //Reset month Array
    anno = [
        gennaio = [
            order = [],
            total_earn = 0,
        ],
        febbraio = [
            order = [],
            total_earn = 0,
        ],
        marzo = [
            order = [],
            total_earn = 0,
        ],
        aprile = [
            order = [],
            total_earn = 0,
        ],
        maggio = [
            order = [],
            total_earn = 0,
        ],
        giugno = [
            order = [],
            total_earn = 0,
        ],
        luglio = [
            order = [],
            total_earn = 0,
        ],
        agosto = [
            order = [],
            total_earn = 0,
        ],
        settembre = [
            order = [],
            total_earn = 0,
        ],
        ottobre = [
            order = [],
            total_earn = 0,
        ],
        novembre = [
            order = [],
            total_earn = 0,
        ],
        dicembre = [
            order = [],
            total_earn = 0,
        ],
    ];

    for (let i = 0; i < filteredOrder.length; i++) {
        const date = new Date(filteredOrder[i].created_at);
        const month = date.getUTCMonth() + 1;
        switch (month) {
            case 1: 
            anno[0][0].push(filteredOrder[i]);
            break;

            case 2:
            anno[1][0].push(filteredOrder[i]);
            break;

            case 3:
            anno[2][0].push(filteredOrder[i]);
            break;

            case 4:
            anno[3][0].push(filteredOrder[i]);
            break;

            case 5:
            anno[4][0].push(filteredOrder[i]);
            break;

            case 6:
            anno[5][0].push(filteredOrder[i]);
            break;

            case 7:
            anno[6][0].push(filteredOrder[i]);
            break;

            case 8:
            anno[7][0].push(filteredOrder[i]);
            break;

            case 9:
            anno[8][0].push(filteredOrder[i]);
            break;

            case 10:
            anno[9][0].push(filteredOrder[i]);
            break;

            case 11:
            anno[10][0].push(filteredOrder[i]);
            break;

            case 12:
            anno[11][0].push(filteredOrder[i]);
            break;     
        }
    }
}

getYearlyOrders();
getMonthlyOrders();
earnMonthly()

let monthlyChart = document.getElementById("monthlyChart").getContext('2d');

let massPopChart = new Chart(monthlyChart, {
    type: 'line',
    data: {
        datasets: [{
            label: [],
            data: {
                Gennaio: anno[0][0].length,
                Febbraio: anno[1][0].length,
                Marzo: anno[2][0].length,
                Aprile: anno[3][0].length,
                Maggio: anno[4][0].length,
                Giugno: anno[5][0].length,
                Luglio: anno[6][0].length,
                Agosto: anno[7][0],length,
                Settembre: anno[8][0].length,
                Ottobre: anno[9][0].length,
                Novembre: anno[10][0].length,
                Dicembre: anno[11][0].length,
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
        Gennaio: anno[0][0].length,
        Febbraio: anno[1][0].length,
        Marzo: anno[2][0].length,
        Aprile: anno[3][0].length,
        Maggio: anno[4][0].length,
        Giugno: anno[5][0].length,
        Luglio: anno[6][0].length,
        Agosto: anno[7][0].length,
        Settembre: anno[8][0].length,
        Ottobre: anno[9][0].length,
        Novembre: anno[10][0].length,
        Dicembre: anno[11][0].length,
    };
    massPopChart.update()

    massEarnChart.data.datasets[0].data = {
        Gennaio: anno[0][1],
        Febbraio: anno[1][1],
        Marzo: anno[2][1],
        Aprile: anno[3][1],
        Maggio: anno[4][1],
        Giugno: anno[5][1],
        Luglio: anno[6][1],
        Agosto: anno[7][1],
        Settembre: anno[8][1],
        Ottobre: anno[9][1],
        Novembre: anno[10][1],
        Dicembre: anno[11][1], 
    };
    massEarnChart.update()
}

buttonLeft.addEventListener('click', function() {
    currentYear-- 
    buttonYear.innerHTML = `${currentYear}`;
    getYearlyOrders();
    getMonthlyOrders();
    earnMonthly();
    updateChart();
})

buttonRight.addEventListener('click', function() {
    currentYear++
    buttonYear.innerHTML = `${currentYear}`;
    getYearlyOrders();
    getMonthlyOrders();
    earnMonthly();
    updateChart();
})



//YEARLY CHART
let year2022 = []
let year2023 = []
let year2024 = []
let year2025 = []
let year2026 = []

for ( let i = 0; i < orders.length; i++) {
    const date = new Date(orders[i].created_at);
    const year = date.getUTCFullYear();
    switch (year) {
        case 2022:
            year2022.push(orders[i]);
            break;
        case 2023:
            year2023.push(orders[i]);
            break;
        case 2024:
            year2024.push(orders[i]);
            break;
        case 2025:
            year2025.push(orders[i]);
            break;
        case 2026:
            year2026.push(orders[i]);
            break;
    }
}

let yearlyChart = document.getElementById("yearlyChart").getContext('2d');

let massYearChart = new Chart(yearlyChart, {
    type: 'line',
    data: {
        datasets: [{
            label: [],
            data: {
                2022: year2022.length,
                2023: year2023.length,
                2024: year2024.length,
                2025: year2025.length,
                2026: year2026.length, 
            },
            backgroundColor: [
                'rgba(0, 100, 0, 0.7)',
            ],
            borderColor: [
                'rgba(0, 100, 0, 0.7)',
            ] 
        }], 
    },
    options: {
    },
})


//EARN MONTHLY
function earnMonthly() {
    anno.forEach(e => {
    e[0].forEach(mese => {
        e[1] += parseInt(mese.total_price);
    })
})
}

let earningChart = document.getElementById('earningChart').getContext('2d');

let massEarnChart = new Chart(earningChart, {
    type: 'bar',
    data: {
        datasets: [{
            label: [],
            data: {
                Gennaio: anno[0][1],
                Febbraio: anno[1][1],
                Marzo: anno[2][1],
                Aprile: anno[3][1],
                Maggio: anno[4][1],
                Giugno: anno[5][1],
                Luglio: anno[6][1],
                Agosto: anno[7][1],
                Settembre: anno[8][1],
                Ottobre: anno[9][1],
                Novembre: anno[10][1],
                Dicembre: anno[11][1], 
            },

            backgroundColor: [
                'rgba(200, 0, 0, 0.7)',
            ],
            borderColor: [
                'rgba(200, 0, 0, 0.7)',
            ] 
        }], 
    },
    options: {
    },
})

</script>

@endsection