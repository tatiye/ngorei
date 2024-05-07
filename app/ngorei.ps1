param(
    [string]$in,
    [string]$tatiye
)
$separatorIN="/"
$row=$in.Split($separatorIN)
$TarPath = $PSScriptRoot
$Uri ="http://192.168.1.112/devlop/api/invoke"
$segment=$row[0]
$stream=$row[1]
$postparam = @{segment=$segment;stream=$stream;base=$Uri;param=$in;user=$tatiye}
Invoke-RestMethod -Uri $Uri -Body $postparam -Method Post
