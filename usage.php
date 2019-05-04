<?php
require "vendor/autoload.php";
define('CONSUMER_KEY', 'TGMVS1dJBOF7BNw8kvqhO6YVu');
define("CONSUMER_SECRET", "BsdVZXVrWDHwu8nnpIc3Nb0J8veQ6uU43XsYI4WLQB7yWOW0cW");
$access_token = "1111009790866702337-0SF08f2KfLqMLx4LvGq70IFS7LLNaK";
$access_token_secret = "jtpYC3cP8OWjznMxIqRvH71vgUwa0SB0zn2Z4D8SAuigv";
use Abraham\TwitterOAuth\TwitterOAuth;
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token, $access_token_secret);
$content = $connection->get("account/verify_credentials");
$usage = $connection->get("application/rate_limit_status");
print_r($usage);
?>