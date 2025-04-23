// Defina una interfaz Producto con nombre (string) y precio (number).
var productos = [
    { nombre: "Laptop", precio: 1000 },
    { nombre: "Teléfono", precio: 500 }
];
function mostrarProductos(productos) {
    productos.forEach(function (producto) {
        console.log("".concat(producto.nombre, ": $").concat(producto.precio));
    });
}
mostrarProductos(productos);
