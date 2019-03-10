<?php
/**
 * Created by PhpStorm.
 * User: kristina
 * Date: 3/10/19
 * Time: 10:54 AM
 */

use app\models\BubbleSort;
use app\models\MergeSort;
use app\models\QuickSort;

require 'bootstrap.php';

$bubbleSort  = new BubbleSort();
$mergeSort = new MergeSort();
$quickSort = new QuickSort();

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
$executionStartTime = microtime(true);
echo "Sorted Array with BubbleSort : \n";
echo $bubbleSort->getMySortedArray() . ". \n";
echo $bubbleSort->executeScriptTime() . '</br>';

echo "Sorted Array with MergeSort : \n";
echo $mergeSort->getMySortedArray() . ". \n";
echo $mergeSort->executeScriptTime() . '</br>';

echo "Sorted Array with QuickSort : \n";
echo $quickSort->getMySortedArray() . ". \n";
echo $quickSort->executeScriptTime() . " </br>";
