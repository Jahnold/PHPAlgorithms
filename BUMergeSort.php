<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Matthew
 * Date: 06/09/13
 * Time: 20:34
 * PHP Implementation of Merge Sort
 * Using Bottom Up Due to PHP Recursion Limit
 */

class BUMergeSort
{

    private $aux = [];
    public $data = [];
    public $result = [];

    public function sort(array $data)
    {

        $N = count($data);
        $this->data = $data;

        // $size is the sub-array size, double it each pass
        for ($size = 1; $size < $N; $size = $size + $size) {

            // work through the data in chunks
            for ($lo = 0; $lo < $N - $size; $lo += $size + $size) {
                $this->merge($lo, $lo + $size - 1, min($lo + $size + $size - 1, $N - 1));
                echo implode("",$this->data);
                echo "</br>";
            }
        }

    }

    //
    private function merge($lo, $mid, $hi)
    {
        $i = $lo;
        $j = $mid+1;

        // copy the data into the aux array
        for ($k = $lo; $k <= $hi; $k++) {
            $this->aux[$k] = $this->data[$k];
        }

        for ($k = $lo; $k <= $hi; $k++) {
            if      ($i > $mid)                         $this->data[$k] = $this->aux[$j++];
            elseif  ($j > $hi)                          $this->data[$k] = $this->aux[$i++];
            elseif  ($this->aux[$j] < $this->aux[$i])   $this->data[$k] = $this->aux[$j++];
            else                                        $this->data[$k] = $this->aux[$i++];
        }
    }
}

$string = "MERGESORTTESTSTRING";
$data = str_split($string);
$merge = new BUMergeSort();
$merge->sort($data);

echo "</br>";

$numbers = array(10,9,8,7,6,5,4,3,2,1);
$merge->sort($numbers);