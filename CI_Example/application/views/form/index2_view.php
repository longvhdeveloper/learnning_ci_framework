<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Book</title>
</head>
<body>
<?php
echo validation_errors();
echo form_open(base_url() . 'index.php/form/index2');
echo form_fieldset('Book Information');
?>
    <table>
        <tbody>

<?php
echo '<tr>';
echo '<td>' . form_label('Name') . '</td>';
$name = array(
    'name' => 'fname',
    'size' => 25
);
echo '<td>' . form_input($name) . '</td>';
echo '</tr>';

echo '<tr>';
echo '<td>' . form_label('ISBN') . '</td>';
$isbn = array(
    'name' => 'fisbn',
    'size' => 25
);
echo '<td>'.form_input($isbn).'</td>';
echo '</tr>';

echo '<tr>';
echo '<td>' . form_label('Price') . '</td>';
$price = array(
    'name' => 'fprice',
    'size' => 25
);
echo '<td>'.form_input($price).'</td>';
echo '</tr>';

echo '<tr>';
echo '<td>' . form_label('Status') . '</td>';
$statusList = array(
    '1' => 'Enable',
    '2' => 'Disable'
);
echo '<td>'.form_dropdown('fstatus', $statusList, 1).'</td>';
echo '</tr>';

echo '<tr><td></td><td>'.form_submit('fsubmit', 'Add book').'</td></tr>';
?>
        </tbody>
    </table>
<?php
echo form_fieldset_close();
echo form_close();
?>
</body>
</html>