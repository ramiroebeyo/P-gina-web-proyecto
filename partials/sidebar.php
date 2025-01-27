<div class="sidebar" id="sidebar">
    <h3 id="logo">IMS</h3>
    <div class="sidebarUser">
        <img src="Imagenes/user/perfil.png" alt="User image" id="userImage"/>
        <span id="userName"><?= $user['first_name'] ?></span>
    </div>
    <div class="sidebarMenu">
        <ul class="menuLists">
            <!-- class="menuActive" -->
            <li class="liMainMenu">
                <a id="menuIcons" href="dashboard.php"><i class="fa fa-jedi"></i> <span class="menuWords">Dashboard</span></a>
            </li>
            <li class="liMainMenu">
                <a id="menuIcons2" href="see-products.php"><i class="fa fa-tag  "></i> <span class="menuWords">products</span></a>
            </li>
            <li class="liMainMenu">
                <a id="menuIcons3" href="see-locations.php"><i class="fa fa-map"></i> <span class="menuWords">locations</span></a>
            </li>
            <li class="liMainMenu">
                <a id="menuIcons4" href="see-suppliers.php"><i class="fa fa-truck"></i> <span class="menuWords">suppliers</span></a>
            </li>
            <li class="liMainMenu">
                <a id="menuIcons5" href=""><i class="fa fa-clipboard-list"></i> <span class="menuWords">orders</span></a>
            </li>
            
            <li class="liMainMenu">
                <a id="menuIcons1" href="see-users.php"><i class="fa fa-user-plus"></i> <span class="menuWords">users</span></a>
            </li>
        </ul>
    </div>
</div>