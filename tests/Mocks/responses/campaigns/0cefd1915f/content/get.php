<?php declare(strict_types=1);

use GuzzleHttp\Psr7\Response;

return new Response(
	200,
	['IsMock' => true],
	'{"html":"<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n<html>\n    <head>\n </head><body></body>\n</html>\n","_links":[{"rel":"parent","href":"https://us15.api.mailchimp.com/3.0/campaigns/0cefd1915f","method":"GET","targetSchema":"https://us15.api.mailchimp.com/schema/3.0/Definitions/Campaigns/Response.json"},{"rel":"self","href":"https://us15.api.mailchimp.com/3.0/campaigns/0cefd1915f/content","method":"GET","targetSchema":"https://us15.api.mailchimp.com/schema/3.0/Definitions/Campaigns/Content/Response.json"},{"rel":"create","href":"https://us15.api.mailchimp.com/3.0/campaigns/0cefd1915f/content","method":"PUT","targetSchema":"https://us15.api.mailchimp.com/schema/3.0/Definitions/Campaigns/Content/PUT.json"}]}'
);
