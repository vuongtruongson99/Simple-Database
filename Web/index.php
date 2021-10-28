<?php
include_once('connection.php');

$number_per_page = 15;

if (isset($_GET["page"])) {
    $page = $_GET["page"];
}
else {
    $page = 1;
}

$start_from = ($page - 1) * $number_per_page;
$sql = "SELECT * FROM клиенты limit $start_from, $number_per_page";
$result = $mysqli->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Simple web for car sale!</title>
</head>
<body>
    <?php include "navigation.html" ?>


    <table class="table table-striped text-center">
        <tr>
            <th colspan="10" ><h2>Список клиенты</h2></th>
        </tr>
        <t>
            <th>Номер клиент</th>
            <th>Номер работник</th>
            <th>Имя клиента</th>
            <th>Контакная фамилия</th>
            <th>Контакная иия</th>
            <th>Телефон</th>
            <th>Адресс 1</th>
            <th>Адресс 2</th>
            <th>Город</th>
            <th>Государство</th>
        </t>
    <?php
        foreach($result as $row) 
        {
    ?>        
        <tr>
            <td><a href="orders.php?id=<?php echo $row['номер_клиент'] ?>"><?php echo $row['номер_клиент'] ?></a></td>
            <td><a href="employee.php?id=<?php echo $row['номер_работник'] ?>"><?php echo $row['номер_работник'] ?></a></td>
            <td><?php echo $row['имя_клиента'] ?></td>
            <td><?php echo $row['контакная_фамилия'] ?></td>
            <td><?php echo $row['контакная_иия'] ?></td>
            <td><?php echo $row['телефон'] ?></td>
            <td><?php echo $row['адресс1'] ?></td>
            <td><?php echo $row['адресс2'] ?></td>
            <td><?php echo $row['город'] ?></td>
            <td><?php echo $row['государство'] ?></td>
        </tr>
    <?php
        }
    ?>
    </table>
    
    <p class="text-center">
    <?php 
    
    
        $sql = "select * from клиенты";
        $result= $mysqli->query($sql);
        $total_records = $result->num_rows;
        $total_pages=ceil($total_records/$number_per_page);
        
        for($i=1;$i<=$total_pages;$i++)
        {
            echo "<a class='btn btn-primary mr-1' role='button' href='index.php?page=".$i."'>".$i."</a>" ;
        }
        
    ?>
    </p>
</body>
</html>