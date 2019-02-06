<?php
/**
 * Created by PhpStorm.
 * User: kristina
 * Date: 2/6/19
 * Time: 8:44 PM
 */

class BubbleSort
{

    /**
     * @var array
     */
    private $myArray = [];


    /**
     * Initialize array
     *
     * @param mixed $myArray
     */
    public function setMyArray($myArray)
    {
        $this->myArray = $myArray;

    }


    /**
     * Bubble sort the array
     *
     * @return mixed
     */
    private function sortArray() {

        for ($i = 0; $i < count($this->myArray); $i++) {

            for ($j = 0; $j < count($this->myArray)-1; $j++) {

                if ($this->myArray[$j] > $this->myArray[$j + 1]) {

                    $temp = $this->myArray[$j];

                    $this->myArray[$j] = $this->myArray[$j+1];

                    $this->myArray[$j+1] = $temp;


                }

            }

        }
        return $this->myArray;
    }


    /**
     * Display array
     *
     * @return mixed
     */
    public function getMyArray()
    {
       $sortedArray = $this->sortArray();

        return implode(', ', $sortedArray) . PHP_EOL;
    }

}