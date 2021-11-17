<?php
function formatTimeToString(int $minutes): string
{
    return join(":", [
        intdiv($minutes, 60),
        $minutes % 60,
    ]);
}

function printMessage(string $message)
{
    echo $message;
}

function escape(string $output)
{
    return htmlspecialchars($output, ENT_QUOTES);
}

function getFileName($path): string
{
    return basename($path, ".php");
}
?>