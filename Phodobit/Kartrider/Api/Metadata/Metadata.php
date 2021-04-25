<?php

namespace Phodobit\Kartrider\Api\Metadata;

class Metadata
{
    const DATA_TYPE_LIST = array(
        'character',
        'flyingPet',
        'gameType',
        'kart',
        'pet',
        'track',
    );

    private $directory;

    private $database;

    /**
     * Metadata constructor.
     * @param string $dataDirectory
     */
    public function __construct(string $dataDirectory = '')
    {
        if(empty($dataDirectory)) {
            $dataDirectory = dirname(__FILE__) .DIRECTORY_SEPARATOR . 'data';
        }

        if($dataDirectory[ mb_strlen($dataDirectory) - 1 ] !== DIRECTORY_SEPARATOR) {
            $dataDirectory .= DIRECTORY_SEPARATOR;
        }

        $this->directory = $dataDirectory;
        $this->database = array();
        foreach(self::DATA_TYPE_LIST as $type) {
            $this->database[$type] = null;
        }
    }

    /**
     * @param string $id
     * @return bool|false|string
     */
    public function getCharacter($id) {
        return $this->get('character', $id);
    }

    /**
     * @param string $id
     * @return bool|false|string
     */
    public function getFlyingPet($id) {
        return $this->get('flyingPet', $id);
    }

    /**
     * @param string $id
     * @return bool|false|string
     */
    public function getGameType($id) {
        return $this->get('gameType', $id);
    }

    /**
     * @param string $id
     * @return bool|false|string
     */
    public function getKart($id) {
        return $this->get('kart', $id);
    }

    /**
     * @param string $id
     * @return bool|false|string
     */
    public function getPet($id) {
        return $this->get('pet', $id);
    }

    /**
     * @param string $id
     * @return bool|false|string
     */
    public function getTrack($id) {
        return $this->get('track', $id);
    }

    /**
     * @param string $type
     * @param string $id
     * @return string|false
     */
    public function get($type, $id)
    {
        $loadResult = $this->loadData($type);
        if(!$loadResult) {
            return false;
        }

        if(!isset($this->database[$type][$id])) {
            return '';
        }

        return $this->database[$type][$id];
    }

    /**
     * @param string $type
     * @return bool
     */
    private function loadData(string $type)
    {
        if(!is_null($this->database[$type])) {
            return true;
        }

        $dataFilePath = $this->directory . $type . '.json';
        if(!file_exists($dataFilePath)) {
            return false;
        }

        $json = file_get_contents($dataFilePath);
        if($json === false) {
            return false;
        }

        $json = json_decode($json, false);
        if(json_last_error() !== JSON_ERROR_NONE) {
            return false;
        }

        $this->database[$type] = array();
        foreach($json as $data) {
            $id = $data->id;
            $name = $data->name;

            $this->database[$type][$id] = $name;
        }

        return true;
    }
}