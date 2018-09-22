<?php
namespace DIExample;
use DIExample\Mailer;
use PDO;

class SubscriberManager {
  public function notifySubscribers(Mailer $mailer, PDO $pdo) {
    // Get list of subscribers from datasource.

    $query = 'SELECT * FROM subscribers';
    $subscribers = $pdo->query($query);

    // Sender and Subject of the mail.
    $sender = 'subscriptions@example.com';
    $subject = 'New Article alert for you!';

    // Send mail to each subscriber.
    foreach ($subscribers as $subscriber) {
      // Customized message of the mail.
      $message = sprintf(<<<EOF
Hello %s! A new article has been published in the domain you have subscribed for.
You can visit the link below to read the article below. To unsubscribe, browse to our website, login & click on unsubscribe button!.
EOF
      , $subscriber['name']);

      $mailer->sendMail($sender, $subscriber['email'], $subject, $message);
    }
  }
}
