import { initialDevices } from './Consts';
import { PrzyciskiKategorii } from './PrzyciskiKategorii';
import { Filtry, filterDevices } from './Filtry';
import './Tabela.css'
import { useState } from 'react';

export const Tabela = () => {
		const [selectedCategory, setSelectedCategory] = useState("Wszystkie");
		const [selectedUwiw, setSelectedUwiw] = useState("nastanie");
		let devices = initialDevices;
		return (
				<div className="tabela-container">
						<div className='kontener-filtry-boczne'>
								<PrzyciskiKategorii
										selectedCategory={selectedCategory} 
										setSelectedCategory={setSelectedCategory} 
								/></div>
						<div className="kontener-grida">
								<div className="szeroki-div-grida"> 
										<Filtry 
												selectedCategory={selectedCategory} 
												setSelectedCategory={setSelectedCategory} 
										/> </div>
								<div className="uwiw">Ewidencja</div>
								<div className="sala">Sala</div>
								<div className="kategoria">Kategoria</div>
								<div className="model">Model</div>
								<div className="obudowa">Obudowa</div>
								<div className="data-zakupu">Data zakupu</div>
								<div className="status">Status</div>
								<div className="operacje operacje4x">Operacje</div>
								{/*devices = filterDevices(devices,selectedCategory)*/}
								{devices.map(device => (
										<>
												<div className="uwiw">{device.uwiw}</div>
												<div className="sala">{device.sala}</div>
												<div className="kategoria">{device.kategoria}</div>
												<div className="model">Model: {device.model}<br />{device.przekatna && `Przekątna: ${device.przekatna}`}<br /></div>
												<div className="obudowa">{device.obudowa}</div>
												<div className="data-zakupu">{device.data_zakupu}</div>
												<div className="status">{device.status_}</div>
												<a href={`#operacja=edit&id=${device.id}`} className="button">Edytuj</a>
												<a href={`#operacja=przen&id=${device.id}`} className="button">Przenieś</a>
												<a href={`#operacja=del&id=${device.id}`} className="button">Kasacja</a>
												<a href={`#operacja=hist&id=${device.id}`} className="button">Historia</a>
										</>
								))}
								<div className="szeroki-div-grida">Liczba pozycji: {initialDevices.length}</div>
						</div>
				</div>
		);
}



