<?php declare(strict_types=1);

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

$body = '{"id":"d4000905c79bb68b7ce9b80df716a26d","email_address":"testuser+test1@example.com","unique_email_id":"00test00","email_type":"html","status":"subscribed","merge_fields":{"FNAME":"","LNAME":""},"stats":{"avg_open_rate":0,"avg_click_rate":0},"ip_signup":"","timestamp_signup":"","ip_opt":"8.8.8.8","timestamp_opt":"2017-02-21T08:36:59+00:00","member_rating":2,"last_changed":"2017-02-21T08:36:59+00:00","language":"","vip":false,"email_client":"","location":{"latitude":0,"longitude":0,"gmtoff":0,"dstoff":0,"country_code":"","timezone":""},"list_id":"215f4cfac8"}';
$code = 200;
/** @var Request $request */
$request = $this->lastRequest;
if ($request) {
	$reqBody = $request->getBody();
	$reqBody->rewind();
	$data = json_decode($reqBody->getContents(), true);
	if (isset($data['status']) && $data['status'] === 'badStatus') {
		$body = ' array.","instance":"","errors":[{"field":"","message":"Required fields were not provided: permission_reminder, email_type_option, campaign_defaults"},{"field":"contact.zip","message":"Schema describes string, integer found instead"}]}';
		$code = 400;
	}
}
return new Response(
	$code,
	['IsMock' => true],
	$body
);
