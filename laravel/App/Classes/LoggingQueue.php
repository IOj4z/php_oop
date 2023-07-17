<?php

namespace App\Classes;

use App\Interface\Queue;
use Illuminate\Log\Logger;

final class LoggingQueue implements Queue
{

    /** @var Queue */
    private $baseQueue;

    /** @var Logger */
    private $logger;

    /**
     * @param Queue $baseQueue
     * @param Logger $logger
     */
    public function __construct(Queue $baseQueue, Logger $logger)
    {
        $this->baseQueue = $baseQueue;
        $this->logger = $logger;
    }

    public function push($job, $data = '', $queue = null)
    {
        $this->logger->log('...');

        return $this->baseQueue->push($job, $data, $queue);
    }


}