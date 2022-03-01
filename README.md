# logler
A flexible logging package that can output logs as formatted log files, write to sql, dynamo AWS and filestore
There are currently 4 log handlers, that can be accessed by passing a type of:
 - txt
 - aws
 - filestore
 - db

Usage example:
 - $type="txt";
 - $collection="receipts";
 - $data=['id'=>2,'amount'=>25];
 - $topic="receipt_insert";
 - $logger = new GeneralLogger($type,$collection)
 - $logger->log($data,$topic);
