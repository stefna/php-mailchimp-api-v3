<?php

return new \GuzzleHttp\Psr7\Response(
	200,
	['IsMock' => true],
	'{"html":"<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n<html>\n    <head>\n <title>*|MC:SUBJECT|*</title>\n\t</head><body><h1>Blahh</h1></body>\n</html>\n","archive_html":"<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n<html>\n    <head>\n <title>TestSubject 00</title>\n\t</head><body><h1>Blahh</h1></body>\n</html>\n","_links":[{"rel":"parent","href":"https://us15.api.mailchimp.com/3.0/campaigns/88cbf762dc","method":"GET","targetSchema":"https://us15.api.mailchimp.com/schema/3.0/Definitions/Campaigns/Response.json"},{"rel":"self","href":"https://us15.api.mailchimp.com/3.0/campaigns/88cbf762dc/content","method":"GET","targetSchema":"https://us15.api.mailchimp.com/schema/3.0/Definitions/Campaigns/Content/Response.json"},{"rel":"create","href":"https://us15.api.mailchimp.com/3.0/campaigns/88cbf762dc/content","method":"PUT","targetSchema":"https://us15.api.mailchimp.com/schema/3.0/Definitions/Campaigns/Content/PUT.json"}]}'
);
