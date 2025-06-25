# Ensany Whatsapp for Laravel

This package provides a simple and easy-to-use interface to send whatsapp messages using Ensany Dashboard.

---

## Installation

You can install the package via Composer:

```bash
composer require bajjour/ensany-whatsapp
```

## Configuration

After installing the package, publish the configuration file:

```bash
php artisan vendor:publish --provider="EnsanyWhatsapp\EnsanyWhatsappServiceProvider" --tag="ensany-whatsapp-config"
```

Update your .env file with your Stripe API credentials:

```bash
ENSANY_WHATSAPP_API_KEY="your-app-key"
ENSANY_WHATSAPP_DEVICE_ID="device-id"
```

## Usage

`Initialize the Service`

You can initialize the Stripe service in your controller:

```bash
use EnsanyWhatsapp\Services\WhatsappService;


public function __construct(WhatsappService $w_service)
{
    $this->w_service = $w_service;
}
```

`Send Text Message`

```php
$mobile = '970xxxxxxxxx';
$msg = 'Welcome From Ensany';
$res = $this->m_service->send_text($mobile, $msg);
```

Response

detailed array returned
```json
{
  "status": true,
  "message": "lynx.successfully",
  "result": {
    "success": true,
    "message_id": "sent-message-id",
    "scheduled_at": "send-date"
  },
  "meta": null
}
```

## License

[MIT](https://choosealicense.com/licenses/mit/)