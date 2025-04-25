// Ejercicio Agregar Tareas

type EstadoTarea = "pendiente" | "completada";

interface Tarea {
    id : number,
    nombre : string,
    estado : EstadoTarea,
}

const Tarea[] = [];

function agregarTarea(titulo : string) : Tarea {
    const nuevaTarea: Tarea = {
        id : Date.now(),
        titulo,
        estado : "pendiente",
    };
    tareas.push(nuevaTarea)
    return nuevaTarea
}

function completartarea(id : number): void{
    let tarea : Tarea | undefined = undefined;
    for (let i = 0; i < tareas.length; i++) {
        if (tareas[i].id === id) {
            tarea = tareas[i];
            break; // Salimos del bucle
        }
    }

    if (tarea) {
        tarea.estado = "completada";
    } else {
        console.log(`Tarea con ID ${id} no encontrada.`);
    }
}
