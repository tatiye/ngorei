<?php 
use app\tatiye;
echo'param('.PHP_EOL;
echo'    [string]$in,'.PHP_EOL;
echo'    [string]$tatiye'.PHP_EOL;
echo')'.PHP_EOL;
echo'$separatorIN="/"'.PHP_EOL;
echo'$row=$in.Split($separatorIN)'.PHP_EOL;
echo'$TarPath = $PSScriptRoot'.PHP_EOL;
echo'$Uri ="'.tatiye::urlroot('/api/invoke').'"'.PHP_EOL; 
echo'$segment=$row[0]'.PHP_EOL;
echo'$stream=$row[1]'.PHP_EOL;
echo'$postparam = @{segment=$segment;stream=$stream;base=$Uri;param=$in;user=$tatiye}'.PHP_EOL;
echo'Invoke-RestMethod -Uri $Uri -Body $postparam -Method Post'.PHP_EOL;


