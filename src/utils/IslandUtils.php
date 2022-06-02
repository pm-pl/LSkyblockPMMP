<?php

declare(strict_types=1);

namespace locm\lskyblock\utils;

use pocketmine\entity\Location;
use pocketmine\world\World;
use pocketmine\block\BlockLegacyIds;

use locm\lskyblock\LSkyblock;

class IslandUtils
{

    public static function createDataFolder(Location $loc1, Location $loc2, Location $spawn, World $world, array $blocks, string $name) :void
    {
        $blockArray = [];
        $x1 = $loc1->getX();
        $y1 = $loc1->getY();
        $z1 = $loc1->getZ();

        $x2 = $loc2->getX();
        $y2 = $loc2->getY();
        $z2 = $loc2->getZ();

        for ($x = min($x1, $x2); $x <= max($x1, $x2); $x++) {

            for ($y = min($y1, $y2); $y <= max($y1, $y2); $y++) {
      
                for ($z = min($z1, $z2); $z <= max($z1, $z2); $z++) {
                    $block = $world->getBlockAt($x, $y, $z, true, false);
                    array_push($blockArray, $block->getId() . ' ' . $block->getMeta());
                }
            }
        }
        $path = LSkyblock::getInstance()->getDataFolder() . 'island/';
        mkdir($path);
        new Config($path . $name . '.island', Config::YAML, [
            'name' => $name,
            'x1' => $x1,
            'y1' => $y1,
            'z1' => $z1,
            'x2' => $x2,
            'y2' => $y2,
            'z2' => $z2,
            'spawn-x' => $spawn->getX(),
            'spawn->y' => $spawn->getY(),
            'spawn-z' => $spawn->getZ(),
            'blocks' => $blockArray
        ]);
    }
    
    public static function getCustomIslands() :array|bool{
        $extensions = "island";
        $folder = LSkyblock::getInstance()->getDataFolder(). 'islands/';
        $folder = trim($folder);
        $folder = ($folder == '') ? './' : $folder;
        if(!is_dir($folder)){
            return false;
        }
        $files = array();
        if ($dir = @opendir($folder)){
            while($file = readdir($dir)){
                if (!preg_match('/^\.+$/', $file) and
                    preg_match('/\.('.$extensions.')$/', $file)){
                    $files[] = $file;        
                }      
            }   
        closedir($dir);  
        }else{
            return false;
        }
        if(count($files) == 0){
            return false;
        }
        return $files;
    }

}