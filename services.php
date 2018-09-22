<?php
namespace DIExample;

use DIExample\SubscriberManager;
use DIExample\Mailer;
use PDO;

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
