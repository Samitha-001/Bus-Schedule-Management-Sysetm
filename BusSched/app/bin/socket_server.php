<?php
//root is parent of my parent
const ROOT = __DIR__ . "/../../";
require ROOT."vendor/autoload.php";
include ROOT."app/core/FormSubmissionServer.php";
spl_autoload_register(function ($classname) {
    //replace \ with /
    require $filename = ROOT . str_replace("\\", "/", $classname) . ".php";
});
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;

$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new FormSubmissionServer()
        )
    ),
    8080
);

print ("Server works!\n");
$server->run();
print("HI\n");
print(ROOT);