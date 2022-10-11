<?php declare(strict_types=1);

use GuzzleHttp\Psr7\Response;

return new Response(
	200,
	['IsMock' => true],
	'{"plain_text":"** ChangedX1\n------------------------------------------------------------\n\nTesting 123\n\nThis email was sent to *|EMAIL|* (mailto:*|EMAIL|*)\nwhy did I get this? (*|ABOUT_LIST|*)     unsubscribe from this list (*|UNSUB|*)     update subscription preferences (*|UPDATE_PROFILE|*)\n*|LIST_ADDRESSLINE_TEXT|*\n\n*|REWARDS_TEXT|*","html":"<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n<html>\n    <head>\n <title>*|MC:SUBJECT|*</title>\n\t</head><body><h1>ChangedX1</h1></body>\n</html>\n","archive_html":"<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n<html>\n    <head>\n <title>TestSubject 00</title>\n\t</head><body><h1>ChangedX1</h1></body>\n</html>\n","_links":[{"rel":"parent","href":"https://us15.api.mailchimp.com/3.0/campaigns/88cbf762dc","method":"GET","targetSchema":"https://us15.api.mailchimp.com/schema/3.0/Definitions/Campaigns/Response.json"},{"rel":"self","href":"https://us15.api.mailchimp.com/3.0/campaigns/88cbf762dc/content","method":"GET","targetSchema":"https://us15.api.mailchimp.com/schema/3.0/Definitions/Campaigns/Content/Response.json"},{"rel":"create","href":"https://us15.api.mailchimp.com/3.0/campaigns/88cbf762dc/content","method":"PUT","targetSchema":"https://us15.api.mailchimp.com/schema/3.0/Definitions/Campaigns/Content/PUT.json"}]}'
);
