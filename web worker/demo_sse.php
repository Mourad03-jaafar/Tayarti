<?php

header('Content-Type: text/event-stream');
//Set the "Content-Type" header to "text/event-stream"

header('Cache-Control: no-cache');

    $time = date('r');
    echo "data: The server time is {$time}\n\n";
    flush();
    //Flush the output data back to the web page تدفق



?>
