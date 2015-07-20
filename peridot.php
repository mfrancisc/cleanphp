<?php
/**
 * Created by PhpStorm.
 * User: francisc
 * Date: 20/07/15
 * Time: 23:38
 */
use Evenement\EventEmitterInterface;
use Peridot\Plugin\Prophecy\ProphecyPlugin;
use Peridot\Plugin\Watcher\WatcherPlugin;

return function (EventEmitterInterface $emitter) {
    $watcher = new WatcherPlugin($emitter);
    $watcher->track(__DIR__ . '/src');
    new ProphecyPlugin($emitter);
};