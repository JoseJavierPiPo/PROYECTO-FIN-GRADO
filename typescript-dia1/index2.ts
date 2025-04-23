
// Crea una función filtrarPorCategoria(categoria: string) que:
// Devuelva un nuevo arreglo solo con los productos de esa categoría.
// (Opcional pro) Crea una función calcularValorTotal() que:
// Devuelva el valor total del inventario.


interface ProductoGeek{
    nombre : string,
    categorias : string,
    precio : number,
    stock : number
}

const producto : ProductoGeek [] = [
    {nombre : "figura", categorias : "anime", precio : 25, stock : 100},
    {nombre : "videojuegos", categorias : "otaku", precio : 55, stock : 200},
    {nombre : "comic", categorias : "anime", precio : 18, stock : 170},
    {nombre : "cartas", categorias : "otaku", precio : 5, stock : 250},
    {nombre : "lapices", categorias : "otaku", precio : 3, stock : 3000}
]

function mostrarInventario(producto:ProductoGeek[]){
    producto.forEach(producto =>{
        console.log(`${producto.nombre} : ${producto.precio} $, stock :  ${producto.stock} categoría ; ${producto.categorias}`)
    });
}
mostrarInventario(producto);

function valortotal (producto:ProductoGeek[]){
    let total = 0;
    producto.forEach(producto =>{
        total += producto.precio * producto.stock;
    });
    return total 
}

console.log("Valor total del inventario : ", valortotal(producto), "€")

function filtrarPorCategoria(productos: ProductoGeek[], categoria: string): ProductoGeek[] {
    return productos.filter(producto => producto.categorias.toLowerCase() === categoria.toLowerCase());
}

