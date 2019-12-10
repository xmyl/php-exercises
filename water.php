<?php

/**
 * 有三个容积分别为3升、5升、8升的水桶，其中容积为8升的水桶中装满了水，容积为3升和容积为5升的水桶都是空的。三个水桶都没有刻度，现在需要将大水桶中的8升水等分成两份，每份都是4升水，附加条件是只能这三个水桶，不能借助其他辅助容器
 */

# 当8L水桶或5L水桶或3L水桶有1L水时，都能快速倒出4L水
class Bucket
{
    public static $changePath = [];
    public $limit = [];
    public $value = [];
    public $history = [];

    public function __construct($limit, $value, $history)
    {
        $this->limit = $limit;
        $this->value = $value;
        $this->history = array_merge($history, [$value]);

        $this->run();
    }

    public function run()
    {
        $len = count($this->value);
        for ($i = 0; $i < $len; $i++) {
            for ($j = 0; $j < $len; $j++) {
                $this->changeValue($i, $j);
                $this->changeValue($j, $i);
            }
        }
    }

    /**
     * 倒水操作
     * @param  int $target  被倒水的水桶
     * @param  int $current 当前水桶（倒水的水桶）
     * @return bool
     */
    public function changeValue($target, $current)
    {
        $value = $this->value;
        $limit = $this->limit;

        # 0升水、自己倒入自己、以及满水无法操作
        if ($value[$current] == 0 || $current == $target
             || $value[$target] == $limit[$target]
        ) {
            return false;
        }

        # 若可倒入 < 应该倒入的水，water=可倒入，否则当前水
        $remain = $limit[$target] - $value[$target];
        $water = $remain < $value[$current] ? $remain : $value[$current];

        # 操作
        $value[$current] -= $water;
        $value[$target] += $water;

        if ($value == [4, 4, 0]) {
            self::$changePath[] = array_merge($this->history, [$value]);
        } elseif (!$this->checkStatus($value)) {
            new Bucket($limit, $value, $this->history);
        }
    }

    /**
     * 检测水桶状态是不是已存在过
     * @param  array $value 水桶状态
     * @return bool
     */
    public function checkStatus($value)
    {
        foreach ($this->history as $history) {
            if ($history === $value) {
                return true;
            }
        }

        return false;
    }

    public function getResult()
    {
        return self::$changePath;
    }
}

$bucketLimit = [8, 5, 3];
$bucketValue = [8, 0, 0];

$bucket = new Bucket($bucketLimit, $bucketValue, []);
$result = $bucket->getResult();
foreach ($result as $key => $value) {
    echo json_encode($value), PHP_EOL;
}