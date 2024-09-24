import React, { useState, useEffect } from 'react';

const TablaDatos = ({ data }) => {
    return (
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Ciudad</th>
                </tr>
            </thead>
            <tbody>
                {data.map((item, index) => (
                    <tr key={index}>
                        <td>{item.id}</td>
                        <td>{item.nombre}</td>
                        <td>{item.edad}</td>
                        <td>{item.ciudad}</td>
                    </tr>
                ))}
            </tbody>
        </table>
    );
};

const App = () => {
    const [datosProcesados, setDatosProcesados] = useState([]);

    useEffect(() => {
        // Llamar a la función de búsqueda de datos cuando el componente se monta
        datafecth('cven_value', setDatosProcesados);
    }, []);

    return (
        <div>
            <h1>Datos Procesados</h1>
            {/* Mostrar la tabla solo si hay datos procesados */}
            {datosProcesados.length > 0 ? (
                <TablaDatos data={datosProcesados} />
            ) : (
                <p>Cargando datos...</p>
            )}
        </div>
    );
};

export default App;
