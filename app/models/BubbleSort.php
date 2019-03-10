<?php
/**
 * Created by PhpStorm.
 * User: kristina
 * Date: 2/6/19
 * Time: 8:44 PM
 */
namespace app\models;

class BubbleSort
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

               return $this->sortArray($c);
           }

        }
    }


    /**
     * Bubble sort the array
     *
     * @param $myArrays
     * @return array
     */
    private function sortArray($myArrays) {

        $this->arr = explode(',', $myArrays);

        for ($i = 0; $i < count($this->arr); $i++) {

            for ($j = 0; $j < count($this->arr)-1; $j++) {

                if ($this->arr[$j] > $this->arr[$j + 1]) {

                    $temp = $this->arr[$j];

                    $this->arr[$j] = $this->arr[$j+1];

                    $this->arr[$j+1] = $temp;


                }

            }

        }

        return $this->arr;
    }


    /**
     * Display array
     *
     * @return mixed
     */
    public function getMySortedArray()
    {
       $sortedArray = $this->requestArray();
        if (!empty($sortedArray)) {
            return implode(', ', $sortedArray) . PHP_EOL;
        } else {
            return "Empty data";
        }

    }

    /**
     *
     * @return string
     */
    public function executeScriptTime() {
        $executionTime = microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"];

        return "It took " . $executionTime . " seconds!";
    }
}