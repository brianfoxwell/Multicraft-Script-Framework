#!/usr/bin/env php
<?php
$boot = include __DIR__.'/app/bootstrap.php';

$fire = new Fire($argv);
$fire->run();
