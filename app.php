<?php
require __DIR__ . '/vendor/autoload.php';

use DIExample\SubscriberManager;

require __DIR__ . '/config.php';

$subscriberManager = new SubscriberManager($config);
$subscriberManager->notifySubscribers();
