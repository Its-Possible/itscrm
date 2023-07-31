<?php

namespace App\Services;

class TwilioService {

    private string $client_id;
    private string $client_token;


    public function __construct()
    {
        $this->client_id = env('TWILIO_CLIENT_ID');
        $this->client_token = env('TWILIO_CLIENT_TOKEN');
    }

    public function mail(array $to, string $subject,  string $htmlContent, string $textContent): mixed
    {
        $mail = new \SendGrid\Mail\Mail();
        $mail->setFrom(env('TWILIO_MAIL_FROM_ADDRESS'), env('TWILIO_MAIL_FROM_NAME'));
        $mail->setSubject($subject);
        $mail->addContent('html/html', $htmlContent);
        $mail->addContent('text/plain', $textContent);

        $service = new \SendGrid();

        try {

            $response = $service->send($mail);

            return $response;

        }catch(\Exception $exception){
            echo "Caught exception: ". $e->getMessage(), PHP_EOL;
            exit(1);
        }
    }

    /**
     * @param string $to
     * @param string $message
     * @return void
     */
    public function sms(string $to, string $message)
    {
         $sms = new \SendGrid\Rest\Client($this->client_id, $this->client_token);

         $client->messages->create(
             $to,
             [
                 "from" => env('TWILIO_MOBILE_PHONE'),
                 "body" => $message
             ]
         );
    }
}
