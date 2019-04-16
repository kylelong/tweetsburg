<?php
require "vendor/autoload.php";
define('CONSUMER_KEY', 'TGMVS1dJBOF7BNw8kvqhO6YVu');
define("CONSUMER_SECRET", "BsdVZXVrWDHwu8nnpIc3Nb0J8veQ6uU43XsYI4WLQB7yWOW0cW");
$access_token = "1111009790866702337-0SF08f2KfLqMLx4LvGq70IFS7LLNaK";
$access_token_secret = "jtpYC3cP8OWjznMxIqRvH71vgUwa0SB0zn2Z4D8SAuigv";
use Abraham\TwitterOAuth\TwitterOAuth;
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token, $access_token_secret);
$content = $connection->get("account/verify_credentials");
$statuses = $connection->get("search/tweets", ["geocode" => "37.229006,-80.423757,0.07mi", "count"=> 100]);
print_r($statuses);
?>
