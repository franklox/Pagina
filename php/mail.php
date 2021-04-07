<?php
    

    $to = $_POST['c_email_address'];
    $subject = "My subject";
    
    //$headers='MIME-Version 1.0'."\r\n";
    //$headers.= "From: webmaster@example.com" . "\r\n" .
    //"CC: somebodyelse@example.com";
    //$headers.= "X-Mailer: PHP/".phpversion();
    
    //$headers.="Content-type: text/html; charset=iso-8859-1\r\n";
    


    $message='<html>
    <body>
        <h1 style="color:#1d1d1d">Gracias por tu compra '.$_POST['c_fname']." ".$_POST['c_lname'].'</h1>
        
        <h2>Detalles de la compra:</h2>
        <table>
            <thead>
                <tr>
                    <td>Nombre del producto</td>
                    <td>Precio</td>
                    <td>Cantidad</td>
                    <td>Subtotal</td>
                </tr>
            </thead>
            <tbody>';
            $total = 0;
            $arregloCarrito =$_SESSION['carrito'];
                for($i=0;$i<count($arregloCarrito);$i++){
                    $total = $total + ( $arregloCarrito[$i]['Precio'] * $arregloCarrito[$i]['Cantidad']);
                    $message.='<tr><td>'. $arregloCarrito[$i]['Nombre'].'</td>';
                    $message.='<td>'. $arregloCarrito[$i]['Precio'].'</td>';
                    $message.='<td>'. $arregloCarrito[$i]['Cantidad'].'</td>';
                    $message.='<td>'. ($arregloCarrito[$i]['Precio']*$arregloCarrito[$i]['Cantidad']).'</td></tr>';
                }
    $message.='</tbody></table>';
    $message.='<h2>Total de  la compra: '.$total.'</h2>';
    $message.='<a href="http://localhost/Pagina/verpedido.php?id_venta='.$id_venta.'" style="background-color: brown; color:white; padding:10px; text-decoration:none;">
    Ver estatus del pedido.
    </a> </body></html>';
    
    $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    // Cabeceras adicionales
    
    $cabeceras .= 'From: Recordatorio <cumples@example.com>' . "\r\n";
    
    
    mail($to,$subject,$message,$cabeceras);
      
?>


               
            
        
        
        
    
