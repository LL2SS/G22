<?php
    session_start();
    include("function.php");

    $Path="getFilePath.py";
    $command = "python {$Path}";
    $data = shell_exec($command);
    
    echo $data;

?>