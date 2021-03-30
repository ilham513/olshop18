<?php
$host='ec2-23-21-229-200.compute-1.amazonaws.com';
$db = 'dbs95ig0jfd9t9';
$username = 'dbs95ig0jfd9t9';
$password = '03fe251d1c9bda2cdbb6b39833de6508d8c75ec6cc18b3f2e4bab39214c5e14b';

$myPDO = new PDO('pgsql:host=ec2-23-21-229-200.compute-1.amazonaws.com;dbname=dbs95ig0jfd9t9', 'dbs95ig0jfd9t9', '03fe251d1c9bda2cdbb6b39833de6508d8c75ec6cc18b3f2e4bab39214c5e14b');

$result = $myPDO->query("SELECT lastname FROM employees");

var_dump($result);