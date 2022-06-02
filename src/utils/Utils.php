<?php

declare(strict_types=1);

namespace locm\lskyblock\utils;

use pocketmine\Server;
use pocketmine\world\generator\Flat;
use pocketmine\world\generator\GeneratorManager;
use pocketmine\world\WorldCreationOptions;
use pocketmine\utils\Config;

use locm\lskyblock\LSkyblock;

class Utils
{
    public static function generatorWorld(string $world) :void
    {
        $options = new WorldCreationOptions();
        $options->setGeneratorClass(Flat::class);
        $options->setGeneratorOptions('3;minecraft:air;127');
        Server::getInstance()->getWorldManager()->generateWorld($world, $options);
    }

    public static function getCustomIslandConfig(string $island) :Config
    {
        return new Config(LSkyblock::getInstance()->getDataFolder() . 'islands/'. $island . '.island', Config::YAML);
    }

}