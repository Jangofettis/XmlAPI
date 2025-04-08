<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minfil</title>
</head>
<body>
    <form method="post" action="minfil.php">
        <label for="country">Välj en biltillverkare:</label>
        <select name='country' id='country'>
        <option value="">Välj en tillverkare</option>

        <?php echo "hej"; ?>
        <?php

            echo "<pre>";
            print_r($xmltext);
            echo "</pre>";

            $url = "https://wwwlab.webug.se/examples/XML/vehiclesservice/manufacturer/";
            $xmltext = file_get_contents($url);
            $xml = simplexml_load_string($xmltext);

            if ($xml && isset($xml->Manufacturer)) {
                foreach ($xml->Manufacturer as $manufacturer) {
                    $selected = (isset($_POST['country']) && $_POST['country'] == (string)$manufacturer->Country) ? 'selected' : '';
                    echo "<option value='{$manufacturer->Country}' $selected>{$manufacturer->Name}</option>";
                }
            } else {
                echo "<option>Inga tillverkare hittades</option>";
            }
        ?>
        </select>
        <input type="submit" value="Shurda">
    </form>
</body>
</html>