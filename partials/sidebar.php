<?php
    $current_page = basename($_SERVER['PHP_SELF']); // Obtiene el nombre del archivo actual
?>

<div class="sidebar" id="sidebar">
    <h3 id="logo">IMS</h3>
    <div class="sidebarUser">
        <img src="Imagenes/user/perfil.png" alt="User image" id="userImage"/>
        <span id="userName" style="top: 21%; font-size: 25px; margin-left: 15px;"><?= $user['first_name'] ?></span> 
    </div>
    <div class="sidebarMenu">
        <ul class="menuLists">
            <li class="<?= ($current_page == 'see-products.php') ? 'menuActive' : '' ?>">
                <a href="see-products.php"><i class="fa fa-tag"></i> <span class="menuWords">products</span></a>
            </li>
            <li class="<?= ($current_page == 'see-locations.php') ? 'menuActive' : '' ?>">
                <a href="see-locations.php"><i class="fa fa-map"></i> <span class="menuWords">locations</span></a>
            </li>
            <li class="<?= ($current_page == 'see-suppliers.php') ? 'menuActive' : '' ?>">
                <a href="see-suppliers.php"><i class="fa fa-truck"></i> <span class="menuWords">suppliers</span></a>
            </li>
            <li class="<?= ($current_page == 'add-order.php') ? 'menuActive' : '' ?>">
                <a href="see-orders.php"><i class="fa fa-shopping-cart"></i> <span class="menuWords">orders</span></a>
            </li>
            <li class="<?= ($current_page == 'see-users.php') ? 'menuActive' : '' ?>">
                <a id="menuIcons1" href="see-users.php"><i class="fa fa-user-plus"></i> <span class="menuWords">users</span></a>
            </li>
        </ul>
    </div>
</div>
    