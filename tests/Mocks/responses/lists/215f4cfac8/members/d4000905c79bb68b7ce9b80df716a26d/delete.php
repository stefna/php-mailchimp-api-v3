<?php declare(strict_types=1);

use GuzzleHttp\Psr7\Response;

return new Response(
	204,
	['IsMock' => true],
	''
);
