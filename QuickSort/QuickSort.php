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
                $length = count($arr);


                return $this->quickSortArray($arr,  0, $length -1);
            }

        }
    }

    /**
     * @param $array
     * @param $low
     * @param $high
     * @return mixed
     */
    private function quickSortArray($array, $low, $high)
    {

        if ($low < $high) {

            $p = $this->partitionArray($array, $low, $high);


            //left side
            $this->quickSortArray($array, $low, $p-1);

            //right side
            $this->quickSortArray($array, $p + 1, $high);

        }

    }

    /**
     * @param $a
     * @param $l
     * @param $h
     * @return int
     */
    private function partitionArray($a, $l, $h)
    {


        $i = ($l - 1); //Index of smallest element
        $pivot = $a[$h];  //pivot

        for($j = $l; $j < $h; $j++) {
            if ($a[$j] <= $pivot) {

                //swaping
                $temp = $a[$i];

                $a[$i] = $a[$j];

                $a[$j] = $temp;

            }
        }


        $temp = $a[$i+1];
        $a[$i+1] = $a[$h];
        $a[$h] = $temp;

        return $a;
    }

    /**
     * Display array
     *
     * @return mixed
     */
    public function getMySortedArray()
    {
        $requestedArray = $this->requestArray();


        var_dump($requestedArray);

        return implode(', ', $requestedArray) . PHP_EOL;

    }

}