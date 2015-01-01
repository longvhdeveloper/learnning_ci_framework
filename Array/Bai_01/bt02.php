<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
<?php
if (isset($_POST['fsubmit'])) {
    $point = 0;
    foreach ($_POST['question'] as $value) {
        $point += $value;
    }

    if ($point > 7) {
        echo 'Bạn là một lập trình viên tốt<br/>';
    } else {
        echo 'Bạn cần cố gắng nhiều hơn<br/>';
    }
}

$questions = array(
    "1" => "Tại sao phải học PHP ?",
    "2" => "Bạn có tự tin vào khả năng PHP của mình"
);

$answers = array(
    "1" => array(
        array(
            'point' => 5,
            'answer' => 'Để có việc làm'
        ),
        array(
            'point' => 3,
            'answer' => 'Để làm đồ án trên trường'
        ),
        array(
            'point' => 1,
            'answer' => 'Học cho vui'
        )
    ),

    "2" => array(
        array(
            'point' => 5,
            'answer' => 'Rất tự tin'
        ),
        array(
            'point' => 3,
            'answer' => 'Không tự tin lắm'
        ),
        array(
            'point' => 1,
            'answer' => 'Rất mơ hồ'
        )
    )
);

foreach ($questions as $key => $question) {
    echo '<div>';
    echo $key . '.' . $question;
    foreach ($answers[$key] as $items) {
        echo '<ul style="list-style-type:none;">';
        echo '<li><input type="radio" name="question['.$key.']" value="'.$items['point'].'"/>&nbsp;'.$items['answer'].'</li>';
        echo '</ul>';
    }
    echo '</div>';
}
?>
<input type="submit" name="fsubmit" value="Send">
</form>
</body>
</html>
