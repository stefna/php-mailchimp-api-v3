<?php declare(strict_types=1);

use GuzzleHttp\Psr7\Response;

return new Response(
	200,
	['IsMock' => true],
	'{"id":"d4000905c79bb68b7ce9b80df716a26d","email_address":"testuser+test1@example.com","unique_email_id":"3caae7bb8c","email_type":"html","status":"unsubscribed","unsubscribe_reason":"N/A (Unsubscribed by an admin)","merge_fields":{"FNAME":"","LNAME":""},"stats":{"avg_open_rate":0,"avg_click_rate":0},"ip_signup":"","timestamp_signup":"","ip_opt":"8.8.8.8","timestamp_opt":"2017-02-21T08:36:59+00:00","member_rating":2,"last_changed":"2017-02-21T08:44:15+00:00","language":"","vip":false,"email_client":"","location":{"latitude":0,"longitude":0,"gmtoff":0,"dstoff":0,"country_code":"","timezone":""},"list_id":"215f4cfac8"}'
);
