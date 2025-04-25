// IMPORTANTE 

// USO : DECLARAR EL TIPO DE VARIABLE
// USO = ASIGNAR VALORES A UNA VARIABLE


//..........................................
let id: string | number; // INDICAR QUE UN PARÁMETRO PUEDA FUNCIONAR COMO STRING O NUMERO
id = "ABC123";  // ✅ Válido  
id = 123;       // ✅ Válido  
// id = true;      // ❌ Error (no es string ni number)  
//..........................................

//Crear "sinónimos" para tipos complejos:

type UserID = string | number;

function getUser(id: UserID) {
  console.log(`ID: ${id}`);
}
//..........................................


// Ejemplo: Función genérica para devolver el primer elemento de un array

function primerElemento<T>(array: T[]): T | undefined {
  return array[0];
}

const numeros = [1, 2, 3];
const primeroNum = primerElemento(numeros); // Tipo: number

const strings = ["Hola", "Mundo"];
const primeroStr = primerElemento(strings); // Tipo: string

console.log(primeroNum);
console.log(primeroStr);

//..............................................


// 1. Parámetros opcionales (?) -- Significa que es opcional
// Es decir si no pasas la edad sigue funcionando

function crearUsuario(nombre: string, edad?: number) {
  if (edad) {
    console.log(`Nombre: ${nombre}, Edad: ${edad}`);
  } else {
    console.log(`Nombre: ${nombre}`);
  }
}

// 2. Tipado en callbacks
// Los tipados en callbacks son funciones que se ejecutan y que normalmente 
// dentro de ellas tienen otras funciones que se ejecutan posteriormente
// void significa que la función no devolvera nada 
function ejecutarCallback(callback: (texto: string) => void) {
  callback("¡Hola TypeScript!");
}

ejecutarCallback((mensaje) => {
  console.log(mensaje.toUpperCase()); // ¡HOLA TYPESCRIPT!
});

//TOUPPERCASE = mayusculas.
