<!DOCTYPE html>
<html>
<head>
	<title>Tweetsburg</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
	<script sync src="https://platform.twitter.com/widgets.js"></script>
	<style type="text/css">
	h3{
		font-family: 'Helvetica Neue', sans-serif;
		font-size: 50px;
		font-weight: bold;
		letter-spacing: -1px;
		color: orange;
		text-align: center;
	}
	img{
		border-radius: 50%;
	}
	#tweet {
		width: 400px !important;
	}

	#tweet iframe {
		border: none !important;
		box-shadow: none !important;
	}
	ul{
		list-style: none;
	}
	ul{
		position: absolute;
		left: 65%;
		top: 30px;
	}
	#tweet{
		font-family: 'Open Sans', sans-serif;
		text-align: center;
		position: relative;
		left: 38%;
		top: -30px;
	}
</style>
</head>
<body>
	<h3>Tweetsburg</h3>
		<p id="tweet"> </p>
	<div>
		<img src="moss.jpeg" height="300" width="300" id="Moss Art Center">
		<img src="newman.png" height="300" width="300" id="Newman Library">
		<img src="burruss.jpg" height="300" width="300" id="Burruss Hall"> <br>
		<img src="pritchard.JPG" height="300" width="300" id="Pritchard Hall">
		<img src="mccommas.jpg" height="300" width="300" id="McCommas Hall">
		<img src="goodwin.jpg" height="300" width="300" id="Goodwin Hall">
	</div>

	<script type="text/javascript">
		function populate(id){
			$.ajax({
				type: "GET",
				url: 'api.php',
				dataType: "json",
				data: {
					'location':id
				},
				success: function(data){
					var text = document.getElementById("tweet");
					if(data.length == 0){
						text.textContent = "No tweets are available from " + id + " at the moment.";
					}else{
						text.textContent = "Tweets from " + id + ".";
					}
					$("ul").empty();
					var list = $("<ul id='list'>").appendTo("body");
					for(var i = 0; i < data.length; i++){
						var link = '<a href="'+data[i]+'" target="_blank">'+data[i]+'</a>';
						var div = '<div class="tweet" id=' + data[i] + ">" +'</div>';
						list.append("<li>" + div + "</li>");
					}
					list.append("</ul>");
					var tweets = jQuery(".tweet");

					jQuery(tweets).each( function( t, tweet ) { 

						var id = jQuery(this).attr('id');

						twttr.widgets.createTweet(
							id, tweet, 
							{
        conversation : 'none',    // or all
        cards        : 'hidden',  // or visible 
        linkColor    : '#cc0000', // default is blue
        theme        : 'light'    // or dark
    });

					});
				}
			});
		}
		$(document).ready(function(){
			$("img").click(function(e){

				var id = this.id;
				console.log(id);
				populate(id);

			});
		});
	</script>
</body>
</html>