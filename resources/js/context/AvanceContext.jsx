import React, { createContext, useEffect, useState } from 'react';

// Creamos el contexto
export const UsuarioContext = createContext();

// Definimos el provider para compartir los datos
export const UsuarioProvider = ({ children }) => {
    const [dataProvider, setProvider] = useState([]);
    const [dataProcesada, setDataProcesada] = useState([]);
    const [dataCodVendido, setDataCodVendido] = useState([]);
    const [cargando, setCargando] = useState(true);

    // Función para obtener los datos desde la API de Laravel
    const fetchDataProvider = async (codVendedor) => {
        try {
            await datafecth(codVendedor, setProvider);
            setDataProcesada(datos.datosProcesados.articulos);
            setDataCodVendido(datos.datosProcesadosCodVendido);
        } catch (error) {
            console.error('Error al obtener los dataProvider:', error);
        } finally {
            setCargando(false);
        }
    };

    // Ejecutamos fetchDataProvider al montar el componente
    useEffect(() => {
        fetchDataProvider(codVendedor);
    }, []);

    const datosfiltrada = async () => {
        try {
            setCargando(true); // Mostrar "Cargando" mientras los datos se obtienen
            await datafecthfiltrada(datos.datosFecth, datos.datosFecthCom01s, setProvider);
            setDataProcesada(datos.datosProcesados.articulos);
            setDataCodVendido(datos.datosProcesadosCodVendido);
        } finally {
            setCargando(false); // Ocultar "Cargando" una vez que los datos se han cargado
        }
    };

    useEffect(() => {
        const boton = document.getElementById("consultar");
        const cven_slct = document.getElementById("slctcven");
        const handleClick = () => fetchDataProvider(cven_slct.value); // Obtiene datos según el select de vendedor

        if (boton) {
            boton.addEventListener("click", handleClick); // Añade el listener al botón "consultar"
        }

        return () => {
            if (boton) {
                boton.removeEventListener("click", handleClick); // Elimina el listener al desmontar el componente
            }
        };
    }, []);

    useEffect(() => {
        const btnaplicar = document.getElementById("aplicar");
        const handleClick = () => datosfiltrada(); // Lógica para el botón "aplicar"

        if (btnaplicar) {
            btnaplicar.addEventListener("click", handleClick); // Añade el listener al botón "aplicar"
        }

        return () => {
            if (btnaplicar) {
                btnaplicar.removeEventListener("click", handleClick); // Elimina el listener al desmontar el componente
            }
        };
    }, []);

    return (
        <UsuarioContext.Provider value={{ dataProvider, dataProcesada, dataCodVendido, cargando }}>
            {children}
        </UsuarioContext.Provider>
    );
};
