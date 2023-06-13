<div>
    @if ($chartData)
        <h3 class="text-lg font-semibold">Registros de entrenamiento</h3>
        @if (count($chartData) > 0)
        <canvas id="barChart"></canvas>



        @else
            <p>Sin registros de entrenamiento, ¡comienza a entrenar!</p>
        @endif

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
//no carga el vite
var ctx = document.getElementById('barChart').getContext('2d');

var chartData = <?php echo json_encode($chartData); ?>;

// Opciones de configuración de la gráfica
var chartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
        y: {
            beginAtZero: true,
            ticks: {
                precision: 0
            }
        }
    }
};

// Crear la gráfica de barras
var barChart = new Chart(ctx, {
    type: 'bar',
    data: chartData,
    options: chartOptions
});
        </script>
    @else
        <p>Cargando...</p>
    @endif
</div>