<?php

namespace App\Classes;

use Illuminate\Contracts\Cache\Repository;

class SomeClassWhoWantsConfigAndCache
{
    /** @var Repository */
    private $cache;

    /** @var \Illuminate\Contracts\Config\Repository */
    private $config;

    /**
     * @param Repository $cache
     * @param Repository $config
     */
    public function __construct(Repository $cache, Repository $config)
    {
        $this->cache = $cache;
        $this->config = $config;
    }


}