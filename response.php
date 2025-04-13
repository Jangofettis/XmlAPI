<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>taemot</title>
</head>
<body>
<table border="1">
<?php

if (isset($_POST['manufactur'])) {
    $land = $_POST['manufactur'];
} else {
    $land = "Ingen tillverkare vald";
}

$url = "https://wwwlab.webug.se/examples/XML/vehiclesservice/vehicles/?country=$land";
$tillverkare = file_get_contents($url);
$data = json_decode($tillverkare, true);

if ($data) {
    echo "<tr><th>Company</th><th>Vehicles</th></tr>";

    foreach ($data as $entry) {
        $company = isset($entry[0]) ? $entry[0] : "N/A";
        $vehicles = isset($entry[1]) ? $entry[1] : []; 

        echo "<tr>";
        echo "<td>" . $company . "</td>";
        echo "<td>";
        echo "<table border='1'>"; 
        echo "<tr><th>Name</th><th>Config</th><th>HP</th><th>Produced</th><th>Image</th></tr>";

        foreach ($vehicles as $vehicle) {
            $name = $vehicle[0];
            $config = $vehicle[1];
            $hp = $vehicle[2];
            $produced = $vehicle[3];
            $image = $vehicle[4];

            echo "<tr>";
            echo "<td>$name</td>";
            echo "<td>$config</td>";
            echo "<td>$hp</td>";
            echo "<td>$produced</td>";
            echo "<td>";
            if ($image) {
                echo "<img src='https://wwwlab.webug.se/examples/XML/vehicleImages/$image' alt='$name' style='width:100px;height:auto;'>";
            } else {
                echo "No Image";
            }
            echo "</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='2'>Ingen data hittades för landet: $land</td></tr>";
}
?>
</table>
</body>
</html>                                                                                                                                                    

