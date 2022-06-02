<?php

declare(strict_types=1);

namespace locm\lskyblock\datastorage;

use locm\lskyblock\LSkyblock;
use locm\lskyblock\island\Island;

abstract class BaseDataStorer
{
    public function __construct(
        private LSkyblock $plugin)
    {

        $this->initDatabase();
    }

    public function getPlugin() :LSkyblock
    {
        return $this->plugin;
    }

    protected abstract function initDatabase() :void;

    public abstract function registerIsland(Island $island) :void;
}