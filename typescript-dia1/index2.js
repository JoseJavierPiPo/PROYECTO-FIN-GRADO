// Crea una función filtrarPorCategoria(categoria: string) que:
// Devuelva un nuevo arreglo solo con los productos de esa categoría.
// (Opcional pro) Crea una función calcularValorTotal() que:
// Devuelva el valor total del inventario.
var producto = [
    { nombre: "figura", categorias: "anime", precio: 25, stock: 100 },
    { nombre: "videojuegos", categorias: "otaku", precio: 55, stock: 200 },
    { nombre: "comic", categorias: "anime", precio: 18, stock: 170 },
    { nombre: "cartas", categorias: "otaku", precio: 5, stock: 250 },
    { nombre: "lapices", categorias: "otaku", precio: 3, stock: 3000 }
];
function mostrarInventario(producto) {
    producto.forEach(function (producto) {
        console.log("".concat(producto.nombre, " : ").concat(producto.precio, " $, stock :  ").concat(producto.stock, " categor\u00EDa ; ").concat(producto.categorias));
    });
}
mostrarInventario(producto);
function valortotal(producto) {
    var total = 0;
    producto.forEach(function (producto) {
        total += producto.precio * producto.stock;
    });
    return total;
}
console.log("Valor total del inventario", valortotal(producto), "€");
