<!DOCTYPE html>
<html>
<head>
	<title>Tweetsburg</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
	<script sync src="https://platform.twitter.com/widgets.js"></script>
	<style type="text/css">
	body { margin: 0; }
			canvas { width: 100%; height: 100% }
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
		height: 90%;
		width: 500px;
		overflow: scroll;
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
		<!-- <h3>Tweetsburg</h3> -->
	<p id="tweet"> </p> 
	</div>
	<div id="tweets">
		
	</div>

			<script src="https://threejs.org/build/three.min.js"></script>
		
		<script src="https://rawgit.com/mrdoob/three.js/dev/examples/js/controls/OrbitControls.js"></script>
		<script src="https://rawgit.com/mrdoob/three.js/dev/examples/js/WebGL.js"></script>
		<script src="https://rawgit.com/mrdoob/three.js/dev/examples/js/utils/BufferGeometryUtils.js"></script>
		
		<script src="https://rawgit.com/mrdoob/three.js/dev/examples/js/loaders/GLTFLoader.js"></script>
		<script>
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
					// if(data.length == 0){
					// 	text.textContent = "No tweets are available from " + id + " at the moment.";
					// }else{
					// 	text.textContent = "Tweets from " + id + ".";
					// }
					$("ul").empty();
					var list = $("<ul id='list'>").appendTo('#tweets');
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
			var container;
			var camera, controls, scene, renderer;
			var pickingData = [], pickingTexture, pickingScene;
			var highlightBox;
			var projector, mouse = { x: 0, y: 0 }, INTERSECTED;
			var model;

			var clicking = false;
			
			var renderer = new THREE.WebGLRenderer({ antialias: true });
			renderer.setPixelRatio( window.devicePixelRatio );
			renderer.setSize( window.innerWidth, window.innerHeight);
			document.body.appendChild( renderer.domElement );
			
			camera = new THREE.PerspectiveCamera( 70, window.innerWidth / window.innerHeight, 1, 10000 );
			camera.position.set( 5, 5, 0 );
			
			controls = new THREE.OrbitControls( camera, renderer.domElement );

			//controls.addEventListener( 'change', render ); // call this only in static scenes (i.e., if there is no animation loop)
			controls.enableDamping = false; // an animation loop is required when either damping or auto-rotation are enabled
			controls.dampingFactor = 0.25;
			controls.screenSpacePanning = false;
			controls.minDistance = 1;
			controls.maxDistance = 500;
			controls.maxPolarAngle = Math.PI / 2;
			
			var scene = new THREE.Scene();
			scene.background = new THREE.Color( 0xffffff );
			scene.add( new THREE.AmbientLight( 0x555555 ) );
			
			var light = new THREE.SpotLight( 0xffffff, 1.5 );
			light.position.set( 0, 500, 2000 );
			scene.add( light );
			
			// initialize object to perform world/screen calculations
			projector = new THREE.Projector();
			
			// when the mouse moves, call the given function
			document.addEventListener('mousemove', onDocumentMouseMove, false);

			function onDocumentMouseMove(event) {
				// the following line would stop any other event handler from firing
				// (such as the mouse's TrackballControls)
				// update the mouse variable
				mouse.x = (event.clientX / (window.innerWidth)) * 2 - 1;
				mouse.y = -(event.clientY / (window.innerHeight)) * 2 + 1;
			}
			
			///////////////////////////////////////////////////////////
			document.addEventListener('mousedown', onDocumentMouseDown, false);
			document.addEventListener('mouseup', onDocumentMouseUp, false);

			function onDocumentMouseDown(event) {
				clicking = true;
			}
			function onDocumentMouseUp(event) {
				clicking = false;
			}
			///////////////////////////////////////////////////////////
			<!-- var geometry = new THREE.BoxGeometry( 1, 1, 1 ); -->
			<!-- var material = new THREE.MeshBasicMaterial( { color: 0x00ff00 } ); -->
			<!-- var cube = new THREE.Mesh( geometry, material ); -->
			<!-- scene.add( cube ); -->
			<!-- var cubeGeometry = new THREE.CubeGeometry( 1,1,1 ); -->
	<!-- var cubeMaterial = new THREE.MeshBasicMaterial( { color: 0x000088 } ); -->
	<!-- var cube = new THREE.Mesh( cubeGeometry, cubeMaterial ); -->
	<!-- cube.position.set(1,1,1); -->
	<!-- scene.add(cube); -->
			
			var loader = new THREE.GLTFLoader();
			
			loader.load( 'tweetsburg-complete.glb', function ( gltf ) {
				model = gltf.scene;

				console.log(model);
				scene.add( model );
			}, undefined, function ( error ) {
				console.error( error );
			} );
			
			console.log(scene);

			function animate() {
				requestAnimationFrame( animate );
				render();
				update();
			};
			
			function render() {
				<!-- controls.update(); -->
				renderer.render( scene, camera );
			}
			
			function update() {
				// find intersections
				// create a Ray with origin at the mouse position
				//   and direction into the scene (camera direction)
				var vector = new THREE.Vector3( mouse.x, mouse.y, 1 );
				projector.unprojectVector( vector, camera );
				var ray = new THREE.Raycaster( camera.position, vector.sub( camera.position ).normalize() );

				// create an array containing all objects in the scene with which the ray intersects
				var intersects = ray.intersectObjects( model.children );
	
				// if there is one (or more) intersections
				if (clicking && intersects.length > 0) {
					// if the closest object intersected is not the currently stored intersection object
					if ( intersects[ 0 ].object != INTERSECTED ) {
						// restore previous intersection object (if it exists) to its original color
						if ( INTERSECTED ) 
							INTERSECTED.material.color.setHex( INTERSECTED.currentHex );
						// store reference to closest object as current intersection object
						INTERSECTED = intersects[ 0 ].object;
						// store color of closest object (for later restoration)
						INTERSECTED.currentHex = INTERSECTED.material.color.getHex();
						// set a new color for closest object
						INTERSECTED.material.color.setHex( 0x1da1f2 );
						// set tweet panel to building name
						//name = INTERSECTED.name;
						name = "Burruss Hall";
						// handle checking here?
						populate(name);
						
					}
				} else {
					// restore previous intersection object (if it exists) to its original color
					if ( INTERSECTED ) 
						INTERSECTED.material.color.setHex( INTERSECTED.currentHex );
					// remove previous intersection object reference
					//     by setting current intersection object to "nothing"
					INTERSECTED = null;
				}
			}
			
			animate();
			
			
			
		</script>

</body>
</html>