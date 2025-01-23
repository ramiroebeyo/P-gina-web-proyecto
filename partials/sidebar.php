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
                <a id="menuIcons" href="dashboard.php"><i class="fa fa-dashboard"></i> <span class="menuWords">Dashboard</span></a>
            </li>
            <li class="liMainMenu">
                <a id="menuIcons2" href="add-product.php"><i class="fa fa-tag  "></i> <span class="menuWords">products</span></a>
            </li>
            <li class="liMainMenu">
                <a id="menuIcons3" href=""><i class="fa fa-map"></i> <span class="menuWords">locations</span></a>
            </li>
            <li class="liMainMenu">
                <a id="menuIcons4" href="add-supplier.php"><i class="fa fa-truck"></i> <span class="menuWords">suppliers</span></a>
            </li>
            <li class="liMainMenu">
                <a id="menuIcons5" href=""><i class="fa fa-chart-simple"></i> <span class="menuWords">Estadisticas</span></a>
            </li>
            
            <li class="liMainMenu">
                <a id="menuIcons1" href="add-user.php">
                    <i class="fa fa-user-plus"></i> 
                    <span class="menuWords">users</span><a href="" id="SubMenuArrow"><i class="fa fa-angle-up menuIcons1angle"></i></a> 
                </a>
                <ul class="subMenu">
                    <li><a href=""><i class="fa fa-circle"></i>view users</a></li>
                    <li><a href="add-user.php"><i class="fa fa-circle"></i>create users</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>