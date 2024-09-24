import React, { useState, useEffect } from "react";

// Componente para mostrar la tabla de datos
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

// Componente principal
const App = () => {
    const [datosProcesados, setDatosProcesados] = useState([]); // Estado para almacenar los datos procesados
    const [isLoading, setIsLoading] = useState(true); // Estado para manejar el estado de carga

    // Función que obtiene y procesa los datos, ahora recibiendo cod_vendedor como parámetro
    const obtenerYProcesarDatos = async (cod_vendedor) => {
        try {
            setIsLoading(true); // Mostrar "Cargando" mientras los datos se obtienen
            await datafecth(cod_vendedor, setDatosProcesados); // Pasar cod_vendedor a la función datafecth
        } finally {
            setIsLoading(false); // Ocultar "Cargando" una vez que los datos se han cargado
        }
    };

    const obtenerYProcesarDatosfiltrada = async () => {
        try {
            setIsLoading(true); // Mostrar "Cargando" mientras los datos se obtienen
            await datafecthfiltrada(setDatosProcesados); // Pasar cod_vendedor a la función datafecth
        } finally {
            setIsLoading(false); // Ocultar "Cargando" una vez que los datos se han cargado
        }
    };

    // Llamar a la función con el cod_vendedor adecuado
    useEffect(() => {
        obtenerYProcesarDatos(codVendedor); // Ejemplo de cod_vendedor inicial
    }, []); // Se ejecuta solo una vez al montar el componente

    // useEffect para manejar el botón de actualización fuera del componente React
    useEffect(() => {
        const boton = document.getElementById("consultar");
        var cven_slct = document.getElementById("slctcven");
        if (boton) {
            boton.addEventListener("click", () =>
                obtenerYProcesarDatos(cven_slct.value)
            ); // Pasar el cod_vendedor al hacer clic
        }

        return () => {
            if (boton) {
                boton.removeEventListener("click", () =>
                    obtenerYProcesarDatos(cven_slct.value)
                );
            }
        };
    }, []);

    useEffect(() => {
        const btnaplicar = document.getElementById("aplicar");
        if (btnaplicar) {
            btnaplicar.addEventListener("click", () =>
                obtenerYProcesarDatosfiltrada()
            ); // Pasar el cod_vendedor al hacer clic
        }

        return () => {
            if (btnaplicar) {
                btnaplicar.removeEventListener("click", () =>
                    obtenerYProcesarDatosfiltrada()
                );
            }
        };
    }, []);

    return (
        <div>
            <h1>Datos Procesados</h1>
            {/* Mostrar la tabla solo si hay datos procesados, o mostrar un mensaje de "Cargando..." */}
            {isLoading ? (
                <p>Cargando datos...</p>
            ) : datosProcesados.length > 0 ? (
                <TablaDatos data={datosProcesados} />
            ) : (
                <p>No se encontraron datos.</p>
            )}
        </div>
    );
};

export default App;
