console.log("The bot is starting.");
var Twit = require('twit');
var config = require('./config');
var T = new Twit(config);
let map = {
  "Newman Library": [37.228719,-80.419415],
  "Moss Art Center": [37.231865, -80.418103],
  "Burruss Hall": [37.229006, -80.423757]
};
T.get('search/tweets', { geocode:"" + map["Newman Library"][0] +"," +map["Newman Library"][1] + ",0.13mi", count: 100 }, function(err, data, response) {
  console.log(data[].length);
  console.log(data["statuses"][0]['id_str']);
})
// T.get('geo/search', { lat:37.228719, long:-80.419415, granularity: "city", accuracy:"500ft" }, function(err, data, response) {
//   console.log(data["result"]['places']);
// })
//37.223937, -80.419433 - Pritchard
//37.228719, -80.419415 - Newman
//1113549377325469702
// 37.233646, -80.434388 - UMall
