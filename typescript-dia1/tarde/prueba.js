// Pregunta al usuario por su nombre
var nombre = prompt("¿Cuál es tu nombre?");
if (nombre !== null) {
    console.log("Hola, ".concat(nombre, "!"));
}
else {
    console.log("No se ingresó ningún nombre.");
}
