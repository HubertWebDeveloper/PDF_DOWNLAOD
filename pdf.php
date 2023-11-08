<?php
require_once 'vendor/autoload.php';
use Dompdf\Dompdf;

$con = new PDO('mysql:host=localhost;dbname=database','root','');
$slq = 'SELECT * FROM registration';
$stmt = $con->prepare($slq);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
$i =0;

$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    h2{
        text-align:center;
        font-weight:bold;
    }
    table{
        border-collapse:collapse;
        width:100%;
    }
    td,th{
        border: 1px solid grey;
        padding:8px;
    }
    .my-table{
        text-align:center;
        color: grey;
        font-weight:normal;
    }
</style>
<body>
    <h2>Report Title here</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
            </tr>
        </thead>
        <tbody>';
        foreach ($rows as $row){
            $i++;
            $html .= '
            <tr>
                <td>'.$i.'</td>
                <td>'.$row['username'].'</td>
                <td>'.$row['email'].'</td>
                <td>'.$row['password'].'</td>
            </tr>';
        }
        $html .= '
        </tbody>
        <tr>
            <th colspan="4" class="my-table">This Report has autolized by hubert hirwa.</th>
        </tr>
    </table>
</body>
</html>';

$dompdf = new Dompdf;
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream('Report.pdf');
?>

            
        