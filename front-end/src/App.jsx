import { useState } from 'react'
import './App.css'
import { Tabela } from './components/Tabela'
import { copyright, motto } from './components/Consts'

function App(){
	return (
		<>
			<div className="motto">{ motto }</div>
			<Tabela />
			<div className="copyright">{ copyright }</div>
		</>
	)
}

export default App
