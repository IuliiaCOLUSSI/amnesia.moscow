<?php

namespace App\Service;

use GuzzleHttp\Client;
use SparkPost\SparkPost;
use Symfony\Component\HttpFoundation\Response;
use Http\Adapter\Guzzle6\Client as GuzzleAdapter;

class EmailService
{

    private $httpClient;

    private $sparky;

    public function __construct()
    {

        $this->httpClient = new GuzzleAdapter(new Client());
        $this->sparky = new SparkPost($this->httpClient, ['key' => '23fba5bd5650677dadc7fa5f690857819b997247']);
    }

    public function send($recipient, $subject, $body)
    {
        $this->sparky->setOptions(['async' => false]);
        $response = $this->sparky->transmissions->post([
            'content' => [
                'from' => [
                    'name' => 'DADA-BASE',
                    'email' => 'flowers@amnesiamoscow.ru',
                ],
                'subject' => $subject,
                'html' => $body
            ],
            'recipients' => [
                [
                    'address' => [
                        'email' => $recipient,
                    ],
                ],
            ],
            /* 'bcc' => [
                [
                    'address' => [
                        'email' => 'yuliabelova2307@gmail.com',
                    ],
                ],
            ]*/
        ]);

        return $response;
    }
}
