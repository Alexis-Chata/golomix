import React, { useContext, useEffect, useState } from 'react';
import { UsuarioContext } from '../context/AvanceContext';

// Componente para mostrar la tabla de datos
const TablaDatos = ({ data }) => {
    return (
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th className="px-2 py-2">Cod.Marca</th>
                        <th className="px-2 py-2">Marca</th>
                        <th className="px-2 py-2 text-center">Cobertura</th>
                        <th className="px-2 py-2 text-center">Importe Venta</th>
                    </tr>
                </thead>
                <tbody>
                    {data.map((item, index) => (
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-300" key={index}>
                            <td className="px-2 py-1">{item.ccodmarca}</td>
                            <td className="px-2 py-1">{item.tdesmarca}</td>
                            <td className="pr-4 px-2 py-1 text-end">{item.clientes_unicos}</td>
                            <td className="pr-8 px-2 py-1 text-right">{formatearNumero(item.total_ventas)}</td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>
    );
};

// Componente principal
const App1 = () => {
    const { dataProcesada, cargando } = useContext(UsuarioContext); // Obtenemos datos del contexto
    const [datosProcesados, setDatosProcesados] = useState([]); // Estado local para los datos

    useEffect(() => {
        if (dataProcesada.length > 0) {
            setDatosProcesados(dataProcesada); // Actualiza el estado si hay datos
        }
    }, [dataProcesada]); // Se ejecuta cada vez que dataProcesada cambia

    return (
        <div>
            <h1>Datos Procesados</h1>
            {/* Mostrar la tabla si hay datos, o un mensaje adecuado */}
            {cargando ? (
                <p>Cargando datos...</p>
            ) : datosProcesados.length > 0 ? (
                <TablaDatos data={datosProcesados} />
            ) : (
                <p>No se encontraron datos.</p>
            )}
        </div>
    );
};

export default App1;
