// Defina una interfaz Producto con nombre (string) y precio (number).

// Cree un array de productos.

// Implemente una función mostrarProductos que imprima los productos en consola.

interface Producto {
    nombre: string;
    precio: number;
  }
  
  const productos: Producto[] = [
    { nombre: "Laptop", precio: 1000 },
    { nombre: "Teléfono", precio: 500 }
  ];
  
  function mostrarProductos(productos: Producto[]) {
    productos.forEach(producto => {
      console.log(`${producto.nombre}: $${producto.precio}`);
    });
  }
  
  mostrarProductos(productos);




