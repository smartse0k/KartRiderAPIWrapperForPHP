<?php

namespace Phodobit\Kartrider\Api\Model\User;

use Phodobit\Kartrider\Api\Model\Base;

class User extends Base
{
    /** @var string $accessId */
    private $accessId;

    /** @var string $name */
    private $name;

    /** @var int $level */
    private $level;

    /**
     * @return string
     */
    public function getAccessId(): string
    {
        return $this->accessId;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $accessId
     */
    public function setAccessId(string $accessId)
    {
        $this->accessId = $accessId;
        return $this;
    }

    /**
     * @param int $level
     */
    public function setLevel(int $level)
    {
        $this->level = $level;
        return $this;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param object $json
     */
    public function setDataFromJsonObject($json)
    {
        $this->accessId = $json->accessId ?? null;
        $this->name = $json->name ?? null;
        $this->level = $json->level ?? null;
    }
}