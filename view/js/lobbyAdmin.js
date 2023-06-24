var xhr = new XMLHttpRequest();
xhr.open('GET', '/index.php?module=lobbyAdmin&action=datosParaGraficos', true); // Especifica la ruta al archivo PHP que realizará la consulta y devolverá los datos en formato JSON
xhr.onload = function () {
    if (xhr.status === 200) {
        var data = JSON.parse(xhr.responseText);
        // Aquí puedes procesar los datos y configurar el gráfico utilizando Chart.js
        var labels1 = Object.keys(data.cantidadDeJugadoresTotales); // EJE x
        var values1 = Object.values(data.cantidadDeJugadoresTotales); // EJE Y

// CONFIGURACION PARA GRAFICOS
        var ctx = document.getElementById('jugadoresTotal');
        new Chart(ctx, {
            type: 'bar', // Tipo de gráfico de barras
            data: {
                labels: labels1,
                datasets: [{
                    label: 'Jugadores Totales',
                    data: values1,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)', // Color de fondo de las barras
                    borderColor: 'rgba(75, 192, 192, 1)', // Color del borde de las barras
                    borderWidth: 1 // Ancho del borde de las barras
                }]
            },
            options: {
                // Opciones adicionales de configuración, como títulos, leyendas, escalas, etc.
            }
        });

        // Aquí puedes procesar los datos y configurar el gráfico utilizando Chart.js
        var labels2 = Object.keys(data.cantidadDePartidasJugadas); // EJE x
        var values2 = Object.values(data.cantidadDePartidasJugadas); // EJE Y

// CONFIGURACION PARA GRAFICOS
        var lineChartCtx = document.getElementById('partidasJugadas');
        new Chart(lineChartCtx, {
            type: 'line',
            data: {
                labels: labels2,
                datasets: [{
                    label: 'Partidas Jugadas',
                    data: values2,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                // Opciones adicionales de configuración para el gráfico de líneas
            }
        });

        // Aquí puedes procesar los datos y configurar el gráfico utilizando Chart.js
        var labels3 = Object.keys(data.cantidadDePreguntasEnJuego); // EJE x
        var values3 = Object.values(data.cantidadDePreguntasEnJuego); // EJE Y

// CONFIGURACION PARA GRAFICOS
        var pieChartCtx = document.getElementById('preguntasEnJuego');
        new Chart(pieChartCtx, {
            type: 'pie',
            data: {
                labels: labels3,
                datasets: [{
                    label: 'Preguntas en el Juego',
                    data: values3,
                    backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)'],
                    borderColor: ['rgba(75, 192, 192, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                // Opciones adicionales de configuración para el gráfico de pastel
            }
        });
        // Aquí puedes procesar los datos y configurar el gráfico utilizando Chart.js
        var labels4 = Object.keys(data.cantidadDePreguntasDadasDeAlta); // EJE x
        var values4 = Object.values(data.cantidadDePreguntasDadasDeAlta); // EJE Y

// CONFIGURACION PARA GRAFICOS
        var ctx2 = document.getElementById('preguntasDadasDeAlta');
        new Chart(ctx2, {
            type: 'bar', // Tipo de gráfico de barras
            data: {
                labels: labels4,
                datasets: [{
                    label: 'Preguntas dadas de Alta',
                    data: values4,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)', // Color de fondo de las barras
                    borderColor: 'rgba(75, 192, 192, 1)', // Color del borde de las barras
                    borderWidth: 1 // Ancho del borde de las barras
                }]
            },
            options: {
                // Opciones adicionales de configuración, como títulos, leyendas, escalas, etc.
            }
        });

        // Aquí puedes procesar los datos y configurar el gráfico utilizando Chart.js
        var labels5 = Object.keys(data.cantidadDeUsuariosNuevos); // EJE x
        var values5 = Object.values(data.cantidadDeUsuariosNuevos); // EJE Y

// CONFIGURACION PARA GRAFICOS
        var lineChartCtx2 = document.getElementById('usuariosNuevos');
        new Chart(lineChartCtx2, {
            type: 'line',
            data: {
                labels: labels5,
                datasets: [{
                    label: 'Usuarios Nuevos',
                    data: values5,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                // Opciones adicionales de configuración para el gráfico de líneas
            }
        });

        // Aquí puedes procesar los datos y configurar el gráfico utilizando Chart.js
        var labels6 = Object.keys(data.cantidadDeUsuariosPorPais); // EJE x
        var values6 = Object.values(data.cantidadDeUsuariosPorPais); // EJE Y

// CONFIGURACION PARA GRAFICOS
        var pieChartCtx2 = document.getElementById('usuariosPorPais');
        new Chart(pieChartCtx2, {
            type: 'pie',
            data: {
                labels: labels6,
                datasets: [{
                    label: 'Usuarios por Pais',
                    data: values6,
                    backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)'],
                    borderColor: ['rgba(75, 192, 192, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                // Opciones adicionales de configuración para el gráfico de pastel
            }
        });

        // Aquí puedes procesar los datos y configurar el gráfico utilizando Chart.js
        var labels7 = Object.keys(data.cantidadDeUsuariosPorSexo); // EJE x
        var values7 = Object.values(data.cantidadDeUsuariosPorSexo); // EJE Y

// CONFIGURACION PARA GRAFICOS
        var pieChartCtx3 = document.getElementById('usuarioPorGenero');
        new Chart(pieChartCtx3, {
            type: 'pie',
            data: {
                labels: labels7,
                datasets: [{
                    label: 'Usuarios por Genero',
                    data: values7,
                    backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)'],
                    borderColor: ['rgba(75, 192, 192, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                // Opciones adicionales de configuración para el gráfico de pastel
            }
        });
        // Aquí puedes procesar los datos y configurar el gráfico utilizando Chart.js
        var labels8 = Object.keys(data.cantidadDeUsuariosPorGrupoDeEdad); // EJE x
        var values8 = Object.values(data.cantidadDeUsuariosPorGrupoDeEdad); // EJE Y

// CONFIGURACION PARA GRAFICOS
        var pieChartCtx4 = document.getElementById('usuariosPorGrupo');
        new Chart(pieChartCtx4, {
            type: 'pie',
            data: {
                labels: labels8,
                datasets: [{
                    label: 'Usuarios por Grupo',
                    data: values8,
                    backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)'],
                    borderColor: ['rgba(75, 192, 192, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                // Opciones adicionales de configuración para el gráfico de pastel
            }
        });

    }
};
xhr.send();

