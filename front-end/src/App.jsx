import { useState } from 'react'
import './App.css'
import { Tabela } from './components/Tabela'
import { copyright, motto } from './components/Consts'

function App() {
	const [count, setCount] = useState(0)

	return (
		<>
				<body>
						<div className="app-container">
								<div className="motto">{motto}</div>
								<Tabela />
								<div className="copyright">{copyright}</div>
						</div>
				</body>
		</>
	)
}

export default App
