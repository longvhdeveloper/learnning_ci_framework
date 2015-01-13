<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Cart info</title>
<style type="text/css">
    th, td{
        border: 1px solid blue;
    }
    
    th {
        background : blue;
        color: white;
    }
    td{
        text-align: center;
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
<form action="<?php echo base_url();?>index.php/book/update" method="post">
    <table style="width: 500px;">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Money</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
        foreach ($shop as $item) {
            echo '<tr>';
            echo '<td><input type="hidden" name="'.$i.'[rowid]" value="'.$item['rowid'].'" />'.$item['name'].'</td>';
            echo '<td>'.$item['price'].'</td>';
            echo '<td><input type="text" size="5" value="'.$item['qty'].'" name="'.$i.'[qty]" /></td>';
            echo '<td>'.($item['price'] * $item['qty']).'</td>';
            echo '<td><a href="'.base_url().'index.php/book/deleteone/'.$item['id'].'">Delete</a></td>';
            echo '</tr>';
            $i++;
        } 
        ?>
        <tr>
            <td colspan="3">Total</td>
            <td colspan="2"><?php echo $this->cart->total(); ?></td>
        </tr>
        </tbody>
    </table>
    <input type="submit" name="fsubmit" value="Update" />
</form>
</body>
</html>