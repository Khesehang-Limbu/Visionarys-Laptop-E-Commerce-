<?php

namespace app\models;

use evil\phpmvc\Model;

class ContactForm extends Model
{
    public string $subject = "";
    public string $email = "";
    public string $message = "";

    public function rules(): array
    {
        return [
            "subject" => self::RULE_REQUIRED,
            "email" => [self::RULE_REQUIRED, self::RULE_EMAIL],
            "message" => [self::RULE_REQUIRED, [self::RULE_MAX, "max" => 250]]
        ];
    }

    public function labels(): array
    {
        return [
            "subject" => "Subject",
            "email" => "Your Email",
            "message" => "Your Message To Us"
        ];
    }

    public function send()
    {
        return true;
    }
}
