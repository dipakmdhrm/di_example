<?php
require __DIR__ . '/vendor/autoload.php';

use DIExample\SubscriberManager;

$subscriberManager = new SubscriberManager();
$subscriberManager->notifySubscribers();
