<?php
    require "Lib/startup.php";

    use TruckRouter\Frames\App;
    use TruckRouter\Services\Router;

    App::reset();

    Router::redirect("/");
?>