export const TabelaOld = () => {

return(
		<>
		<div class="kontener-grida">
		<div class="szeroki-div-grida">Filtry</div>
		<div class="uwiw">Ewidencja</div>
		<div class="sala">Sala</div>
		<div class="kategoria">Kategoria</div>
		<div class="model">Model</div>
		<div class="obudowa">Obudowa</div>
		<div class="data-zakupu">Data zakupu</div>
		<div class="status">Status</div>
		<div class="operacje operacje4x">Operacje</div>
				<div class="uwiw">UW/8134</div>
				<div class="sala">235</div>
				<div class="kategoria">monitor</div>
				<div class="model">Model: BenQ GW2270<br /></div>
				<div class="obudowa"></div>
				<div class="data-zakupu">2019-02-13</div>
				<div class="status">2021-11-09 potwierdzony</div> 
				<div class="operacje"><a href="#operacja=edit&id=728" class="button">Edytuj</a></div>
				<div class="operacje"><a href="#operacja=przen&id=728" class="button">Przenieś</a></div>
				<div class="operacje"><a href="#operacja=del&id=728" class="button">Kasacja</a></div>
				<div class="operacje"><a href="#operacja=hist&id=728" class="button">Historia</a></div> 
				<div class="uwiw">UW/7172</div>
				<div class="sala">235</div>
				<div class="kategoria">monitor</div>
				<div class="model">Model: Philips 223V5L kjuhh:jjgj:kjhsdjgh:jgsdf dshgfakjdashg fkjdhsg<br />Przekątna: 21,5<br /></div>
				<div class="obudowa">czarny</div>
				<div class="data-zakupu">2018-07-01</div>
				<div class="status">2021-09-27 potwierdzony</div> 
				<div class="operacje"><a href="#operacja=edit&id=660" class="button">Edytuj</a></div>
				<div class="operacje"><a href="#operacja=przen&id=660" class="button">Przenieś</a></div>
				<div class="operacje"><a href="#operacja=del&id=660" class="button">Kasacja</a></div>
				<div class="operacje"><a href="#operacja=hist&id=660" class="button">Historia</a></div> 
				<div class="uwiw">UW/7273</div>
				<div class="sala">235</div>
				<div class="kategoria">monitor</div>
				<div class="model">Model: Philips 223V5L<br />Przekątna: 21,5<br /></div>
				<div class="obudowa">czarny</div>
				<div class="data-zakupu">2018-07-01</div>
				<div class="status">2021-09-27 potwierdzony</div> 
				<div class="operacje"><a href="#operacja=edit&id=659" class="button">Edytuj</a></div>
				<div class="operacje"><a href="#operacja=przen&id=659" class="button">Przenieś</a></div>
				<div class="operacje"><a href="#operacja=del&id=659" class="button">Kasacja</a></div>
				<div class="operacje"><a href="#operacja=hist&id=659" class="button">Historia</a></div> 
				<div class="uwiw">UW/1796</div>
				<div class="sala">235</div>
				<div class="kategoria">komputer</div>
				<div class="model">Model: stacjonarny i3-4500 MSI-B250<br /></div>
				<div class="obudowa">czarny Silentium</div>
				<div class="data-zakupu">2018-06-27</div>
				<div class="status">2021-11-09 potwierdzony</div> 
				<div class="operacje"><a href="#operacja=edit&id=626" class="button">Edytuj</a></div>
				<div class="operacje"><a href="#operacja=przen&id=626" class="button">Przenieś</a></div>
				<div class="operacje"><a href="#operacja=del&id=626" class="button">Kasacja</a></div>
				<div class="operacje"><a href="#operacja=hist&id=626" class="button">Historia</a></div> 
				<div class="uwiw">UW/7917</div>
				<div class="sala">235</div>
				<div class="kategoria">komputer</div>
				<div class="model">Model: stacjonarny i3-4500 MSI-B250M<br />Płyta: MSI B250M PRO-VDH</div>
				<div class="obudowa">czarny Silentium</div>
				<div class="data-zakupu">2018-06-27</div>
				<div class="status">2021-11-09 potwierdzony</div> 
				<div class="operacje"><a href="#operacja=edit&id=625" class="button">Edytuj</a></div>
				<div class="operacje"><a href="#operacja=przen&id=625" class="button">Przenieś</a></div>
				<div class="operacje"><a href="#operacja=del&id=625" class="button">Kasacja</a></div>
				<div class="operacje"><a href="#operacja=hist&id=625" class="button">Historia</a></div> 
				<div class="uwiw">UW/1761</div>
				<div class="sala">235</div>
				<div class="kategoria">switch</div>
				<div class="model">Model: Tp-Link TL-SG3216<br />Inne: mobilna duża szafa<br /></div>
				<div class="obudowa"></div>
				<div class="data-zakupu">2017-01-01</div>
				<div class="status">2018-10-24 potwierdzony</div> 
				<div class="operacje"><a href="#operacja=edit&id=583" class="button">Edytuj</a></div>
				<div class="operacje"><a href="#operacja=przen&id=583" class="button">Przenieś</a></div>
				<div class="operacje"><a href="#operacja=del&id=583" class="button">Kasacja</a></div>
				<div class="operacje"><a href="#operacja=hist&id=583" class="button">Historia</a></div> 
				<div class="uwiw">UW/3153</div>
				<div class="sala">235</div>
				<div class="kategoria">switch</div>
				<div class="model">Model: D-Link DGS-1224T <br />Inne: mobilna duża szafa</div>
				<div class="obudowa">19'</div>
				<div class="data-zakupu">2011-01-01</div>
				<div class="status">2019-02-28 potwierdzony</div> 
				<div class="operacje"><a href="#operacja=edit&id=580" class="button">Edytuj</a></div>
				<div class="operacje"><a href="#operacja=przen&id=580" class="button">Przenieś</a></div>
				<div class="operacje"><a href="#operacja=del&id=580" class="button">Kasacja</a></div>
				<div class="operacje"><a href="#operacja=hist&id=580" class="button">Historia</a></div> 
				<div class="uwiw">UW/1120</div>
				<div class="sala">235</div>
				<div class="kategoria">projektor</div>
				<div class="model">Model: Benq MP-735<br /></div>
				<div class="obudowa"></div>
				<div class="data-zakupu">2010-12-30</div>
				<div class="status">2018-10-23 potwierdzony</div> 
				<div class="operacje"><a href="#operacja=edit&id=499" class="button">Edytuj</a></div>
				<div class="operacje"><a href="#operacja=przen&id=499" class="button">Przenieś</a></div>
				<div class="operacje"><a href="#operacja=del&id=499" class="button">Kasacja</a></div>
				<div class="operacje"><a href="#operacja=hist&id=499" class="button">Historia</a></div> 
				<div class="szeroki-div-grida">Liość pozycji: 46</div>
		</div>
		</>
)
}