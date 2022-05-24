<?php 
session_start();

    $datos = "";

    if(isset($_POST['compra'])){
        switch($_POST['compra']){
    
            case 'Agregar':
                    if(is_numeric( openssl_decrypt($_POST['id'],METODO,KEY ))){
                        $IDPH = openssl_decrypt($_POST['id'],METODO,KEY); //Variables ID Presentación Huevo.
                        $datos.="Ok ID del Huevo correcto ".$IDPH."<br/>";
                    }else{
                        $datos.="Error con el ID".$IDPH."<br/>";
                    }

                    if(is_String( openssl_decrypt($_POST['nombre'],METODO,KEY ))){
                        $NOMBRE = openssl_decrypt($_POST['nombre'],METODO,KEY);
                        $datos.="Ok nombre del Huevo correcto ".$NOMBRE."<br/>";   
                    }else{
                        $datos.="Error con el nombre".$NOMBRE."<br/>";
                        break;
                    }

                    if(is_numeric( openssl_decrypt($_POST['precio'],METODO,KEY ))){
                        $PRECIO = openssl_decrypt($_POST['precio'],METODO,KEY);
                        $datos.="Ok precio del Huevo correcto ".$PRECIO."<br/>";   
                    }else{
                        $datos.="Error con el precio".$PRECIO."<br/>";
                        break;
                    }

                    if(is_numeric( openssl_decrypt($_POST['cantidad'],METODO,KEY ))){
                        $CANTIDAD = openssl_decrypt($_POST['cantidad'],METODO,KEY);
                        $datos.="Ok cantidad del Huevo correcto ".$CANTIDAD."<br/>";   
                    }else{
                        $datos.="Error con el cantidad".$CANTIDAD."<br/>" ;
                        break;
                    }

                if(!isset($_SESSION['CARRITO'])){

                    $carritoTemporal=array(
                        'IDPH'=>$IDPH,
                        'NOMBRE'=>$NOMBRE,
                        'PRECIO'=>$PRECIO,
                        'CANTIDAD'=>$CANTIDAD,
                    );
                    $_SESSION['CARRITO'][0]=$carritoTemporal;

                }else{
                    $cantidadProductos=count($_SESSION['CARRITO']);

                    $carritoTemporal=array(
                        'IDPH'=>$IDPH,
                        'NOMBRE'=>$NOMBRE,
                        'PRECIO'=>$PRECIO,
                        'CANTIDAD'=>$CANTIDAD,
                    );
                    $_SESSION['CARRITO'][$cantidadProductos]=$carritoTemporal;
                }
                //$datos = print_r($_SESSION,true);
                $datos = "¡Añadiste tu producto al carrito!  ";    
            break;

            case 'Eliminar':
                if(is_numeric( openssl_decrypt($_POST['id'],METODO,KEY ))){
                    $IDP = openssl_decrypt($_POST['id'],METODO,KEY); //Variables ID Presentación Huevo.
                    
                    foreach($_SESSION['CARRITO'] as $indice=>$compras){
                            if($compras['IDPH']==$IDP){
                                unset($_SESSION['CARRITO'][$indice]);
                                
                                //echo "<script>alert('Elemento eliminado del carrito...');</script>";
                            }
                    }


                }else{
                    $datos.="Error con el ID".$IDP."<br/>";
                }
            break;
        }
    }

?>
    
