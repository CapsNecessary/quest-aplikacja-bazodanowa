let form, message, output, idOfTimeout, idOfInterval;

addEventListener( "DOMContentLoaded", _init );

function _init(){
	form = document.querySelectorAll( "form" )[0];
	output = document.getElementById( "output" );
	message = document.getElementById( "message" );
}

function callAPI(){
	const timeout = document.getElementById( "timeout" ).value;
	const method = document.getElementById( "method" ).value;
	const args = document.getElementById( "args" ).value;
	let json;
	if( ( json = returnAsJson( args ) ) != false ){
		console.log( args, method, json );
		if( method == "GET" ){
			// hopefully json only has a values of string
			const keys = Object.keys( json );
			let append = `?${ keys[ 0 ] }=${ json[ keys[ 0 ] ] }`;
			for( let i=1; i<keys.length; i++ ) append += `&${ keys[ i ] }=${ json[ keys[ i ] ] }`
			fetch(
				`https://localhost/database%20app/api/api.php${ append }`,
				{ method: `${ method }` }
			).then( e => {
				if( !e.ok ) console.log( e.status );
				e.text().then( content => {
					output.value = content;
					console.log( content, '\n', returnAsJson( content ) );
				});
			})
		}
		else{
			fetch(
				`https://localhost/database%20app/api/api.php`,
				{
					method: `${ method }`,
					body: `${ args }`
				}
			).then( e => {
				if( !e.ok ) console.log( e.status );
				e.text().then( content => {
					output.value = content;
					console.log( content, '\n', returnAsJson( content ) );
				});
			})
		}
	}
	if( document.getElementById( "repeat" ).checked ){
		animationTillNextRequest( timeout );
		idOfTimeout = setTimeout( () => { callAPI() }, timeout );
	}
}

function animationTillNextRequest( t ){
	var v = t, t = t;
	var start = performance.now(), end;
	clearInterval( idOfInterval );
	idOfInterval = setInterval( frame, 1 );
	
	function frame(){
		end = performance.now()
		document.getElementById( "timeTillNextRequest" ).value = v/t;
		v -= end -start;
		start = end;
		if( v <= 0 ) clearInterval( idOfInterval );
	}
}

function returnAsJson( json ){
	try{ return JSON.parse( json ); }
	catch( err ){
		console.log( "%c"+err, "color: orange" );
		message.innerHTML = err;
		return false;
	}
}

function clearOutput(){ output.value == "" }

function repeatRequest( e ){
	if( e.checked == false ){
		clearTimeout( idOfTimeout );
		clearInterval( idOfInterval );
		document.getElementById( "timeTillNextRequest" ).value = 0
	}
}