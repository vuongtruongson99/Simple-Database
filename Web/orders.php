<?php
include_once('connection.php');


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

    <?php
        if (isset($_GET["id"]) and !isset($_GET["details"])) {
            
            $sql = "SELECT * FROM заказ WHERE номер_клиент='" . $_GET["id"] . "'";
            $result = $mysqli->query($sql);
            echo '<table class="table table-striped text-center">';
            echo '<tr>';
            echo '<th colspan="10" ><h2>Список заказов пользователя</h2></th>';
            echo '</tr>';
            echo '<t>';
            echo '<th>Номер заказ</th>';
            echo '<th>Дата заказа</th>';
            echo '<th>Требуемая дата</th>';
            echo '<th>Дата доставки</th>';
            echo '<th>Статус</th>';
            echo '<th>Комментарии</th>';
            echo '</t>';

            foreach($result as $row) {
                echo '<tr>';
                echo '<td><a href="orders.php?details=' . $row['номер_заказ'] . '">' . $row['номер_заказ'] . '</a></td>';
                echo '<td>' . $row['дата_заказа'] . '</td>';
                echo '<td>' . $row['требуемая_дата'] . '</td>';
                echo '<td>' . $row['дата_доставки'] . '</td>';
                echo '<td>' . $row['статус'] . '</td>';
                echo '<td>' . $row['комментарии'] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        }
        else {
            $sql = "SELECT * FROM детальзаказ WHERE номер_заказ='". $_GET["details"] . "'";
            $result = $mysqli->query($sql); 
            echo '<table class="table table-striped text-center">';
            echo '<tr>';
            echo '<th colspan="10" ><h2>Деталь этого заказа</h2></th>';
            echo '</tr>';
            echo '<t>';
            echo '<th>Код товара</th>';
            echo '<th>Заказанное количество</th>';
            echo '<th>Цена каждого</th>';
            echo '<th>Сторки заказа</th>';
            echo '</t>';

            foreach($result as $row) {
                echo '<tr>';
                echo '<td><a href="product.php?id=' . $row['код_товара'] . '">' . $row['код_товара'] . '</a></td>';
                echo '<td>' . $row['заказанное_количество'] . '</td>';
                echo '<td>' . $row['цена_каждого'] . '</td>';
                echo '<td>' . $row['строки_заказа'] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        }
    ?>

</body>
</html>