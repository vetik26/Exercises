<?php

require_once 'vendor/autoload.php';
use App\Info;

$info = new Info('https://data.gov.lv/dati/dataset/5d0c9a64-b7b2-494e-b77d-22d48225791b/resource/8ea0ee31-1bea-4336-bbe4-2e66ccdadd1b/download/covid_19_valstu_saslimstibas_raditaji.csv');
$records = $info->getRecords();


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Covid</title>
</head>
<body>
    <table class="table">
        <tbody>
        <?php foreach ($records as $record): ?>
            <tr>
                <th scope="row"><?php echo $record['Datums']; ?></th>
                <td><?php echo $record['Valsts']; ?></td>
                <td><?php echo $record['14DienuKumulativaIncidence']; ?></td>
                <td><?php echo $record['Pasizolacija']; ?></td>
                <td><?php echo $record['PersIrVakcParslSert_PasizolacijaLatvija']; ?></td>
                <td><?php echo $record['PersIrVakcParslSert_TestsPirmsIebrauksanasLV']; ?></td>
                <td><?php echo $record['PersIrVakcParslSert_TestsPecIebrauksanasLV']; ?></td>
                <td><?php echo $record['CitasPersonas_PasizolacijaLatvija']; ?></td>
                <td><?php echo $record['CitasPersonas_TestsPirmsIebrauksanasLV']; ?></td>
                <td><?php echo $record['CitasPersonas_TestsPecIebrauksanasLV']; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
