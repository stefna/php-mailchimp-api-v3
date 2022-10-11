<?php declare(strict_types=1);

use GuzzleHttp\Psr7\Response;

return new Response(
	404,
	['IsMock' => true],
	'{"type":"https://developer.mailchimp.com/documentation/mailchimp/guides/error-glossary/","title":"Resource Not Found","status":404,"detail":"The requested resource could not be found.","instance":""}'
);
