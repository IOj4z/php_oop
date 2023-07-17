<?php

namespace App\Classes;

use App\Interface\Queue;

class RedisQueue implements Queue
{

    public function push($job, $data = '', $queue = null)
    {
        return $this->innerPush('...');
    }

    public function pushOn($queue, $job, $data = '')
    {
        return $this->push($job, $data, $queue);
    }

    public function innerPush($dots)
    {
        return $dots;
    }
}