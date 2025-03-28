import { useState } from "react";
import { kategorie, uwiwOptions } from "./Consts";

export const filterDevices = (devices, selectedCategory) => {
		return devices.filter(device => 
			(selectedCategory === "Wszystkie" || device.kategoria === selectedCategory) 
		);
	};

const SelectKategoria = ({ selectedCategory, setSelectedCategory }) => {
		return (
			<div>
				Wybierz kategorię
				<select className="filtr-select">
					{kategorie.map((category, index) => (
						<option 
								key={index} 
								value={category}
								onClick={() => setSelectedCategory(category)}>
							{category}
						</option>
					))}
				</select>
			</div>
		);
	};
	const SelectUwiw = () => {
		return (
			<div>
				Ewidencja/UWIW
				<select name="uwiw" className="filtr-select">
					{uwiwOptions.map((option, index) => (
						<option key={index} value={option.value}>
							{option.label}
						</option>
					))}
				</select>
			</div>
		);
	};



export const Filtry = ({ selectedCategory, setSelectedCategory }) => {
		return <div>
				<SelectKategoria 
						selectedCategory={selectedCategory} 
						setSelectedCategory={setSelectedCategory} 
				/>
				<SelectUwiw />
				...
		</div>;
};