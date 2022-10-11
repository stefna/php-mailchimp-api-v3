<?php declare(strict_types=1);

use GuzzleHttp\Psr7\Response;

return new Response(
	200,
	['IsMock' => true],
	'{"templates":[{"id":9985,"type":"user","name":"Untitled Template","drag_and_drop":true,"responsive":true,"category":"","date_created":"2017-02-17T07:29:15+00:00","created_by":"Test User","active":true,"thumbnail":"https://gallery.mailchimp.com/00test00/template-screens/9985_screen.png","share_url":"","_links":[{"rel":"self","href":"https://us15.api.mailchimp.com/3.0/templates/9985","method":"GET","targetSchema":"https://us15.api.mailchimp.com/schema/3.0/Definitions/Templates/Response.json"},{"rel":"parent","href":"https://us15.api.mailchimp.com/3.0/templates","method":"GET","targetSchema":"https://us15.api.mailchimp.com/schema/3.0/Definitions/Templates/CollectionResponse.json","schema":"https://us15.api.mailchimp.com/schema/3.0/CollectionLinks/Templates.json"},{"rel":"delete","href":"https://us15.api.mailchimp.com/3.0/templates/9985","method":"DELETE"},{"rel":"default-content","href":"https://us15.api.mailchimp.com/3.0/templates/9985/default-content","method":"GET","targetSchema":"https://us15.api.mailchimp.com/schema/3.0/Definitions/Templates/Default-Content/Response.json","schema":"https://us15.api.mailchimp.com/schema/3.0/CollectionLinks/Templates.json"}]}],"total_items":109,"_links":[{"rel":"parent","href":"https://us15.api.mailchimp.com/3.0/","method":"GET","targetSchema":"https://us15.api.mailchimp.com/schema/3.0/Definitions/Root/Response.json"},{"rel":"self","href":"https://us15.api.mailchimp.com/3.0/templates","method":"GET","targetSchema":"https://us15.api.mailchimp.com/schema/3.0/Definitions/Templates/CollectionResponse.json","schema":"https://us15.api.mailchimp.com/schema/3.0/CollectionLinks/Templates.json"}]}'
);
