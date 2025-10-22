document.addEventListener('DOMContentLoaded', () => {
            const cards = document.querySelectorAll('.cardProyectoId');

            cards.forEach(card => {
                
                const data = card.dataset.proyecto ? JSON.parse(card.dataset.proyecto) : {};
                
                const tareasValidar = card.querySelector('#TareasValidar');
                const tareasCompletadas = card.querySelector('#TareasCompletadas');
                const tareasPendientes = card.querySelector('#TareasPendientes');

                let tareaCompletasCuenta = 0;
                let tareaPendienteCuenta = 0;
                let tareaValidarCuenta = 0;

                data.tareas.forEach(tarea => {
                    switch(tarea.estado){
                    case 0:
                        tareaPendienteCuenta++;
                        break;
                    case 1:
                        tareaValidarCuenta++;
                        break;
                    case 2:
                        tareaCompletasCuenta++;
                        break;
                    default:
                        break;
                }
                });
                
                tareasValidar.textContent = tareaValidarCuenta;
                tareasCompletadas.textContent = tareaCompletasCuenta;
                tareasPendientes.textContent = tareaPendienteCuenta;

            });

           
        });