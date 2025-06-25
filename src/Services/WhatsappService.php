<?php
namespace EnsanyWhatsapp\Services;

use EnsanyWhatsapp\Contracts\WhatsappInterface;
use Illuminate\Support\Facades\Http;

class WhatsappService implements WhatsappInterface
{
    private string $apiKey;
    private string $send_mobile;

    public function __construct(string $apiKey, string $send_mobile)
    {
        $this->apiKey = $apiKey;
        $this->send_mobile = $send_mobile;
    }

    public function send_text(String $mobile, string $text): array
    {
        $response = Http::withHeaders([
            'api-key' => $this->apiKey,
            'device-id' => $this->send_mobile,
        ])->asForm()
            ->post("https://ensany.net/api/v1/send/message", [
                'message' => $text,
                'mobile' => $mobile
            ]);

        return $response->json();
    }

}
