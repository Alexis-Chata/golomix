import React, { useState, useEffect } from 'react';

const TablaDatos = ({ data }) => {
    return (
        <table border="1">
            <thead>
                <tr>
                    <th>Cod.Marca</th>
                    <th>Marca</th>
                    <th>Cobertura</th>
                    <th>Importe Venta</th>
                </tr>
            </thead>
            <tbody>
                {data.map((item, index) => (
                    <tr key={index}>
                        <td>{item.ccodmarca}</td>
                        <td>{item.tdesmarca}</td>
                        <td>{item.clientes_unicos}</td>
                        <td>{item.total_ventas}</td>
                    </tr>
                ))}
            </tbody>
        </table>
    );
};

const App = () => {
    const [datosProcesados, setDatosProcesados] = useState([]); // Estado para almacenar los datos procesados

    // Llamar a la función datafetch cuando el componente se monte
    useEffect(() => {
        const cargarDatos = async () => {
            console.log("Llamando a datafecth...");
            await datafecth(codVendedor, setDatosProcesados);  // Llamar a datafecth y pasar la función setDatosProcesados
            console.log("finaliza a datafecth...");
            console.log(datosProcesados);
        };

        cargarDatos();  // Ejecutar la función asíncrona
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
