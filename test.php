<?php
require_once('config/connect.php');
require_once('functions/functions.php');
echo '<pre>';




confirmUserEmailAndPassword('testerzero@mail.com', 1, 1);

echo calculateStudentLevel('2017/2018');