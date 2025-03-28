import { useState } from 'react'
import './App.css'
import { Tabela } from './components/Tabela'
import { copyright, motto } from './components/Consts'

function App() {
	const [count, setCount] = useState(0)

	return (
		<>
			<div className="app-container">
					<div className="motto">{motto}</div>
					<Tabela />
					<div className="copyright">{copyright}</div>
			</div>
		</>
	)
}

export default App
