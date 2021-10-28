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
    
    if (!isset($_GET["type"]) and !isset($_GET["id"])) {       
        $number_per_page = 15;

        if (isset($_GET["page"])) {
            $page = $_GET["page"];
        }
        else {
            $page = 1;
        }

        $start_from = ($page - 1) * $number_per_page;
        $sql = "SELECT * FROM тип_продукты limit $start_from, $number_per_page";
        $result = $mysqli->query($sql);

        echo '<table class="table table-striped text-center">';
        echo '<tr>';
        echo '<th colspan="10" ><h2>Список Продукты</h2></th>';
        echo '</tr>';
        echo '<t>';
        echo '<th>Тип Продукты</th>';
        echo '<th>Описание</th>';
        echo '<th>Изображение</th>';
        echo '</t>';

        foreach($result as $row) {
            echo '<tr>';
            echo "<td><a href='product.php?type=". $row['тип_продукт']."'>" . $row['тип_продукт'] . "</a></td>";   
            echo '<td>'. $row["текстовое_описание"] . '</td>';
            echo '<td>' . $row["изображение"].'</td>';
            echo '</tr>';
        }

        echo '</table>';
        echo '<p class="text-center">';
        $sql = "select * from офис";
        $result= $mysqli->query($sql);
        $total_records = $result->num_rows;
        $total_pages=ceil($total_records/$number_per_page);
        
        for($i=1;$i<=$total_pages;$i++)
        {
            echo "<a class='btn btn-primary mr-1' role='button' href='product.php?page=".$i."'>".$i."</a>" ;
        }
    }
    else if (isset($_GET["type"]) and !isset($_GET["id"])) {
        $number_per_page = 15;

        if (isset($_GET["page"])) {
            $page = $_GET["page"];
        }
        else {
            $page = 1;
        }

        $types = $_GET["type"];
        $start_from = ($page - 1) * $number_per_page;
        $sql = "SELECT * FROM товар WHERE тип_продукт='" . $types . "' LIMIT $start_from, $number_per_page";
        $result = $mysqli->query($sql);

            echo '<table class="table table-striped text-center">';
            echo '<tr>';
            echo '<th colspan="10" ><h2>Список Товар</h2></th>';
            echo '</tr>';
            echo '<t>';
            echo '<th>Код товара</th>';
            echo '<th>Наименование</th>';
            echo '<th>Шкала</th>';
            echo '<th>Продавец</th>';
            echo '<th>Описание</th>';
            echo '<th>Количество на складе</th>';
            echo '<th>Цена покупки</th>';
            echo '<th>MSRP</th>';
            echo '</t>';

            foreach($result as $row) {
                echo '<tr>';
                echo '<td>'. $row["код_товара"] . '</td>';
                echo '<td>'. $row["наименование_товара"] . '</td>';
                echo '<td>' . $row["шкала_товара"].'</td>';
                echo '<td>' . $row["продавец_товар"].'</td>';
                echo '<td>' . $row["описание_товар"].'</td>';
                echo '<td>' . $row["количество_на_складе"].'</td>';
                echo '<td>' . $row["цена_покупки"].'</td>';
                echo '<td>' . $row["MSRP"].'</td>';
                echo '</tr>';
            }

            echo '</table>';
            echo '<p class="text-center">';
            $sql = "select * from офис";
            $result= $mysqli->query($sql);
            $total_records = $result->num_rows;
            $total_pages=ceil($total_records/$number_per_page);
            
            for($i=1;$i<=$total_pages;$i++)
            {
                echo "<a class='btn btn-primary mr-1' role='button' href='product.php?page=".$i."'>".$i."</a>" ;
            }
    }
    else {
        $id_product = $_GET["id"];
        $sql = "SELECT * FROM товар WHERE код_товара='" . $id_product . "'";
        $result = $mysqli->query($sql);

            echo '<table class="table table-striped text-center">';
            echo '<tr>';
            echo '<th colspan="10" ><h2>Деталь продукта</h2></th>';
            echo '</tr>';
            echo '<t>';
            echo '<th>Код товара</th>';
            echo '<th>Наименование</th>';
            echo '<th>Шкала</th>';
            echo '<th>Продавец</th>';
            echo '<th>Описание</th>';
            echo '<th>Количество на складе</th>';
            echo '<th>Цена покупки</th>';
            echo '<th>MSRP</th>';
            echo '</t>';

            foreach($result as $row) {
                echo '<tr>';
                echo '<td>'. $row["код_товара"] . '</td>';
                echo '<td>'. $row["наименование_товара"] . '</td>';
                echo '<td>' . $row["шкала_товара"].'</td>';
                echo '<td>' . $row["продавец_товар"].'</td>';
                echo '<td>' . $row["описание_товар"].'</td>';
                echo '<td>' . $row["количество_на_складе"].'</td>';
                echo '<td>' . $row["цена_покупки"].'</td>';
                echo '<td>' . $row["MSRP"].'</td>';
                echo '</tr>';
            }

            echo '</table>';
    }
    ?>

</body>
</html>