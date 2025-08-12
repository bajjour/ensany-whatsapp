<?php
namespace EnsanyWhatsapp\Contracts;

interface WhatsappInterface
{
    public function send_text(String $mobile, string $text): array|null;

}
