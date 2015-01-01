<?php
$students = array(
    '001' => array(
        'name' => 'Jackie',
        'address' => '1 Nam ky Khoi Nghia',
        'phone' => '0987654321',
        'point' => array(
            'sub1' => '10',
            'sub2' => '10',
            'sub3' => '10'
        )
    ),

    '002' => array(
        'name' => 'Anna',
        'address' => '16 Le Loi',
        'phone' => '098765322',
        'point' => array(
            'sub1' => '8',
            'sub2' => '8',
            'sub3' => '9'
        )
    ),

    '003' => array(
        'name' => 'Lena',
        'address' => '165 Ba Chieu',
        'phone' => '098764321',
        'point' => array(
            'sub1' => '9',
            'sub2' => '3',
            'sub3' => '7'
        )
    ),

    '004' => array(
        'name' => 'Vicky',
        'address' => '24 Ngo Quyen',
        'phone' => '093764322',
        'point' => array(
            'sub1' => '6',
            'sub2' => '7',
            'sub3' => '8'
        )
    ),
);
?>
<table width="100%" border="1">
    <thead>
        <tr>
            <th>SVID</th>
            <th>SVName</th>
            <th>SVAdress</th>
            <th>SVPhone</th>
            <th>SVM1</th>
            <th>SVM2</th>
            <th>SVM3</th>
            <th>DTB</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($students as $id => $student) {
            echo '<tr>';
            echo '<td>'.$id.'</td>';
            echo '<td>' . $student['name'] . '</td>';
            echo '<td>' . $student['address'] . '</td>';
            echo '<td>' . $student['phone'] . '</td>';

            $sub1 = $student['point']['sub1'];
            $sub2 = $student['point']['sub2'];
            $sub3 = $student['point']['sub3'];

            $dtb = round(($sub1 + $sub2 + $sub3) / 3, 2);

            echo '<td>' . $sub1 . '</td>';
            echo '<td>' . $sub2 . '</td>';
            echo '<td>' . $sub3 . '</td>';
            echo '<td>' . $dtb . '</td>';

            echo '</tr>';
        }
        ?>
    </tbody>
</table>