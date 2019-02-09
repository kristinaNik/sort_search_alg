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
     * @var array
     */
    private $arr;

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


    public function sortArray($array)
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


    public function merge($left, $right)
    {
        $res = array();

        while (count($left) > 0 && count($right) > 0)
        {
            if($left[0] > $right[0])
            {
                $res[] = $right[0];
                $right = array_slice($right , 1);
            }
            else
            {
                $res[] = $left[0];
                $left = array_slice($left, 1);
            }
        }

        while (count($left) > 0)
        {
            $res[] = $left[0];
            $left = array_slice($left, 1);
        }

        while (count($right) > 0)
        {
            $res[] = $right[0];
            $right = array_slice($right, 1);
        }


        return $res;
    }

    /**
     * Display array
     *
     * @return mixed
     */
    public function getMySortedArray()
    {
        $requestedArray = $this->requestArray();
        $sortArray =  $this->sortArray($requestedArray);

        return implode(', ', $sortArray) . PHP_EOL;

    }
}