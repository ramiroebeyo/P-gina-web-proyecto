<?php
session_start();
if(!isset($_SESSION['user'])) header('location: index.php');

$user = $_SESSION['user']; 
if(strlen($user['first_name']) > 12){
    $user['first_name'] = substr($user['first_name'], 0, 10);
    $user['first_name'] .= "...";
} 
?>

<!DOCTYPE html>
<html lang='en'>    
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>IMS - Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <script src="https://kit.fontawesome.com/c3935f05a0.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="dashboardContainer">
        <div class="sidebar" id="sidebar">
            <h3 id="logo">IMS</h3>
            <div class="sidebarUser">
                <img src="Imagenes/user/perfil.png" alt="User image" id="userImage"/>
                <span id="userName"><?= $user['first_name'] ?></span>
            </div>
            <div class="sidebarMenu">
                <ul class="menuLists">
                    <li>
                        <a id="menuIcons" href=""><i class="fa fa-dashboard"></i> <span class="menuWords">Dashboard</span></a>
                    </li>
                    <li>
                        <a id="menuIcons1" href=""><i class="fa fa-bullhorn"></i> <span class="menuWords">anuncios</span></a>
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
        <div class="contentIcons" id="contentIcons">
            <div class="contentTopNav">
                <a class="navicon" href="" id="Navicon"><i class="fa fa-navicon"></i></a>
                <a class="power-off" href="database/logout.php"><i class="fa fa-power-off"></i> Log-out</a>
            </div>
            <div class="content">
                <div class="contentMain">

                </div>
            </div>
        </div>
    </div>
    <script>

        var sidebarOpen = true;

        Navicon.addEventListener( 'click', (event) => {
            event.preventDefault();

            if(sidebarOpen == true){
                sidebarOpen = false;
                sidebar.style.width = '4%';
                sidebar.style.transition = '0.3s all';
                contentIcons.style.width = '96%';
                logo.style.fontSize = '30px';
                logo.style.marginLeft = '-10px';
                userImage.style.width = '60px';
                userImage.style.marginLeft = '-5px';
                userName.style.display = 'none';
                menuIcons.style.marginLeft = '16px';
                menuIcons1.style.marginLeft = '18px';
                menuIcons2.style.marginLeft = '25px';
                menuIcons3.style.marginLeft = '20px';
                menuIcons4.style.marginLeft = '18px';
                menuIcons5.style.marginLeft = '20px';

                menuWords = document.getElementsByClassName('menuWords');
                for(var i = 0; i < menuWords.length + 1; i++){
                    menuWords[i].style.display = 'none';
                }     
            } else {
                menuIcons.style.marginLeft = '110px';
                menuIcons1.style.marginLeft = '110px';
                menuIcons2.style.marginLeft = '110px';
                menuIcons3.style.marginLeft = '110px';
                menuIcons4.style.marginLeft = '110px';
                menuIcons5.style.marginLeft = '110px';
                sidebarOpen = true;
                sidebar.style.width = '25%';
                sidebar.style.transition = '0.16 all';
                contentIcons.style.width = '75%';
                logo.style.fontSize = '80px';
                logo.style.marginLeft = '0px';
                userImage.style.width = '80px';
                userImage.style.marginLeft = '-140px';
                userName.style.display = 'inline-block';

                menuWords = document.getElementsByClassName('menuWords');
                for(var i = 0; i < menuWords.length; i++){
                    menuWords[i].style.display = 'inline-block';
                }    
            }              
        });    
    </script>
</body>
</html>