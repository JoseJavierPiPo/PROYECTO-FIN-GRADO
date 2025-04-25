type EstadoTarea = "pendiente" | "completada";

interface Tarea {
    id: number;
    titulo: string;
    estado: EstadoTarea;
}

const tareas: Tarea[] = [];

function agregarTarea(titulo: string): Tarea {
    const nuevaTarea: Tarea = {
        id: Date.now(),
        titulo,
        estado: "pendiente",
    };
    tareas.push(nuevaTarea);
    return nuevaTarea;
}

function completartarea(id: number): void {
    let tarea: Tarea | undefined = undefined;

    // Recorremos el arreglo 'tareas' con un bucle 'for'
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

agregarTarea("Aprender TypeScript");
agregarTarea("Hacer ejercicio");
completartarea(tareas[0].id);  // Marcar la primera tarea como completada
completartarea(1);           // Intentar marcar una tarea no existente

console.log(tareas);
