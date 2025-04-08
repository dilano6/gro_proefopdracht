<?php

namespace App\Services;

use MailchimpTransactional\ApiClient;

class MailchimpService
{
    /**
     * The Mailchimp API client instance.
     *
     * @var \MailchimpTransactional\ApiClient
     */
    protected ApiClient $mailchimp;

    /**
     * MailchimpService constructor.
     *
     * Initializes the Mailchimp API client with the API key from the env.
     */
    public function __construct()
    {
        $this->mailchimp = new ApiClient();
        $this->mailchimp->setApiKey(env('MAILCHIMP_API_KEY'));
    }

    /**
     * Sends a transactional email.
     *
     * @param string $toEmail      Recipient email address.
     * @param string $toName       Recipient name.
     * @param string $subject      Subject of the email.
     * @param string $htmlContent  HTML body of the email.
     *
     * @return array Response from Mailchimp API.
     *
     */
    public function sendTransactionalEmail(string $toEmail, string $toName, string  $subject, string $htmlContent)
    {
        return $this->mailchimp->messages->send([
            "message" => [
                "from_email" => "dilano@grwp.nl",
                "from_name" => "dilano",
                "subject" => $subject,
                "html" => $htmlContent,
                "to" => [
                    [
                        "email" => $toEmail,
                        "name" => $toName,
                        "type" => "to"
                    ]
                ]
            ]
        ]);
    }
}
