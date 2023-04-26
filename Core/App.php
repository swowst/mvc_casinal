<?php

namespace Core;

class App
{

    public function configure(): void
    {
        require_once __DIR__ . "/../app/routes.php";
        require_once __DIR__ . "/../app/helper.php";
        require_once __DIR__ . "/../app/adminRoutes.php";
        require_once __DIR__ . "/../app/config.php";
    }

    public function handleRequests(): void
    {

        (new RouterService())->handleRoute();
    }
}
