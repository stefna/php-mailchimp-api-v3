<?php

return new \GuzzleHttp\Psr7\Response(
	404,
	['IsMock' => true],
	'{"type":"http://developer.mailchimp.com/documentation/mailchimp/guides/error-glossary/","title":"Resource Not Found","status":404,"detail":"The requested resource could not be found.","instance":""}'
);
