<?php

namespace Logger;

require_once "../vendor/autoload.php";

use Google\Cloud\Firestore\FirestoreClient as FilestoreClient;

class FileStoreLogger implements IFileStoreLogger
{
    function __construct()
    {
        new FilestoreClient(['projectId' => FileStoreConstants::PROJECT, 'keyFile' => json_decode(file_get_contents(FileStoreConstants::GCP_PATH), true)]);
    }
    function log($data, $topic, $error = null)
    {
    }
    function changeCollection($collection)
    {
    }
}
