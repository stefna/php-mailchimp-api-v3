<?php declare(strict_types=1);

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

$body = '{"id":"0cefd1915f","type":"regular","create_time":"2017-02-21T10:04:47+00:00","archive_url":"https://eepurl.com/test","long_archive_url":https:///us15.campaign-archive1.com/?u=00test00&id=0cefd1915f","status":"save","emails_sent":0,"send_time":"","content_type":"template","recipients":{"list_id":"","list_name":"","segment_text":"","recipient_count":0},"settings":{"subject_line":"TestSubjectLine","title":"","from_name":"TestFromName","reply_to":"testuser@example.com","use_conversation":false,"to_name":"","folder_id":"","authenticate":true,"auto_footer":false,"inline_css":false,"auto_tweet":false,"fb_comments":true,"timewarp":false,"template_id":0,"drag_and_drop":false},"tracking":{"opens":true,"html_clicks":true,"text_clicks":false,"goal_tracking":false,"ecomm360":false,"google_analytics":"","clicktale":"N"},"delivery_status":{"enabled":false}}';
$code = 200;
/** @var Request $request */
$request = $this->lastRequest;
if ($request) {
	$reqBody = $request->getBody();
	$reqBody->rewind();
	$data = json_decode($reqBody->getContents(), true);
	if (isset($data['settings']['subject_line']) && $data['settings']['subject_line'] === 'TestSubjectLineBad') {
		$body = '{"type":"https://developer.mailchimp.com/documentation/mailchimp/guides/error-glossary/","title":"Invalid Resource","status":400,"detail":"The resource submitted could not be validated. For field-specific details, see the \'errors\' array.","instance":"","errors":[{"field":"type","message":"Model presented is not one of the accepted values: regular, plaintext, absplit, rss, variate."}]}';
		$code = 400;
	}
}
return new Response(
	$code,
	['IsMock' => true],
	$body
);

