// Crea una función buscarProductos(keyword: string) que:

// Devuelva todos los productos cuyo nombre contenga la palabra clave (sin distinguir mayúsculas/minúsculas).

// (Opcional PRO) Crea una función inventarioPorProveedor() que:

// Devuelva un objeto donde cada clave es un proveedor y su valor es la suma total del stock de sus productos.

interface Productos {
    nombre : string,
    proveedor : string,
    precio : number, 
    cantidadstock : number,
}

const producto:Productos[] = [
    {nombre : "TV", proveedor : "Samsung", precio : 750, cantidadenStock : 45},
    {nombre : "Samsung S23", proveedor : "Samsung", precio : 950, cantidadenStock : 85},
    {nombre : "Iphone 14", proveedor : "Apple", precio : 775, cantidadenStock : 32},
    {nombre : "MAC", proveedor : "Apple", precio : 1450, cantidadenStock : 25}
]

function mostrarInventario (producto:Productos[]){
    producto.forEach(producto =>{
        console.log {`${producto.nombre} = ${producto.precio} $ ${producto.proveedor}, ${producto.cantidadenStock}`}
    })
}

function filtrarporProveedor (producto:Productos[], proveedor : string){
    return producto.filter(producto => producto.proveedor.toLowerCase() === proveedor.toLowerCase())
}

const nombre1 = prompt("Cual es el nombre del producto que quieres buscar");
function buscarProductos (producto:Productos[], nombre : string){
    nombre1 ; producto.nombre;
    producto.filter(producto=> producto.nombre.toLowerCase() === producto.nombre.toLowerCase())
}