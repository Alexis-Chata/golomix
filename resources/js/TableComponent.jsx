import React from "react";

function TableComponent({ data }) {

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
                {data.map((item) => (
                    <tr key={item.id}>
                        <td>{item.id}</td>
                        <td>{item.nombre}</td>
                        <td>{item.edad}</td>
                        <td>{item.ciudad}</td>
                    </tr>
                ))}
            </tbody>
        </table>
    );
}

export default TableComponent;
