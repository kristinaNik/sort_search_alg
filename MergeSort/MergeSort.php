<?php
/**
 * Created by PhpStorm.
 * User: kristina
 * Date: 2/7/19
 * Time: 8:26 PM
 */

class MergeSort
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

                return $this->sortArray(explode(',',$c));
            }

        }
    }

    /**
     * Divide array into sub arrays
     * Make recursive call until we are left with one element in the sub list
     *
     * @param $array
     * @return array
     */
    private function sortArray($array)
    {

        if(count($array) == 1 ) {
            return  $array;
        }

        $mid = count($array) / 2;
        $left = array_slice($array ,0, $mid);
        $right = array_slice($array, $mid);

        $left = $this->sortArray($left);
        $right = $this->sortArray($right);

        return $this->merge($left, $right);
    }


    /**
     * Merge the sub arrays(left and right) into the original list of array
     *
     * @param $a - left sub array
     * @param $b - right sub array
     * @return array
     */
    private function merge($a, $b)
    {
        $result = [];
        $i = 0; //Index of last element in array b
        $j = 0; //Index of last element in array a

        //Start comparing from the last element and merge a and b
        while (count($a) > 0 && count($b) > 0)
        {

            if($a[$i] > $b[$j])
            {
                $result[] = $b[$i];
                $b = array_slice($b , 1);
            }
            else
            {
                $result[] = $a[$j];
                $a = array_slice($a, 1);
            }
        }

        while (count($a) > 0)
        {
            $result[] = $a[$j];
            $a = array_slice($a, 1);
        }

        while (count($b) > 0)
        {
            $result[] = $b[$i];
            $b = array_slice($b, 1);
        }


        return $result;
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