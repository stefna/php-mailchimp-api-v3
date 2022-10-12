<?php

return new \GuzzleHttp\Psr7\Response(
	200,
	['IsMock' => true],
	'{"sections":{"x1":"Blahh","x2":"Testing 123"},"_links":[{"rel":"parent","href":"https://us15.api.mailchimp.com/3.0/templates/0","method":"GET","targetSchema":"https://us15.api.mailchimp.com/schema/3.0/Definitions/Templates/Response.json"},{"rel":"self","href":"https://us15.api.mailchimp.com/3.0/templates/0/default-content","method":"GET","targetSchema":"https://us15.api.mailchimp.com/schema/3.0/Definitions/Templates/Default-Content/Response.json"}]}'
);
