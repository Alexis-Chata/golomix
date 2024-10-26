import React from 'react';
import ReactDOM from 'react-dom/client';
import { UsuarioProvider } from './context/AvanceContext';
import TablaUsuarios from './components/TablaBuscadorAvance';
import App1 from './components/TablaAvance';

const App2 = () => {
    return (
        <UsuarioProvider>
            <div class="py-6">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white shadow-xl sm:rounded-lg">
                        <div class="p-2 pb-5 bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg">
                            <App1 />
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-6">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white shadow-xl sm:rounded-lg">
                        <div class="p-2 pb-5 bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg">
                            <div id="react-cod-vendido2"></div>
                            <h2>Cod. Producto</h2>
                            <TablaUsuarios />
                            <div id="react-cod-vendido"></div>
                        </div>
                    </div>
                </div>
            </div>
        </UsuarioProvider>
    );
};

if (document.getElementById('app2')) {
    ReactDOM.createRoot(document.getElementById('app2')).render(<App2 />);
}

export default App2;
