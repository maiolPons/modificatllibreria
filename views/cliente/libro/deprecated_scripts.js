//añadir al carrito
function añadirProductoCarrito(isbn,stock){
    //selecciona la cantidad del producto
    const cantidadSeleccionada = document.getElementById("cantidadLibroInput");
    var cantidadSeleccionadaFinal = 0;
    if(isNaN(parseInt(cantidadSeleccionada.value))){
        cantidadSeleccionadaFinal = 1;
    }
    else if(parseInt(cantidadSeleccionada.value) > parseInt(stock)){
        cantidadSeleccionadaFinal = stock;
    }
    else{
        cantidadSeleccionadaFinal = cantidadSeleccionada.value;
    }
    //crear cookie i comprobaciones
    if(stock<1){
        swal("","El producto esta sin estock!","error",{buttons : ["ok"]})
    }
    else{
        //en  caso de que no exista
        if(buscarCookie("carritoCompraP")==null){
            const date = new Date();
            date.setTime(date.getTime() + (3*24*60*60*1000));
            let fechaExpirar = "expires="+ date.toUTCString();
            document.cookie = "carritoCompraP" + "=" + isbn + ";" + fechaExpirar + ";path=/";
            document.cookie = "carritoCompraC" + "=" + cantidadSeleccionadaFinal + ";" + fechaExpirar + ";path=/";
            swal("","Producto añadido correctamente!","success",{buttons : ["ok"]})
        }
        //en caso de que exista
        else{
            var carritoProductos=buscarCookie("carritoCompraP");
            var carritoCantidad=buscarCookie("carritoCompraC");
            //el producto ya esta en el carro
            if(carritoProductos.split(",").includes(isbn.toString())){
                swal("","El producto ya esta en la cesta!","info",{buttons : ["ok"]})
            }
            //el producto no esta en el carro
            else{
                carritoProductos += ","+isbn;
                carritoCantidad += ","+cantidadSeleccionadaFinal;

                const date = new Date();
                date.setTime(date.getTime() + (3*24*60*60*1000));
                let fechaExpirar = "expires="+ date.toUTCString();

                document.cookie = "carritoCompraP" + "=" + carritoProductos + ";" + fechaExpirar + ";path=/";
                document.cookie = "carritoCompraC" + "=" + carritoCantidad + ";" + fechaExpirar + ";path=/";
                swal("","Producto añadido correctamente!","success",{buttons : ["ok"]})
            }
        }
    }
}
//coger cookie
function buscarCookie(name) {
    var dc = document.cookie;
    var prefix = name + "=";
    var begin = dc.indexOf("; " + prefix);
    if (begin == -1) {
        begin = dc.indexOf(prefix);
        if (begin != 0) return null;
    }
    else
    {
        begin += 2;
        var end = document.cookie.indexOf(";", begin);
        if (end == -1) {
        end = dc.length;
        }
    }
    return decodeURI(dc.substring(begin + prefix.length, end));
} 