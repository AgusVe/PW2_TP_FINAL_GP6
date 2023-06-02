
// Realizar una petición AJAX para obtener los datos de preguntas JSON
var xhr = new XMLHttpRequest();
xhr.open('GET', '/index.php?module=partida&action=obtenerPreguntas', true);
xhr.onload = function () {
    if (xhr.status >= 200 && xhr.status < 400) {
        var preguntas = JSON.parse(xhr.responseText);

        const quiz_box = document.querySelector(".quiz-box");
        const opciones_lista = document.querySelector(".opciones-lista");
        const boton_siguiente = quiz_box.querySelector(".siguiente-preg");
        const timeCount = quiz_box.querySelector(".tiempo .tiempo-segundos");


        let index_conteo = 0;
        let tiempo_contador;
        let tiempo_valor = 10;
        mostrarPreguntas(0);
        startTimer(tiempo_valor);

        /* SI SE CLICKEA EN SIGUIENTE */
        boton_siguiente.onclick = () => {
            if (index_conteo < preguntas.length - 1) {
                index_conteo++;
                mostrarPreguntas(index_conteo);
                clearInterval(tiempo_contador);
                startTimer(tiempo_valor);
            }
        };

        function mostrarPreguntas(index) {
            const pregunta = document.querySelector(".pregunta");
            let pregunta_tag = '<span>' + preguntas[index].enunciado + '</span>';
            let opcion_tag =
                '<div class="opcion">' +
                preguntas[index].respuestaA +
                '<span></span></div>' +
                '<div class="opcion">' +
                preguntas[index].respuestaB +
                '<span></span></div>' +
                '<div class="opcion">' +
                preguntas[index].respuestaC +
                '<span></span></div>' +
                '<div class="opcion">' +
                preguntas[index].respuestaD +
                '<span></span></div>';
            pregunta.innerHTML = pregunta_tag;
            opciones_lista.innerHTML = opcion_tag;

            const opcion = opciones_lista.querySelectorAll(".opcion");
            for (let i = 0; i < opcion.length; i++) {
                opcion[i].addEventListener("click", function() {
                    opcionSeleccionada(this);
                });
            }
        }

        let cruzIcon = '<div class="icon tick"><i class="fas fa-check"></i></div>';
        let equisIcon = '<div class="icon cross"><i class="fas fa-times"></i></div>';

        /* RESPUESTA DEL USUARIO */
        function opcionSeleccionada(respuesta) {
            clearInterval(tiempo_contador);
            let userRespuesta = respuesta.textContent;
            let respuestaCorrecta = preguntas[index_conteo].respuesta_correcta;
            let todasOpciones = opciones_lista.children.length;
            if (userRespuesta == respuestaCorrecta) {
                respuesta.classList.add("correcto");
                respuesta.insertAdjacentHTML("beforeend", cruzIcon);
            } else {
                respuesta.classList.add("incorrecto");
                respuesta.insertAdjacentHTML("beforeend", equisIcon);

                /* SI LA RESPUESTA ES INCORRECTA MOSTRAR LA QUE ES CORRECTA */
                for (let i = 0; i < todasOpciones; i++) {
                    if (opciones_lista.children[i].textContent == respuestaCorrecta) {
                        opciones_lista.children[i].setAttribute("class", "opcion correcto");
                    }
                }
            }

            /* UNA VEZ QUE ELIJE LA OPCION DESABILITA LAS DEMAS */
            for (let i = 0; i < todasOpciones; i++) {
                opciones_lista.children[i].classList.add("desabilitar");
            }
        }

        /* CONTADOR DE TIEMPO */
        function startTimer(time) {
            tiempo_contador = setInterval(timer, 1000);

            function timer() {
                timeCount.textContent = time;
                time--;
                if (time < 0) {
                    clearInterval(tiempo_contador);
                    timeCount.textContent = "00";

                    // SELECCIONA LA OPCION INCCORRECTA SI SE TERMINA EL TIEMPO
                    seleccionarOpcionIncorrecta();

                }
            }
        }

// SELECCIONA LA OPCION INCCORRECTA SI SE TERMINA EL TIEMPO
        function seleccionarOpcionIncorrecta() {
            const opciones = opciones_lista.querySelectorAll(".opcion");
            const respuestaCorrecta = preguntas[index_conteo].respuesta_correcta;

            for (let i = 0; i < opciones.length; i++) {
                const opcion = opciones[i];
                if (opcion.textContent !== respuestaCorrecta) {
                    opcionSeleccionada(opcion);
                    break;
                }
            }
        }

        ;
    }
};
xhr.send();