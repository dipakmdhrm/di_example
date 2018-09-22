<?php
namespace DIExample;

require __DIR__ . '/vendor/autoload.php';

use DIExample\SubscriberManager;
use DIExample\Mailer;
use PDO;
use Pimple\Container;

$container = new Container();

require __DIR__ . '/config.php';

// define some services.
$container['pdo'] = function ($container) {
  return new PDO($container['dsn']);
};

$container['mailer'] = function ($container) {
  return new Mailer(
    $container['hostname'],
    $container['smtp_user'],
    $container['smtp_password'],
    $container['smtp_port']
  );
};

$container['subscriber_manager'] = function ($container) {
  return new SubscriberManager(
    $container['mailer'],
    $container['pdo']
  );
};

$subscriberManager = $container['subscriber_manager'];
$subscriberManager->notifySubscribers();
