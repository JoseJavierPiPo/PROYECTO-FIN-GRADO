// Pregunta al usuario por su nombre
const nombre = prompt("¿Cuál es tu nombre?");

if (nombre !== null) {
  console.log(`Hola, ${nombre}!`);
} else {
  console.log("No se ingresó ningún nombre.");
}
