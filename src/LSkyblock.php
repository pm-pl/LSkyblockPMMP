<?php

declare(strict_types=1);

namespace locm\lskyblock;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\SingletonTrait;

use locm\lskyblock\datastorage\BaseDataStorer;

class LSkyblock extends PluginBase 
{
    use SingletonTrait;

    private DataConnector $database;

    public function onLoad() :void 
    {
        self::setInstance($this);
    }

    protected function onEnable(): void
    {
    }

    public function getDatabase() :BaseDataStorer
    {
        return $this->database;
    }
}