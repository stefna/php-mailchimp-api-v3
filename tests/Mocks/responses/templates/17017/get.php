<?php

return new \GuzzleHttp\Psr7\Response(
	200,
	['IsMock' => true],
	'{"id":17017,"type":"user","name":"testTemplate1","drag_and_drop":false,"responsive":false,"category":"","date_created":"2017-03-06T10:15:16+00:00","created_by":"Test User","active":true,"thumbnail":"","share_url":"","_links":[{"rel":"self","href":"https://us15.api.mailchimp.com/3.0/templates/17017","method":"GET","targetSchema":"https://us15.api.mailchimp.com/schema/3.0/Definitions/Templates/Response.json"},{"rel":"parent","href":"https://us15.api.mailchimp.com/3.0/templates","method":"GET","targetSchema":"https://us15.api.mailchimp.com/schema/3.0/Definitions/Templates/CollectionResponse.json","schema":"https://us15.api.mailchimp.com/schema/3.0/CollectionLinks/Templates.json"},{"rel":"delete","href":"https://us15.api.mailchimp.com/3.0/templates/17017","method":"DELETE"},{"rel":"default-content","href":"https://us15.api.mailchimp.com/3.0/templates/17017/default-content","method":"GET","targetSchema":"https://us15.api.mailchimp.com/schema/3.0/Definitions/Templates/Default-Content/Response.json","schema":"https://us15.api.mailchimp.com/schema/3.0/CollectionLinks/Templates.json"}]}'
);
