<?php

namespace Phodobit\Kartrider\Api\Metadata;

class Downloader
{
    const API_URL = 'https://static.api.nexon.co.kr/kart/latest/metadata.zip';

    private $targetDirectory = '';
    private $zipFileName = '';
    private $zipFileFullPath = '';

    public function __construct(string $directory = '', string $zipFileName = '')
    {
        if(empty($directory)) {
            $directory = dirname(__FILE__) .DIRECTORY_SEPARATOR . 'data';
        }

        if($directory[ mb_strlen($directory) - 1 ] !== DIRECTORY_SEPARATOR) {
            $directory .= DIRECTORY_SEPARATOR;
        }

        if(empty($fileName)) {
            $zipFileName = 'metadata.zip';
        }

        $this->targetDirectory = $directory;
        $this->zipFileName = $zipFileName;
        $this->zipFileFullPath = $directory . $zipFileName;
    }

    public function install()
    {
        $this->deleteZipFile();
        $this->download();
        $this->extract();
        $this->deleteZipFile();
    }

    private function extract()
    {
        $zipArchive = new \ZipArchive();
        $zipArchive->open($this->zipFileFullPath);
        $zipArchive->extractTo($this->targetDirectory);
    }

    private function download()
    {
        $fileFullPath = $this->zipFileFullPath;

        $file = fopen($fileFullPath, 'w+');

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, self::API_URL);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_FILE, $file);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);

        curl_exec($curl);
        curl_close($curl);

        fclose($file);
    }

    private function deleteZipFile()
    {
        if(file_exists($this->zipFileFullPath)) {
            unlink($this->zipFileFullPath);
        }
    }
}