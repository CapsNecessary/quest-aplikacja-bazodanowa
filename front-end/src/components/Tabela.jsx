import { initialDevices } from './Consts';
import { PrzyciskiKategorii } from './PrzyciskiKategorii';
import { Filtry, filterDevices } from './Filtry';
import './Tabela.css'
import { useEffect, useState } from 'react';

export const Tabela = () => {
	const [selectedCategory, setSelectedCategory] = useState("Wszystkie");
	const [selectedUwiw, setSelectedUwiw] = useState("nastanie");
	let devices = initialDevices;
	
	// useEffect( () => { fetchDatabase } );
	
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
				{ devices = filterDevices( devices, selectedCategory ) }
				{ devices.map( device => (
					<div className="wiersz" key={ device.id }>
						<div className="uwiw">{ device.uwiw }</div>
						<div className="sala">{ device.sala }</div>
						<div className="kategoria">{ device.kategoria }</div>
						<div className="model">Model: { device.model }<br />{ device.przekatna && `Przekątna: ${ device.przekatna }` }<br /></div>
						<div className="obudowa">{ device.obudowa }</div>
						<div className="data-zakupu">{ device.data_zakupu }</div>
						<div className="status">{ device.status_ }</div>
						<div className="operacje"><a href={ `#operacja=edit&id=${ device.id }` } className="button">Edytuj</a></div>
						<div className="operacje"><a href={ `#operacja=przen&id=${ device.id }` } className="button">Przenieś</a></div>
						<div className="operacje"><a href={ `#operacja=del&id=${ device.id }` } className="button">Kasacja</a></div>
						<div className="operacje"><a href={ `#operacja=hist&id=${ device.id }` } className="button">Historia</a></div>
					</div>
				))}
				<div className="szeroki-div-grida">Liczba pozycji: { initialDevices.length}</div>
			</div>
		</div>
	);
}
