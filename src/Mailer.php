<?php
namespace DIExample;

/**
 * @file
 * Defines Mailer class.
 */

class Mailer {
  protected $hostname;
  protected $smtp_user;
  protected $smtp_password;
  protected $smtp_port;

  public function __construct() {
    $this->hostname = 'smtp.blogtrottr.com';
    $this->smtp_user = 'smtpuser';
    $this->smtp_password = 'smtppass';
    $this->smtp_port = '465';
  }

  /**
   * Sends mail to user.
   *
   * @param string $recipient
   *   Email of the recipient.
   * @param string $subject
   *   Subject of the mail.
   * @param string $body
   *   Body of the mail.
   *
   * @return void
   */
  function sendMail($sender, $recipient, $subject, $body) {

    // Log messages for demo in a log file.
    $logPath = __DIR__ . '/../logs/emails.log';
    $logLines = array();
    $logLines[] = sprintf(
        '[%s][%s:%s@%s:%s][From: %s][To: %s][Subject: %s]',
        date('Y-m-d H:i:s'),
        $this->hostname,
        $this->smtp_user,
        $this->smtp_password,
        $this->smtp_port,
        $sender,
        $recipient,
        $subject
    );
    $logLines[] = '---------------';
    $logLines[] = $body;
    $logLines[] = '---------------';

    $fh = fopen($logPath, 'a');
    fwrite($fh, implode("\n", $logLines)."\n");
  }
}
