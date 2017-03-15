<?php

return new \GuzzleHttp\Psr7\Response(
	200,
	['IsMock' => true],
	'{"campaigns":[{"id":"0cefd1915f","type":"regular","create_time":"2017-02-21T10:04:47+00:00","archive_url":"http://eepurl.com/test","long_archive_url":"http://us15.campaign-archive2.com/?u=00test00&id=0cefd1915f","status":"save","emails_sent":0,"send_time":"","content_type":"template","recipients":{"list_id":"","list_name":"","segment_text":"","recipient_count":0},"settings":{"subject_line":"TestSubjectLine","title":"","from_name":"TestFromName","reply_to":"testuser@example.com","use_conversation":false,"to_name":"","folder_id":"","authenticate":true,"auto_footer":false,"inline_css":false,"auto_tweet":false,"fb_comments":true,"timewarp":false,"template_id":0,"drag_and_drop":false},"tracking":{"opens":true,"html_clicks":true,"text_clicks":false,"goal_tracking":false,"ecomm360":false,"google_analytics":"","clicktale":"N"},"delivery_status":{"enabled":false}}],"total_items":1}'
);

