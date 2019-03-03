<?php
/**
 * Created by PhpStorm.
 * User: kristina
 * Date: 2/13/19
 * Time: 9:24 PM
 */

class BinarySearch
{

    /**
     * Get the requested list
     *
     * @return mixed
     */
    public function requestArray() {

        if (isset($_POST['submit'])) {
            $chosenArrays = [$_POST['array_list']];

            foreach ($chosenArrays as $c) {

                $arr = explode(',', $c);
                $target = $arr[array_rand($arr)];

               return $this->binarySearchAlg($arr, $target);
            }

        }

    }


    private function binarySearchAlg($array, $target) {

        $left = 0;
        $right = count($array) - 1;


        while($left <= $right) {
            $middle = ($left + $right)/2;
            if ($array[$middle] < $target) {
                $left = $middle +1;
            } else {
                $right = $middle;
            }

        }
        return $left;


    }

    /**
     * Display array
     *
     * @return mixed
     */
    public function getMyBinarySearch()
    {
        $requestedArray = $this->requestArray();

        return implode(', ', $requestedArray) . PHP_EOL;

    }

}