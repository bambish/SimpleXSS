<?php
    // Config
    $dumpfile = "dump.txt";
    $allowgetredirection = true; // Allow redirection by URL arg: redirect
    $staticredirection = "https://google.com/"; // Default rediction URL

    // Open dump file
    if ($_GET["dumpfile"]) {
        $dumpfile = $_GET["dumpfile"];
    }
    $myfile = fopen($dumpfile, "a") or die("Unable to open file!");
    // Write basic infos
    fwrite($myfile, date("d/m/Y - H:i")."\n");
    fwrite($myfile, "Client IP - ".$_SERVER['REMOTE_ADDR']."\n");
    fwrite($myfile, "----------------\n");
    // Write each URL args
    foreach($_GET as $key => $value){
        fwrite($myfile, $key . " : " . $value . "\n");
    }
    // Write end of dump and close file
    fwrite($myfile, "================\n");
    fclose($myfile);
  
    // Redirection
    if ($allowgetredirection and $_GET["redirect"]) {
        header("Location: ".$_GET["redirect"]);
    }
    elseif ($staticredirection) {
        header("Location: ".$staticredirection);
    }
    die();
?>