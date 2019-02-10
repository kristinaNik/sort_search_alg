<?php
/**
 * Created by PhpStorm.
 * User: kristina
 * Date: 2/9/19
 * Time: 6:34 PM
 */

class QuickSort
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

                return $this->quickSortArray($arr);
            }

        }

    }

    /**
     * @param $array
     * @return array
     */
    private function quickSortArray($array)
    {

        // find array size
        $l = count($array);

        // base case test, if array of length 0 then just return array to caller
        if($l <= 1){
            return $array;
        }
        else {

            // select an item to act as our pivot point, since list is unsorted first position is easiest
            $pivot = $array[0];

            // declare our two arrays to act as partitions
            $left = $right = [];

            // loop and compare each item in the array to the pivot value
            //smallest go from left side and biggest go from right side
            for($i = 1; $i < count($array); $i++)
            {
                if($array[$i] < $pivot){
                    $left[] = $array[$i];
                }
                else{
                    $right[] = $array[$i];
                }
            }

            // use recursion to now sort the left and right lists
            return array_merge($this->quickSortArray($left), [$pivot], $this->quickSortArray($right));

        }

    }


    /**
     * Display array
     *
     * @return mixed
     */
    public function getMySortedArray()
    {
        $requestedArray = $this->requestArray();

        return implode(', ', $requestedArray) . PHP_EOL;

    }

}