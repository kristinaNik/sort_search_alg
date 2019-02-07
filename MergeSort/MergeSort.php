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
                return $c;
            }

        }
    }


    /**
     * Divide the array in 2
     *
     * @param $arrayList
     * @return array
     */
    public function sortArray($arrayList)
    {
        $this->arr = explode(',', $arrayList);


        if(count($this->arr) == 1 ) {
            return $this->arr;
        }


        $midEl = count($this->arr) / 2;

        $leftEl = array_slice($this->arr, 0, $midEl);
        $rightEl = array_slice($this->arr, $midEl);

        //recursive call to the left element
        //@todo look why does it return null
        $left = $this->sortArray($leftEl);
        //recursive call to the right element
        //@todo look why does it return null
        $right = $this->sortArray($rightEl);

        return $this->mergeArrayList($left, $right);
    }

    /**
     * Sort and merge the chunked array
     *
     * @param $a
     * @param $b
     * @return array
     */
    private function mergeArrayList($a, $b) {
        $result = [];
        $i = 0;
        $j = 0;

        while($i <count($a) && $j<count($b))
        {
            //check if the first element is greater than the second
            if ($a[$i] > $b[$j]) {
                $result[]=$a[$j];
                $j++;
            } else {
                $result[] = $b[$i];
                $i++;
            }
        }
        while($i <count($b))
        {
            $result[]= $a[$i];
            $i++;
        }
        while($j <count($a))
        {
            $result[]=$b[$j];
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
        $sortArray =  $this->sortArray($requestedArray);

        return implode(', ', $sortArray) . PHP_EOL;
    }
}