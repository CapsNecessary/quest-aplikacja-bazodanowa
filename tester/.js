let form;

addEventListener( "DOMContentLoaded", _init );

function _init(){
	form = document.querySelectorAll( "form" )[0];
	
	addEventListener( 'submit', e => {
		e.preventDefault();
		callAPI();
	} )
}

function callAPI(){
	const timeout = document.getElementById( "timeout" ).value;
	console.log( timeout, performance.now() );
	const method = document.getElementById( "method" ).value;
	const args = document.getElementById( "args" ).value;
	const output = document.getElementById( "output" );
	const message = document.getElementById( "message" );
	console.log( args )
	let json;
	if( json = JSON.parse( args ) != false ){
		console.log( json )
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
					output.innerHTML = content;
					try{ console.log( content, '\n', JSON.parse( content ) ); }
					catch( err ){
						console.error( err );
						message.innerHTML = err;
					}
				});
			})
		}
		else{
			console.log( args, method, json );
			fetch(
				`https://localhost/database%20app/api/api.php`,
				{
					method: `${ method }`,
					body: `${ args }`
				}
			).then( e => {
				if( !e.ok ) console.log( e.status );
				e.text().then( content => {
					output.innerHTML = content;
					try{ console.log( content, '\n', JSON.parse( content ) ); }
					catch( err ){
						console.error( err );
						message.innerHTML = err;
					}
				});
			})
		}
	}
	if( document.getElementById( "repeat" ).checked ) setTimeout( () => { callAPI(); animationTillNextRequest( timeout ) }, timeout );
}

function animationTillNextRequest( t, v=t ){
	console.log(1);
	document.getElementById( "timeTillNextRequest" ).value = v/t;
	if( t > 0 ) setTimeout( animationTillNextRequest( t, v-1 ), 1 );
}

function returnAsJson( json ){
	try{ return JSON.parse( json ); }
	catch( err ){
		console.error( err );
		message.innerHTML = err;
		return false;
	}
}