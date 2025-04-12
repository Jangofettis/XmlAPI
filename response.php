<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>taemot</title>
</head>
<body>
    
<html>                                                                                                                                                
<body>                                                                                                                                                
<table border="1">
    <?php

    if (isset($_POST['manufactur'])) {
        $land = $_POST['manufactur'];
    }else{
        $land = "Ingen tillverkare vald";
    }

    $url="https://wwwlab.webug.se/examples/XML/vehiclesservice/vehicles/?country=£land";
    $tillverkare = file_get_contents($url);
    $data = json_decode($tillverkare);

    echo "<tr><td>Tillverkare</td><td>Land</td></tr>";
    echo "<tr>";

    echo "<td>" . $land . "</td>";
    foreach ($data as $land) {
        echo "<td>";
        echo "<table>";
        echo "<tr><td>".$info[1]."</td><td>"; 
        echo "<tr><td>".$info[2]."</td></tr>";
        echo "</table>";
        echo "</td>";
    }
    echo "</tr>";


    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    ?>
</table>
    
</body>                                                                                                                                               
</html>                                                                                                                                               

