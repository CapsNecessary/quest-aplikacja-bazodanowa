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
	const method = document.getElementById( "method" ).value;
	const args = document.getElementById( "args" ).value;
	const output = document.getElementById( "output" );
	const message = document.getElementById( "message" );
	console.log( args )
	try{
		json = JSON.parse( args );
		console.log( json )
		if( method == "GET" ){
			// to do: make append
			let append;
			fetch(
				`https://localhost/database%20app/api/api.php${ append }`,
				{ method: `${ method }` }
			).then( e => {
				if( !e.ok ) console.log( e.status );
				e.text().then( output.innerHTML );
			})
		}
		else{	
			fetch(
				`https://localhost/database%20app/api/api.php`,
				{
					method: `${ method }`,
					body: json
				}
			).then( e => {
				if( !e.ok ) console.log( e.status );
				e.text().then( output.innerHTML );
			})
		}
	}
	catch(err){
		console.error( err );
		message.innerHTML = err;
	}
}