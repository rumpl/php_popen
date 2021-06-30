<?php

$descriptorspec = array(
   0 => array("pty"),
   1 => array("pty"),
   2 => array("pty") 
);

$process = proc_open("docker compose up -d", $descriptorspec, $pipes, NULL, NULL);

if (is_resource($process)) {
    fclose($pipes[1]);
    $err = stream_get_contents($pipes[2]);
    echo $err;
    fclose($pipes[2]);

    $return_value = proc_close($process);

    echo "command returned $return_value\n";
}
