<?php

declare(strict_types=1);

namespace Studio903\Form;

use PHPMailer\PHPMailer\PHPMailer;
use WP_Error;
use Monolog\Logger;

class MailClient
{
    public function __construct(private readonly Logger $logger)
    {
        add_action(
            'phpmailer_init',
            function (PHPMailer $mailer) {
                $mailer->isSMTP();
                $mailer->SMTPDebug = WP_DEBUG ? 2 : 0;
                $mailer->CharSet  = "utf-8";
                $mailer->Host = $_ENV['MAIL_HOST'];
                $mailer->Port = (int) $_ENV['MAIL_PORT'];
            }
        );

        add_action(
            'wp_mail_failed',
            function (WP_Error $wp_error) {
                $this->logger->error($wp_error->get_error_message());
            }
        );
    }

    public function sendEmail(string $source, string $date, string $hour, string $name, string $contact, string $details): void
    {
        $success = wp_mail(
            to: 'studio@studio903.pro',
            subject: 'Novo pedido através do website',
            message: $this->buildMessage($source, $date, $hour, $name, $contact, $details),
            headers: ['From: Studio 903 <studio@studio903.pro>'],
        );

        if ($success !== true) {
            $this->logger->error('Erro ao enviar e-mail');
        }
    }

    public function buildMessage(string $source, string $date, string $hour, string $name, string $contact, string $details): string
    {
        $googleCalendarRenderLink = GoogleCalendarClient::getRenderLink(
            $source,
            $date,
            $hour,
            $name,
            $contact,
            $details
        );

        $details = (bool) $details ? $details : 'Não há observações';

        return <<<TXT
        Origem: {$source} 

        Data: {$date}

        Hora: {$hour}

        Nome: {$name}

        Contato: {$contact}

        Observações: {$details}

        Acesse o link abaixo para criar um evento na agenda com os dados deste pedido.

        {$googleCalendarRenderLink}

        Essa é uma mensagem automática.
        TXT;
    }
}
