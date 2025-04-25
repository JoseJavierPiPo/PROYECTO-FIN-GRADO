// Define una interfaz Producto que tenga las 
// propiedades nombre, proveedor, precio y cantidadEnStock.

//Usa un arreglo de productos con al menos 
// 3 productos diferentes.
// Crea una función filtrarPorProveedor(proveedor: string) que:
//Devuelva un nuevo arreglo solo con los productos de ese proveedor.
//(Opcional pro) Crea una función calcularValorPromedio() que:
//Devuelva el valor promedio de los productos en el inventario.


interface Productos {
    nombre : string,
    proveedor : string,
    precio : number,
    cantidadenStock : number,
}

const producto:Productos [] = [
    {nombre : "TV", proveedor : "Samsung", precio : 750, cantidadenStock : 45},
    {nombre : "Samsung S23", proveedor : "Samsung", precio : 950, cantidadenStock : 85},
    {nombre : "Iphone 14", proveedor : "Apple", precio : 775, cantidadenStock : 32},
    {nombre : "MAC", proveedor : "Apple", precio : 1450, cantidadenStock : 25}
] 

function mostrarinventario(producto:Productos[]){
    producto.forEach(producto => 
    {
        console.log(`${producto.nombre}, ${producto.precio}$, ${producto.proveedor}, ${producto.cantidadenStock}`)
    });
}


function filtrarPorProveedor(producto:Productos[], proveedor: string): Productos[] {
    return producto.filter(producto=> producto.proveedor.toLowerCase() === proveedor.toLowerCase());
}


console.log ("Mostrando los productos por el proveedor 'Apple' :")
mostrarinventario(filtrarPorProveedor(producto, "Apple"));