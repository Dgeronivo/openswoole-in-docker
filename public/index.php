<?php

use Swoole\Http\Request;
use Swoole\Http\Response;
use Swoole\Http\Server;

$server = new Server("0.0.0.0", 80);

$server->on("Start", function(Server $server)
{
    echo "OpenSwoole http server is started at http://127.0.0.1\n";
});

$server->on("Request", function(Request $request, Response $response)
{
    $response->header("Content-Type", "text/plain");
    $response->end("Hello World Bro\n");
});
$server->on('WorkerError', function(Server $server, int $workerId, int $workerPid, int $exitCode, int $signal)
{
    echo $server->getLastError();
});

$server->start();
