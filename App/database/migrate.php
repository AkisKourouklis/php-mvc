<?php

use App\Database\Db;

$db = new Db();

print_r($db->migrate());
