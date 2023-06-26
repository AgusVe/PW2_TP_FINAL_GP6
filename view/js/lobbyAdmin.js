var xhr = new XMLHttpRequest();
xhr.open('GET', '/index.php?module=lobbyAdmin&action=datosParaGraficos', true);
xhr.onload = function () {
    if (xhr.status === 200) {
        var data = JSON.parse(xhr.responseText);

        var labels1 = Object.keys(data.cantidadDeJugadoresTotales);
        var values1 = Object.values(data.cantidadDeJugadoresTotales);

        var ctx = document.getElementById('jugadoresTotal');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels1,
                datasets: [{
                    label: 'Jugadores Totales',
                    data: values1,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                // Opciones adicionales de configuración
            }
        });

        var labels2 = Object.keys(data.cantidadDePartidasJugadas);
        var values2 = Object.values(data.cantidadDePartidasJugadas);

        var lineChartCtx = document.getElementById('partidasJugadas');
        new Chart(lineChartCtx, {
            type: 'line',
            data: {
                labels: labels2,
                datasets: [{
                    label: 'Partidas Jugadas',
                    data: values2,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Mes'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Cantidad'
                        }
                    }
                }
            }
        });

        var labels3 = Object.keys(data.cantidadDePreguntasEnJuego);
        var values3 = Object.values(data.cantidadDePreguntasEnJuego);

        var pieChartCtx = document.getElementById('preguntasEnJuego');
        new Chart(pieChartCtx, {
            type: 'pie',
            data: {
                labels: labels3,
                datasets: [{
                    label: 'Preguntas en el Juego',
                    data: values3,
                    backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)'],
                    borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                // Opciones adicionales de configuración para el gráfico de pastel
            }
        });

        var labels4 = Object.keys(data.cantidadDePreguntasDadasDeAlta);
        var values4 = Object.values(data.cantidadDePreguntasDadasDeAlta);

        var ctx2 = document.getElementById('preguntasDadasDeAlta');
        new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: labels4,
                datasets: [{
                    label: 'Preguntas dadas de Alta',
                    data: values4,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                // Opciones adicionales de configuración
            }
        });

        var labels5 = Object.keys(data.cantidadDeUsuariosNuevos);
        var values5 = Object.values(data.cantidadDeUsuariosNuevos);

        var lineChartCtx2 = document.getElementById('usuariosNuevos');
        new Chart(lineChartCtx2, {
            type: 'line',
            data: {
                labels: labels5,
                datasets: [{
                    label: 'Usuarios Nuevos',
                    data: values5,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Semana'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Cantidad'
                        }
                    }
                }
            }
        });

        var labels6 = Object.keys(data.cantidadDeUsuariosPorPais);
        var values6 = Object.values(data.cantidadDeUsuariosPorPais);

        var pieChartCtx2 = document.getElementById('usuariosPorPais');
        new Chart(pieChartCtx2, {
            type: 'pie',
            data: {
                labels: labels6,
                datasets: [{
                    label: 'Usuarios por País',
                    data: values6,
                    backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)'],
                    borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                // Opciones adicionales de configuración para el gráfico de pastel
            }
        });

        var labels7 = Object.keys(data.cantidadDeUsuariosPorSexo);
        var values7 = Object.values(data.cantidadDeUsuariosPorSexo);

        var pieChartCtx3 = document.getElementById('usuarioPorGenero');
        new Chart(pieChartCtx3, {
            type: 'pie',
            data: {
                labels: labels7,
                datasets: [{
                    label: 'Usuarios por Género',
                    data: values7,
                    backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)'],
                    borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                // Opciones adicionales de configuración para el gráfico de pastel
            }
        });

        var labels8 = Object.keys(data.cantidadDeUsuariosPorGrupoDeEdad);
        var values8 = Object.values(data.cantidadDeUsuariosPorGrupoDeEdad);

        var pieChartCtx4 = document.getElementById('usuariosPorGrupo');
        new Chart(pieChartCtx4, {
            type: 'pie',
            data: {
                labels: labels8,
                datasets: [{
                    label: 'Usuarios por Grupo',
                    data: values8,
                    backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)'],
                    borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                // Opciones adicionales de configuración para el gráfico de pastel
            }
        });
        var labels5 = Object.keys(data.porcentajeDePreguntasRespondidasCorrectamentePorElUsuario);
        var values5 = Object.values(data.porcentajeDePreguntasRespondidasCorrectamentePorElUsuario);

        var pieChartCtx5 = document.getElementById('porcentajeCorrectasUsur');
        new Chart(pieChartCtx5, {
            type: 'pie',
            data: {
                labels: labels5,
                datasets: [{
                    label: 'Porcentajes de preguntas correctas',
                    data: values5,
                    backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)'],
                    borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)'],
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
document.getElementById('descargarPDF').addEventListener('click', function() {
    capturarHTML();
});
function capturarHTML(){
        var chartCanvas = document.getElementById('jugadoresTotal');
        var chartHtml = chartCanvas.outerHTML;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/index.php?module=lobbyAdmin&action=generarPDF', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var blob = new Blob([xhr.response], { type: 'application/pdf' });

                // Crea una URL del archivo PDF
                var url = window.URL.createObjectURL(blob);

                // Abre una nueva ventana del navegador y carga el archivo PDF
                var newWindow = window.open(url, '_blank');

                // Libera los recursos del objeto URL
                window.URL.revokeObjectURL(url);

                /*var blob = new Blob([xhr.response], { type: 'application/pdf' });

                // Crea un enlace temporal y simula un clic para descargar el archivo
                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);
                link.download = 'grafico.pdf';
                link.style.display = 'none';
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);

                // Libera los recursos del objeto URL
                window.URL.revokeObjectURL(link.href);*/
            }
        };
        xhr.send('chartHtml=' + encodeURIComponent(chartHtml));
        // Envía el contenido HTML del gráfico al servidor
        // Utiliza AJAX o redirecciona la página a una ruta PHP con el contenido HTML del gráfico como parámetro
}