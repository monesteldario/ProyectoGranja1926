<?php




if(!empty ($_SESSION["Perfil"] ) &&  $_SESSION["Perfil"] == 1 )
{
    
    echo '<li><a href="shop.php" style="color: aliceblue;">Huevos</a></li>';
    
    echo '<li><a href="cart.php" style="color: aliceblue;">Carrito</a></li>';
    echo '<li><a href="checkout.php" style="color: aliceblue;">Acceder</a></li>';
    echo '<li><a href="my-account.php" style="color: aliceblue;">Mi Cuenta</a></li>';
    echo '<li><a href="mi_cuenta.php" style="color: aliceblue;">Mis Datos</a></li>';

}
else if(!empty ($_SESSION["Perfil"] ) && $_SESSION["Perfil"] == 2)
{
    echo '<li><a href="shop.php" style="color: aliceblue;">Huevos</a></li>';

    echo '<li><a href="cart.php" style="color: aliceblue;">Carrito</a></li>';
    echo '<li><a href="checkout.php" style="color: aliceblue;">Acceder</a></li>';
    
    echo '<li><a href="mi_cuenta.php" style="color: aliceblue;">Mis Datos</a></li>';
}else
{
    echo '<li><a href="shop.php" style="color: aliceblue;">Huevos</a></li>';

    echo '<li><a href="cart.php" style="color: aliceblue;">Carrito</a></li>';
    echo '<li><a href="checkout.php" style="color: aliceblue;">Acceder</a></li>';
}


?>