<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>List book</title>
<style type="text/css">
    th, td{
        border: 1px solid blue;
    }
    
    th {
        background : blue;
        color: white;
    }
    a{
        color: #FF6600;
        text-decoration: none;
    }
    a:hover{
        color: #FF9900;
    }
</style>
</head>
<body>
    <table style="width: 500px;">
        <thead>
            <tr>
                <th>Name</th>
                <th>ISBN</th>
                <th>Price</th>
                <th>Order</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach ($books as $book) {
            echo '<tr>';
            echo '<td>'.$book['name'].'</td>';
            echo '<td>'.$book['isbn'].'</td>';
            echo '<td>'.$book['price'].'</td>';
            echo '<td><a href="'.base_url().'index.php/book/insert/'.$book['id'].'">Order</a></td>';
            echo '</tr>';
        } 
        ?>
        </tbody>
    </table>
</body>
</html>