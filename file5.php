<?php
include "file4.php";
$oneDemo = new demoFilter();
var_dump($oneDemo->filed("1000155163.com")->http()->get());
?>