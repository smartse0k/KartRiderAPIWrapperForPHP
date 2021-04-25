<?php
include_once dirname(__FILE__) . '/../autoload.php';

$downloader = new \Phodobit\Kartrider\Api\Metadata\Downloader();

$downloader->install();