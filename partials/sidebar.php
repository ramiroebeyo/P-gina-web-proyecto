<div class="sidebar" id="sidebar">
    <h3 id="logo">IMS</h3>
    <div class="sidebarUser">
        <img src="Imagenes/user/perfil.png" alt="User image" id="userImage"/>
        <span id="userName"><?= $user['first_name'] ?></span>
    </div>
    <div class="sidebarMenu">
        <ul class="menuLists">
            <!-- class="menuActive" -->
            <li>
                <a id="menuIcons" href="dashboard.php"><i class="fa fa-dashboard"></i> <span class="menuWords">Dashboard</span></a>
            </li>
            <li>
                <a id="menuIcons1" href="add-user.php"><i class="fa fa-user-plus"></i> <span class="menuWords">add user</span></a>
            </li>
            <li>
                <a id="menuIcons2" href=""><i class="fa fa-dollar-sign"></i> <span class="menuWords">ganancias</span></a>
            </li>
            <li>
                <a id="menuIcons3" href=""><i class="fa fa-book"></i> <span class="menuWords">por cobrar</span></a>
            </li>
            <li>
                <a id="menuIcons4" href=""><i class="fa fa-gear"></i> <span class="menuWords">Ajustes</span></a>
            </li>
            <li>
                <a id="menuIcons5" href=""><i class="fa fa-chart-simple"></i> <span class="menuWords">Estadisticas</span></a>
            </li>
        </ul>
    </div>
</div>