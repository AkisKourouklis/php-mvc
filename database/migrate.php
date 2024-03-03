<?php
require_once "./Db.php";

$db = new Db();

print_r($db->migrate());
