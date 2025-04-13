<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minfil</title>
</head>
<body>
    <form method='post' action='response.php'>
        <?php
        $url="https://wwwlab.webug.se/examples/XML/vehiclesservice/manufacturer/";
        $tillverkare = file_get_contents($url);
        $data = json_decode($tillverkare);

        echo "<select name='manufactur'>";
        foreach ($data as $info) {
            $namn = $info[0];
            $land = $info[1];
            echo '<option value="' . $land . '">' . $namn . '</option>';
        }
        echo "</select>";
        ?>
        <input type='submit' value='Submit'>
    </form>
</body>
</html>
