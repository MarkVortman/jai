<?php
#------------------------------------------------------------
# Just load classes
#------------------------------------------------------------

spl_autoload_register(function ($class) {
    include __DIR__ . "/forms/$class.php";
});

spl_autoload_register(function ($class) {
    include __DIR__ . "/processes/$class.php";
});

spl_autoload_register(function ($class) {
    include __DIR__ . "/validators/$class.php";
});