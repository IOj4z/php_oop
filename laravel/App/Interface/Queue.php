<?php

namespace App\Interface;

interface Queue
{
    public function push($job, $data = '', $queue = null);

    public function pushOn($queue, $job, $data = '');
}