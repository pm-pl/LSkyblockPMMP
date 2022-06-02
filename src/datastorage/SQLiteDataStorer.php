<?php

declare(strict_types=1);

namespace locm\lskyblock;

use poggit\libasynql\DataConnector;
use poggit\libasynql\libasynql;

use locm\lskyblock\island\Island;

class SQLiteDataStorer extends BaseDataStorer
{
    const INIT_TABLE = 'skyblock.init';
    const INSERT_DATA = 'skyblock.insert';
    const SELECT_DATA = 'skyblock.select';

    private DataConnector $dataConnector;

    protected function initDatabase() :void
    {
        $plugin = $this->getPlugin();
        $this->dataConnector = libasynql::create($plugin, $plugin->getConfig()->get('database'), ["sqlite" => "sqlite.sql", "mysql" => "mysql.sql"]);
        $this->dataConnector->executeGeneric(SQLiteDataStorer::INIT_TABLE);
    }

    public function getDataConnector() :DataConnector
    {
        return $this->dataConnector;
    }

    public function registerIsland(Island $island) :void
    {  
        $this->dataConnector->executeInsert(SQLiteDataStorer::INSERT_DATA, $island->toArray());
    }
}