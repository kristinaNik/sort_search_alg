<?php
/**
 * Created by PhpStorm.
 * User: kristina
 * Date: 2/7/19
 * Time: 8:26 PM
 */
namespace app\models;

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
        $i = 0; //left index
        $j = 0; //right index

        //Start comparing from left elements with the right and merge a and b
        while ($i < count($a) &&  $j < count($b))
        {

            if($a[$i] > $b[$j])
            {
                //Push right list
                $result[] = $b[$j];
                $j++;

            }
            else
            {
                //Push left list
                $result[] = $a[$i];
                $i++;
            }
        }


        while ($i < count($a))
        {
            //Push left list
            $result[] = $a[$i];
            $i++;
        }

        while ($j < count($b))
        {
            //Push right list
            $result[] = $b[$j];
            $j++;
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
        if (!empty($requestedArray)) {
            return implode(', ', $requestedArray) . PHP_EOL;
        } else {
            return 'Empty data';
        }
    }

    /**
     * Track execution time
     *
     * @return string
     */
    public function executeScriptTime() {
        $executionTime = microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"];

        return "It took " . $executionTime . " seconds!";
    }
}