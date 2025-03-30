import { StrictMode } from 'react';
import { createRoot } from 'react-dom/client';
import './index.css';
import App from './App.jsx';
import "../../css/dark-and-light-mode.css";

createRoot(document.getElementById('root')).render(
	<StrictMode>
		<App />
	</StrictMode>,
)
