<?php

declare(strict_types=1);

namespace locm\lskyblock;

class Island
{
    public function __construct(
        private int $id,
        private string $username,
        private array $members,
        private bool $pvp,
        
    ){}

    public function getId() :int 
    {
        return $this->id;
    }

    public function getUsername() :string
    {
        return $this->username;
    }

    public function getMembers() :array
    {
        return $this->members;
    }

    public function isPvp() :bool
    {
        return $this->pvp;
    }

    public function toArray() :array
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'members' => $this->members,
            'pvp' => $this->pvp
        ];
    }
}