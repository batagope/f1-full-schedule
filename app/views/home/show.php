<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Create New Formula 1 Race</title>
</head>
<!-- kreirati layout fajl od ovog dela i onda u body delu ubacivati razlicite delove stranica -->
<body>
    <div class="container">
        <?php
        // da ne bismo koristili $data['race], kreira'emo promenljivu $race
        // pogledati ispod deo sa extractom, mozemo i to da pokusamo
        $race = $data['race'];
        ?>
        <h1><?php echo $race->name ?></h1>

        <!-- zasad cemo ubaciti tabelu, ali kasnije cemo napraviti nesto slicno kao na sajtu formule 1 -->
        <table class="table table-bordered table-striped">
            <tr>
                <td>Name:</td>
                <td><?php echo $race->name ?></td>
            </tr>
            <tr>
                <td>Country:</td>
                <td><?php echo $race->country ?></td>
            </tr>
            <tr>
                <td>Date:</td>
                <td><?php echo date("d M Y", strtotime($race->start_date)) . ' - ' . date("d M Y", strtotime($race->end_date)) ?></td>
            </tr>
            <tr>
                <td>Laps:</td>
                <td><?php echo $race->laps ?></td>
            </tr>
            <tr>
                <td>Winner:</td>
                <td><?php echo empty($race->winner) ? "/" : $race->winner ?></td>
            </tr>
            <tr>
                <td>Constructor Winner:</td>
                <td><?php echo empty($race->constructor_winner) ? "/" : $race->constructor_winner ?></td>
            </tr>
        </table>

        <a class="btn btn-primary" href="/home/index" role="button">Back</a>

    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
/*
function includeWithVariables($filePath, $variables = array(), $print = true)
{
    $output = NULL;
    if(file_exists($filePath)){
        // Extract the variables to a local namespace
        extract($variables);

        // Start output buffering
        ob_start();

        // Include the template file
        include $filePath;

        // End buffering and return its contents
        $output = ob_get_clean();
    }
    if ($print) {
        print $output;
    }
    return $output;

}


./index.php :

includeWithVariables('header.php', array('title' => 'Header Title'));

./header.php :

<h1><?php echo $title; ?></h1>


?>
*/