<?php
/**
 * Created by PhpStorm.
 * User: kristina
 * Date: 2/6/19
 * Time: 8:55 PM
 */

include 'BubbleSort.php';

$bubbleSort = new BubbleSort();

?>

<html>
<head>
    <title></title>
</head>
<body>
    <form action="index.php" method="post">
        <label>Please type a list of random numbers with comma separator </label>
        <input type="text" title="type a list of array" name="array_list">
        <input type="submit" name="submit">
    </form>

<script type="application/javascript">

</script>
</body>
</html>

<?php

echo "Sorted Array : \n";
echo $bubbleSort->getMySortedArray();

?>
