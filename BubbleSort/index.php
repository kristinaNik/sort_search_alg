<?php
/**
 * Created by PhpStorm.
 * User: kristina
 * Date: 2/6/19
 * Time: 8:55 PM
 */

include 'BubbleSort.php';

echo "Original Array : \n";
echo implode(', ',[1,4,3,2,6,5,7,8,9,-1] ) . '<br>';

$bubbleSort = new BubbleSort();
$bubbleSort->setMyArray([1,4,3,2,6,5,7,8,9,-1]);

echo "Sorted Array : \n";
echo $bubbleSort->getMyArray();