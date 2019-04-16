<?php
require "vendor/autoload.php";
define('CONSUMER_KEY', 'TGMVS1dJBOF7BNw8kvqhO6YVu');
define("CONSUMER_SECRET", "BsdVZXVrWDHwu8nnpIc3Nb0J8veQ6uU43XsYI4WLQB7yWOW0cW");
$access_token = "1111009790866702337-0SF08f2KfLqMLx4LvGq70IFS7LLNaK";
$access_token_secret = "jtpYC3cP8OWjznMxIqRvH71vgUwa0SB0zn2Z4D8SAuigv";
use Abraham\TwitterOAuth\TwitterOAuth;
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token, $access_token_secret);
$content = $connection->get("account/verify_credentials");
$count = 20;
// $_GET["location"] = "Newman Library";
$locations = array(
                    "Burruss Hall" => array("37.229006", "-80.423757"),
                    "Newman Library" => array("37.228719", "-80.419415"),
                    "Moss Art Center" => array("37.231865", "-80.418103"),
                    "Pritchard Hall" => array("37.224234", "-80.419464"),
                    "McCommas Hall" => array("37.220632", "-80.422402"),
                    "Goodwin Hall" => array("37.232549", "-80.425581")
                  );
$location  = $_GET["location"];
$geocode = $locations[$location][0]. ",". $locations[$location][1]. ",0.13mi";
$statuses = $connection->get("search/tweets", ["geocode" => $geocode, "count"=> $count]);
 //print_r($locations);
 //print_r($statuses);
 $tweets = array();
 foreach($statuses as $stat){
   foreach($stat as $s){
     if(isset($s->id_str)){
             $tweets[] = $s->id_str;
             //"https://twitter.com/statuses/".
     }
   }
 }
echo json_encode($tweets);

?>
