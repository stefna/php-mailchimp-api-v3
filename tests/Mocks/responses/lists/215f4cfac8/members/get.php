<?php

return new \GuzzleHttp\Psr7\Response(
	200,
	['IsMock' => true],
	'{"members":[{"id":"7ec7606c46a14a7ef514d1f1f9038823","email_address":"testuser@example.com","unique_email_id":"00uei00","email_type":"html","status":"subscribed","merge_fields":{"FNAME":"Test","LNAME":"User"},"stats":{"avg_open_rate":0,"avg_click_rate":0},"ip_signup":"","timestamp_signup":"","ip_opt":"8.8.8.8","timestamp_opt":"2017-02-21T07:33:54+00:00","member_rating":2,"last_changed":"2017-02-21T07:33:54+00:00","language":"","vip":false,"email_client":"","location":{"latitude":0,"longitude":0,"gmtoff":0,"dstoff":0,"country_code":"","timezone":""},"list_id":"215f4cfac8"}],"list_id":"215f4cfac8","total_items":1}'
);
