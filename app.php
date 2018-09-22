<?php
namespace DIExample;

require __DIR__ . '/vendor/autoload.php';

use DIExample\SubscriberManager;
use DIExample\Mailer;
use PDO;

require __DIR__ . '/config.php';

// Initialize PDO.
$pdo = new PDO($config['dsn']);
// Initialize mailer.
$mailer = new Mailer(
  $config['hostname'],
  $config['smtp_user'],
  $config['smtp_password'],
  $config['smtp_port']
);

$subscriberManager = new SubscriberManager();
$subscriberManager->notifySubscribers($mailer, $pdo);
