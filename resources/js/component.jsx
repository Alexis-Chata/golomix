import React from 'react';
import ReactDOM from 'react-dom/client';
import App from './TableComponent';

// Encuentra el contenedor donde se montará el componente
const reactRoot = document.getElementById('react-root');

if (reactRoot) {
    ReactDOM.createRoot(reactRoot).render(<App />);
}
