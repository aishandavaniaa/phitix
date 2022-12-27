<?php

// Connect to the database
$server 	= "localhost";
$username 	= "root";
$password 	= "";
$db 		= "ternak_ayam";
$koneksi = mysqli_connect($server, $username, $password, $db);

// Execute a SQL query to retrieve the data
$query = "SELECT * FROM distribusi";
$result = $koneksi->query($query);

// Iterate through the results and store the data in an array
$data = array();
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $data[] = $row;
}

// Close the connection
$conn = null;

?>

<!-- Include the Chart.js library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

<!-- Create a chart element in the HTML page -->
<canvas id="myChart"></canvas>

<!-- Create the chart using the data from the database -->
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for the chart
    data: {
        labels: [<?php foreach ($data as $row) { echo '"' . $row['label'] . '",'; } ?>],
        datasets: [{
            label: 'My Data',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [<?php foreach ($data as $row) { echo $row['value'] . ','; } ?>]
        }]
    },

    // Configuration options go here
    options: {}
});
</script>