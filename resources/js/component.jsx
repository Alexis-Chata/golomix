import React from 'react';
import ReactDOM from 'react-dom/client';
import App from './TableComponent';
import Cod_vendido from './ProductocodVendidoComponent';

// Encuentra el contenedor donde se montará el componente
const reactRoot = document.getElementById('react-root');

if (reactRoot) {
    ReactDOM.createRoot(reactRoot).render(<App />);
}

// Encuentra el contenedor donde se montará el componente
const reactCod_vendido = document.getElementById('react-cod-vendido');

if (reactCod_vendido) {
    ReactDOM.createRoot(reactCod_vendido).render(<Cod_vendido />);
}
