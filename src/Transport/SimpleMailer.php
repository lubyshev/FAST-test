<?php
declare(strict_types=1);

namespace Transport;

class SimpleMailer implements TransportInterface
{
    private string $login;

    private string $password;

    public function __construct(string $login, string $password)
    {
        $this->login    = $login;
        $this->password = $password;
    }

    public function sendToManagers(string $message): bool
    {
        return true;
    }
}
