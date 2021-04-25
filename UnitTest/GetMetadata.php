<?php
include_once dirname(__FILE__) . '/../autoload.php';

$metadata = new \Phodobit\Kartrider\Api\Metadata\Metadata();

echo $metadata->getGameType('826ecdb309f3a2b80a790902d1b133499866d6b933c7deb0916979d1232f968c');