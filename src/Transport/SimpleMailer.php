<?php
declare(strict_types=1);

namespace Transport;

class SimpleMailer implements TransportInterface
{
    private const MAILER_LOGIN    = 'cartuser';
    private const MAILER_PASSWORD = 'j049lj-01';

    private string $login;

    private string $password;

    public function __construct()
    {
        /** @todo Взять из ENV */
        $this->login    = self::MAILER_LOGIN;
        $this->password = self::MAILER_PASSWORD;
    }

    public function sendToManagers(string $message): bool
    {
        return true;
    }
}
