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
     * Select a pivot and partition the array around that pivot
     * Smallest items go from the left side and biggest go from the the right side until we sort them all
     *
     * @param $array
     * @return array
     */
    private function quickSortArray($array)
    {

        // find array size
        $l = count($array);

        // if array size is greater than 1, then start partitioning
        if($l > 1){

            // picks an element as pivot
            $pivot = $array[0];


            // declare left side
            $left = [];

            //declare right side
            $right = [];

            //loop and compare each item in the array to the pivot value
            //smallest go from the left side and biggest go from the the right side
            for($i = 1; $i < count($array); $i++)
            {
                if($array[$i] <= $pivot){
                    $left[] = $array[$i];
                }
                else{
                    $right[] = $array[$i];
                }
            }

            //recursive call to now sort the left and right lists and then merge them along around the picked pivot
            return array_merge($this->quickSortArray($left), [$pivot], $this->quickSortArray($right));

        } else {
            return $array;
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
         if (!empty($requestedArray))  {
             return implode(', ', $requestedArray) . PHP_EOL;
         } else {
             return 'Empty data';
         }


    }

}