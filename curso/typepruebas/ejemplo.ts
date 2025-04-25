let nombre: string = "Ana";
let edad: number = 25;
let esProgramador: boolean = true;

let hobbies: string[] = ["Leer", "Programar"];


let youtube: string[] = ["Youtube", "Naranja"]

let usuario : { nombre : string, edad : number} = {
    nombre : "Ana",
    edad : 25
}

interface Usuario {
    nombre: string;
    edad: number;
    esAdmin?: boolean; // (opcional)
  }
  
  const ana: Usuario = {
    nombre: "Ana",
    edad: 25
  };


console.log (ana)

interface personajes {
    nombre : string,
    edad : number,
    descripción : string,
    espersonaje?: boolean;
    }

    const mario: personajes ={
        nombre : "Mario",
        edad : 45,
        descripción : "Putisimo gay",
        espersonaje : true,
    }

console.log (mario)


function multiplicar (a:number, b:number) :number {
    return a * b;
}

console.log (multiplicar(3,5))