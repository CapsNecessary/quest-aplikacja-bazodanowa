import { initialDevices } from './Consts';
import { PrzyciskiKategorii } from './PrzyciskiKategorii';
import { Filtry, filterDevices } from './Filtry';
import './Tabela.css'
import axios from "axios";
import { useEffect, useState } from 'react';

const API_Get = 'https://localhost/database%20app/api/api.php?table=urzadzenia';
const API_Other = "https://localhost/database%20app/api/api.php";

export const Tabela = () => {
	const [ selectedCategory, setSelectedCategory ] = useState( "Wszystkie" );
	const [ selectedUwiw, setSelectedUwiw ] = useState( "nastanie" );
	// let devices = initialDevices;
	const [ devices, setUrzadzenia ] = useState( initialDevices );
	
	useEffect( () => { fetchUrzadzenia(); }, [] );
	
	const fetchUrzadzenia = async () => {
		try{
			const response = await axios.get( API_Get );
			let res = response.data;
			console.log( res.join() );
			for (let i = 0; i < res.length; i++){
				res[ i ][ "id" ]			= res[ i ][ 0 ];
				res[ i ][ "uwiw" ]			= res[ i ][ 1 ];
				res[ i ][ "kategoria" ]		= res[ i ][ 2 ];
				res[ i ][ "sala" ]			= res[ i ][ 3 ];
				res[ i ][ "lpwsali" ]		= res[ i ][ 4 ];
				res[ i ][ "model" ]			= res[ i ][ 5 ];
				res[ i ][ "obudowa" ]		= res[ i ][ 6 ];
				res[ i ][ "procesor" ]		= res[ i ][ 7 ];
				res[ i ][ "ram" ]			= res[ i ][ 8 ];
				res[ i ][ "plyta" ]			= res[ i ][ 9 ];
				res[ i ][ "dysk" ]			= res[ i ][ 10 ];
				res[ i ][ "przekatna" ]		= res[ i ][ 11 ];
				res[ i ][ "mac" ]			= res[ i ][ 12 ];
				res[ i ][ "licencje" ]		= res[ i ][ 13 ];
				res[ i ][ "inne" ]			= res[ i ][ 14 ];
				res[ i ][ "data_zakupu" ]	= res[ i ][ 15 ];
				res[ i ][ "status" ]		= res[ i ][ 16 ];
			}
			setUrzadzenia( res );
			console.log( res );
		} catch( error ){
			console.error( 'Błąd podczas pobierania urzadzeń:', error );
		}
	};
	
	return (
		<div className="tabela-container">
			<div className='kontener-filtry-boczne'>
				<PrzyciskiKategorii
					selectedCategory={ selectedCategory } 
					setSelectedCategory={ setSelectedCategory } 
				/></div>
			<div className="kontener-grida">
				<div className="szeroki-div-grida"> 
						<Filtry 
								selectedCategory={ selectedCategory } 
								setSelectedCategory={ setSelectedCategory } 
						/> </div>
				<div className="wiersz">
					<div className="uwiw">Ewidencja</div>
					<div className="sala">Sala</div>
					<div className="kategoria">Kategoria</div>
					<div className="model">Model</div>
					<div className="obudowa">Obudowa</div>
					<div className="data-zakupu">Data zakupu</div>
					<div className="status">Status</div>
					<div className="operacje operacje4x">Operacje</div>
				</div>
				{ filterDevices( devices, selectedCategory ).map( device => (
					<div className="wiersz" key={ device.id }>
						<div className="uwiw">{ device.uwiw }</div>
						<div className="sala">{ device.sala }</div>
						<div className="kategoria">{ device.kategoria }</div>
						<div className="model">{ device.model && `Model: ${ device.model }` }{ device.model && device.przekatna && <br/> }{ device.przekatna && `\nPrzekątna: ${ device.przekatna }` }</div>
						<div className="obudowa">{ device.obudowa }</div>
						<div className="data-zakupu">{ device.data_zakupu }</div>
						<div className="status">{ device.status }</div>
						<div className="operacje"><a href={ `#operacja=edit&id=${ device.id }` } className="button">Edytuj</a></div>
						<div className="operacje"><a href={ `#operacja=przen&id=${ device.id }` } className="button">Przenieś</a></div>
						<div className="operacje"><a href={ `#operacja=del&id=${ device.id }` } className="button">Kasacja</a></div>
						<div className="operacje"><a href={ `#operacja=hist&id=${ device.id }` } className="button">Historia</a></div>
					</div>
				))}
				<div className="szeroki-div-grida">Liczba pozycji: { filterDevices( devices, selectedCategory ).length }</div>
			</div>
		</div>
	);
}