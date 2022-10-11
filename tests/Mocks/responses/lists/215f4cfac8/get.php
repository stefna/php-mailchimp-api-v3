<?php declare(strict_types=1);

use GuzzleHttp\Psr7\Response;

return new Response(
	200,
	['IsMock' => true],
	'{"id":"215f4cfac8","name":"Main List","contact":{"company":"TestCompany","address1":"Addr1","address2":"","city":"Akureyri","state":"","zip":"600","country":"IS","phone":""},"permission_reminder":"TestPermReminder","use_archive_bar":true,"campaign_defaults":{"from_name":"Test User MailChimp Test","from_email":"testuser@example.com","subject":"","language":"en"},"notify_on_subscribe":"testuser@example.com","notify_on_unsubscribe":"testuser@example.com","date_created":"2017-02-17T07:41:37+00:00","list_rating":0,"email_type_option":false,"subscribe_url_short":"https://eepurl.com/test","subscribe_url_long":https:///stefna.us15.list-manage1.com/subscribe?u=00test00&id=215f4cfac8","beamer_address":"us15-2f157c56e0-00zz00@inbound.mailchimp.com","visibility":"pub","modules":[],"stats":{"member_count":0,"unsubscribe_count":0,"cleaned_count":0,"member_count_since_send":0,"unsubscribe_count_since_send":0,"cleaned_count_since_send":0,"campaign_count":0,"campaign_last_sent":"","merge_field_count":2,"avg_sub_rate":0,"avg_unsub_rate":0,"target_sub_rate":0,"open_rate":0,"click_rate":0,"last_sub_date":"","last_unsub_date":""}}'
);
