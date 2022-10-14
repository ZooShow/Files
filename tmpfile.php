<?php

function writeInTmpfile($a)
{
    fwrite($a, "asd");
}

function readInTmpfile($a)
{
    fseek($a, 0);
    echo fgets($a);
}

$temp = tmpfile();

writeInTmpfile($temp);

readInTmpfile($temp);