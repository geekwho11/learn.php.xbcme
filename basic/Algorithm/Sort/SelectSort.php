<?php

/**
 * @Author: GeekWho
 * @Date:   2018-07-21 14:00:11
 * @Last Modified by:   GeekWho
 * @Last Modified time: 2018-12-14 21:07:03
 */
namespace Algorithm\Sort;

class SelectSort extends \Algorithm\Sort\Base
{
    /**
     * 1. 外层循环
     * 2. 内层循环，以第一个数为标准。
     * 3. 找到比第一个还小的数，进行交换。
     *
     */
    public function run(array $data)
    {
        $tmp      = 0 ;
        $rand_num = count($data);
        for ($i = 0 ; $i < $rand_num - 1 ; $i++) {
            //初始化$min为第一个元素
            $min = $i;
            for ($j = $i + 1 ; $j < $rand_num ; $j++) { //找到比min的还小的值,讲$min移到该序号
                if ($data[$min] > $data[$j]) {
                    $min = $j;
                }
            }
            //,判断$min是否为最小,若不是,交换位置
            if ($min != $i) {
                $tmp        = $data[$min];
                $data[$min] = $data[$i];
                $data[$i]   = $tmp;
            }
        }
        return $data;
    }

    public function sort($num = 10)
    {
        $begin  = microtime(true);
        $random = self::getRandomData($num);
        $data   = $this->sort($random);
        $end    = microtime(true);
        $time   = $end - $begin;
        echo "num $num sort cost time is $time s" . PHP_EOL;
        self::echoData($random) . PHP_EOL;
        self::echoData($data) . PHP_EOL;
    }
}
