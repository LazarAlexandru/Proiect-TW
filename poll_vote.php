<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" href="./styleCoins.css" type="text/css">
</head>

<body>
    <?php
    $vote = $_REQUEST['vote'];

    $filename = "poll_result.txt";
    $content = file($filename);

    $array = explode("||", $content[0]);
    $yes = $array[0];
    $no = $array[1];

    if ($vote == 0) {
        $yes = $yes + 1;
    }
    if ($vote == 1) {
        $no = $no + 1;
    }

    $insertvote = $yes . "||" . $no;
    $fp = fopen($filename, "w");
    fputs($fp, $insertvote);
    fclose($fp);
    ?>
    <div>
        <p> Result: </p>

        <p>Yes:
            <img src="background.jpg" width='<?php echo (100 * round($yes / ($no + $yes), 2)); ?>' height='20'>
            <?php echo (100 * round($yes / ($no + $yes), 2)); ?>% </p>

        <p>No:
            <img src="background.jpg" width='<?php echo (100 * round($no / ($no + $yes), 2)); ?>' height='20'>
            <?php echo (100 * round($no / ($no + $yes), 2)); ?>% </p>
    </div>
</body>

</html>