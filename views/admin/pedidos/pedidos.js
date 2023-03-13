
function mostrarDetalles(info){
    var myWindow = window.open("views/admin/pedidos/mostrarDetalles.html", "Detalles del Pedido", "width=900,height=700");
    myWindow.moveTo(( screen.width - myWindow.innerWidth ) / 2,( screen.height - myWindow.innerHeight ) / 2);
    var tableInfo="";

    var fechaDato = info[0][3].split("-");
    var fechaFinal = fechaDato[2] + "/" + fechaDato[1] + "/" + fechaDato[0];

    for(let i =0;i<info[2].length;i++){
        tableInfo +=`<tr><td>${info[2][i][0]}</td><td>${info[2][i][1]}</td><td>${info[2][i][2]}</td><td>${info[2][i][3]}</td><td>${info[2][i][7]}</td><td>${info[2][i][9]}</td></tr>`;
    }
    console.log(tableInfo);
    myWindow.document.write(
    `<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="views/styles/styles.css" rel="stylesheet" type="text/css">
        <title>Detalles de Pedido</title>
    </head>
    <body>
        <div id="principalAdmin">
            <h2 id="titolDetallesPedidoAdmin">Detalles de pedido</h2>
            <div id="pedidoAdmin">
                <h4>Informacion del pedido</h4>
                <p>Numero del Pedido: `+info[0][0]+`</p>
                <p>Importe Total: `+info[0][4]+`</p>
                <p>Fecha de compra: `+fechaFinal+`</p>
                <p>Estado del pedido: `+info[0][2]+`"</p>
            </div>
            <div id="clienteAdmin">
                <h4>Informacion del Cliente</h4>
                <p>Nombre: `+info[1][2]+`</p>
                <p>Apellido: `+info[1][3]+`</p>
                <p>direccion: `+info[1][4]+`</p>
                <p>DNI: `+info[1][5]+`</p>
                <p>Email: `+info[1][1]+`</p>
            </div>
            <div id="librosAdmin">
                <h4>Libros pedidos</h4>
                <table>
                        <tr>
                            <th>ISBN</th><th>Titulo</th><th>Autor</th><th>Editorial</th><th>Precio por unidad</th><th>Cantidad</th>
                        </tr>
                        `+tableInfo+`
                </table>
            </div>
        </div>
    </body>
    </html>`
    );
    

}