<?php
require "vendor/autoload.php";
define('CONSUMER_KEY', 'TGMVS1dJBOF7BNw8kvqhO6YVu');
define("CONSUMER_SECRET", "BsdVZXVrWDHwu8nnpIc3Nb0J8veQ6uU43XsYI4WLQB7yWOW0cW");
$access_token = "1111009790866702337-0SF08f2KfLqMLx4LvGq70IFS7LLNaK";
$access_token_secret = "jtpYC3cP8OWjznMxIqRvH71vgUwa0SB0zn2Z4D8SAuigv";
use Abraham\TwitterOAuth\TwitterOAuth;
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token, $access_token_secret);
$content = $connection->get("account/verify_credentials");
$count = 50;
// $_GET["location"] = "Newman Library";
$locations = array(
                    "vet_school"=> array("", ""),
"mcbryde"=> array("37.230615", "-80.420281"),
"torgersen"=> array("37.229809", "-80.420281"),
"monteith"=> array("37.2319", "-80.4194"),
"thomas"=> array("37.2321", "-80.4200"),
"shanks"=> array("37.2318", "-80.4198"),
"military_building"=> array("37.23181", "-80.42153"),
"air_conditioning_plant"=> array("", ""),
"old_security_building"=> array("37.2315", "-80.4216"),
"femoyer"=> array("37.2314", "-80.4212"),
"art_and_design_learning_center"=> array("37.2317", "-80.42072"),
"major_williams"=> array("37.2310", "-80.4208"),
"performing_arts_building"=> array("", ""),
"brodie"=> array("", ""),
"pearson"=> array("37.23076", "-80.41896"),
"north_end"=> array("37.2335", " -80.4205"),
"north_end_garage"=> array("", ""),
"squires"=> array("37.229623", "-80.418000"),
"moss_arts_center"=> array("37.231865", "-80.418103"),
"newman_library"=> array("37.228719", "-80.419415"),
"henderson"=> array("37.23056", "-80.4167"),
"theater_101"=> array("37.23018", "-80.41634"),
"bookstore"=> array("37.228157", "-80.418614"),
"graduate_life_center"=> array("37.228245", "-80.417549"),
"architecture_annex"=> array("37.2286", "-80.4162"),
"media_annex"=> array("37.2288", "-80.4159"),
"armory"=> array("37.22932", "-80.41592"),
"media_building"=> array("37.2288", "-80.4153"),
"university_club"=> array("", ""),
"eggleston"=> array("37.2276", "-80.4200"),
"owens"=> array("37.226717", "-80.418860"),
"vawter"=> array("37.2270", "-80.4176"),
"burruss"=> array("37.229006", "-80.423757"),
"surge"=> array("37.233066", "-80.423154"),
"270F"=> array("", ""),
"goodwin"=> array("37.232549", "-80.425581"),
"newman"=> array("37.22612", "-80.41787"),
"war_memorial"=> array("37.226433", "-80.420679"),
"dietrick"=> array("37.22454", "-80.42111"),
"peddrew-yates"=> array("", ""),
"new_hall_east"=> array("37.2256", "-80.4191"),
"payne"=> array("37.2258", "-80.4200"),
"oshag"=> array("37.2251", "-80.4181"),
"johnson"=> array("37.2255", "-80.4177"),
"barringer"=> array("37.2263", "-80.4169"),
"miles"=> array("37.2256", "-80.4169"),
"lee"=> array("37.2245", "-80.4185"),
"campbell"=> array("37.2261", "-80.4219"),
"slusher"=> array("37.2252", "-80.4217"),
"pritchard"=> array("37.224234", "-80.419464"),
"patton"=> array("", ""),
"holden"=> array("", ""),
"randolph"=> array("37.230482", "-80.423443"),
"whittemore"=> array("", ""),
"durham"=> array("", ""),
"cowgill"=> array("", ""),
"lavery"=> array("37.231136", "-80.422872"),
"kelly"=> array("", ""),
"bishop_favrao"=> array("", ""),
"burke_johnston_student_center"=> array("", ""),
"derring"=> array("", ""),
"hahn_north"=> array("37.2283", "-80.4262"),
"new_classroom_building"=> array("37.2293", "-80.4270"),
"pamplin"=> array("37.2286", "-80.4248"),
"williams"=> array("37.22784", "-80.42435"),
"perry_parking"=> array("37.2312", "-80.4263"),
"davidson"=> array("37.2271", "-80.4252"),
"seitz"=> array("37.2248", "-80.4238"),
"inn"=> array("37.22994", "-80.43005"),
"price"=> array("37.2284", "80.4234"),
"sandy"=> array("37.2258", "-80.42351"),
"hutcheson"=> array("37.22571", "--80.42284"),
"cheatham"=> array("37.2236", "-80.4226"),
"smyth"=> array("37.2251", "-80.4231"),
"saunders"=> array("37.2249", "-80.4244"),
"latham"=> array("37.2242", "-80.4224"),
"frain_life_science_institute"=> array("", ""),
"engle"=> array("37.2234", "-80.42351"),
"wallace"=> array("37.22297", "--80.42427"),
"hillcrest"=> array("37.2239", "-80.4250"),
"wallace_annex"=> array("37.2240", "-80.4258"),
"ICTAS_2"=> array("37.2222", "-80.4254"),
"litton_reaves"=> array("37.2215", "-80.4238"),
"life_sciences"=> array("37.22092", "-80.42469"),
"human_agriculture_biosciences_building"=> array("37.2202", "-80.4273"),
"food_science_and_technology"=> array("37.2199", "-80.4253"),
"mccomas"=> array("37.220632", "-80.422402"),
"war_memorial_chapel"=> array("37.2289", "-80.4204"),
"the_grove"=> array("37.22432", "-80.42731"),
"cochrane"=> array("37.223264", "-80.422040"),
"student_services"=> array("37.2221", "-80.4218"),
"harper"=> array("37.2228", "-80.4232"),
"new_hall_west"=> array("37.2222", "-80.4224"),
"smith_career_center"=> array("37.2216", "-80.4225"),
"ambler_johnston"=> array("37.2231", "-80.4209"),
"bioinformatics"=> array("37.2208", "-80.42609"),
"math_emporium"=> array("", ""),
"rector_field_house"=> array("37.2190", "-80.4217"),
"lane_stadium"=> array("37.219981", "-80.418051"),
"hahn_practice_center"=> array("37.22331", "-80.41831"),
"cassell_coliseum"=> array("37.222640", "-80.419074"),
"drillfield"=> array("37.2274", "-80.4222"),
"merryman"=> array("37.2215", "-80.4191"),
"baseball_field"=> array("", ""),
"softball_field"=> array("", ""),
"hancock"=> array("37.2301", "-80.4242"),
"norris"=> array("37.2297", "-80.4233"),
"hahn_south"=> array("37.2279", "-80.4257"),
"robeson"=> array("37.2281", "-80.4252"),
"agnew"=> array("37.22476", "-80.42415")
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
 //echo count($tweets);
echo json_encode($tweets);

?>
