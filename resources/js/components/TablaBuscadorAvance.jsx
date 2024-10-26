import React, { useContext, useEffect, useState } from 'react';
import { UsuarioContext } from '../context/AvanceContext';

const TablaUsuarios = () => {
    const { dataCodVendido, cargando } = useContext(UsuarioContext); // Obtenemos los datos del contexto
    const [busqueda, setBusqueda] = useState('');
    const [filtrados, setFiltrados] = useState([]);

    // Función para manejar la búsqueda
    const handleSearch = (e) => {
        let value;
        if (e.target) {
            value = e.target.value.toLowerCase();
        }else{
            value = e.toLowerCase();
        }

        setBusqueda(value);

        if (value === '') {
            setFiltrados(dataCodVendido); // Restaurar los datos originales si la búsqueda está vacía
            return;
        }

        // Filtramos los datos según el valor de búsqueda
        const resultados = Object.values(dataCodVendido).filter(
            (usuario) =>
                usuario.tcor.toLowerCase().includes(value) ||
                usuario.cequiv.toLowerCase().includes(value)
        );
        setFiltrados(resultados);
    };

    // Actualiza los datos filtrados cuando `dataCodVendido` cambia
    useEffect(() => {
        if (dataCodVendido) {
            setFiltrados(dataCodVendido); // Establece los datos iniciales
            if (document.getElementById('busquedaCodProducto')) {
                handleSearch(document.getElementById('busquedaCodProducto').value);
            }
        }
    }, [dataCodVendido]); // Escucha cambios en `dataCodVendido`

    if (cargando) return <p>Cargando...</p>; // Muestra un mensaje mientras se cargan los datos

    return (
        <div>
            <input
                id="busquedaCodProducto"
                type="text"
                placeholder="Buscar por Codigo..."
                value={busqueda}
                onChange={handleSearch}
                style={{ marginBottom: '10px', padding: '5px', width: '100%' }}
                className='form-control bg-white border border-gray-300 text-gray-700 py-2 px-3 rounded leading-tight focus:outline-none focus:bg-white focus:border-blue-500'
            />
            <table border="1" cellPadding="10" cellSpacing="0" style={{ width: '100%' }}>
                <thead>
                    <tr>
                        <th>Cod.</th>
                        <th>Producto</th>
                        <th>Cants</th>
                        <th>Unids</th>
                        <th>Importe Venta</th>
                    </tr>
                </thead>
                <tbody>
                    {filtrados.length > 0 ? (
                        filtrados.map((item, index) => (
                            <tr key={index}>
                                <td>{item.cequiv}</td>
                                <td>{item.tcor}</td>
                                <td>{item.bulto}</td>
                                <td>{(item.fraccion).toString().padStart(2, '0')}</td>
                                <td className='pr-8 px-2 py-1 text-right'>{formatearNumero(item.importe)}</td>
                            </tr>
                        ))
                    ) : (
                        <tr>
                            <td colSpan="5" style={{ textAlign: 'center' }}>No se encontraron resultados</td>
                        </tr>
                    )}
                </tbody>
            </table>
        </div>
    );
};

export default TablaUsuarios;
