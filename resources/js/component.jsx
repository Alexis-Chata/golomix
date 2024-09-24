import React from 'react';
import ReactDOM from 'react-dom/client';
import TableComponent from './TableComponent';

// Encuentra el contenedor donde se montará el componente
const reactRoot = document.getElementById('react-root');

// Datos que se pasarán a la tabla como prop
const data = [
    { id: 1, nombre: 'Juan', edad: 25, ciudad: 'Madrid' },
    { id: 2, nombre: 'María', edad: 30, ciudad: 'Barcelona' },
    { id: 3, nombre: 'Carlos', edad: 35, ciudad: 'Valencia' },
  ];

if (reactRoot) {
    ReactDOM.createRoot(reactRoot).render(<TableComponent data={data} />);
}
