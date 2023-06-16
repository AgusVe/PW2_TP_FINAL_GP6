
    // Función para buscar y mostrar las preguntas
function buscarPreguntas() {

    var numeroPregunta = document.getElementById("numeroPregunta").value;

    // Realizar una solicitud AJAX al controlador
    $.ajax({
        url: "/pregunta/verPregunta",
        method: "GET",
        data: { numeroPregunta: numeroPregunta },
        success: function(jsonPreguntas) {
            var preguntasEncontradas = JSON.parse(jsonPreguntas);

            // Obtener el elemento <ul> donde se mostrarán las preguntas encontradas
            var listaPreguntas = document.getElementById("listaPreguntas");
            listaPreguntas.innerHTML = ""; // Limpiar el contenido anterior

            // Recorrer el array de preguntas encontradas y agregar cada una a la lista
            for (var i = 0; i < preguntasEncontradas.length; i++) {
                var pregunta = preguntasEncontradas[i];

                // Crear un elemento <li> para la pregunta
                var listItem = document.createElement("li");

                // Crear un elemento <span> para mostrar el número y el texto de la pregunta
                var numeroSpan = document.createElement("span");
                numeroSpan.innerHTML = pregunta.pregunta_id + ". ";
                listItem.appendChild(numeroSpan);

                var textoSpan = document.createElement("span");
                textoSpan.innerHTML = pregunta.enunciado;
                listItem.appendChild(textoSpan);

                // Crear un botón "Modificar pregunta"
                var modificarBtn = document.createElement("button");
                modificarBtn.innerHTML = "Modificar pregunta";

                // Agregar un manejador de eventos al botón para llamar a la función modificarPregunta()
                modificarBtn.addEventListener(
                    "click",
                    modificarPregunta.bind(null, pregunta.numero)
                );

                listItem.appendChild(modificarBtn);

                // Agregar el elemento <li> a la lista
                listaPreguntas.appendChild(listItem);
            }
        },
        error: function(error) {
            console.log("Error en la solicitud AJAX:", error);
        }
    });
}

    // Función para modificar una pregunta específica
function modificarPregunta(numeroPregunta) {
    // Aquí puedes implementar la lógica para modificar la pregunta en tu sistema
    console.log("Modificando pregunta número " + numeroPregunta);
}
