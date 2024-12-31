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
                <span id="userName">Gomez</span>
            </div>
            <div class="sidebarMenu">
                <ul class="menuLists">
                    <li>
                        <a id="menuIcons" href=""><i class="fa fa-dashboard"></i> <span class="menuWords">Dashboard</span></a>
                    <li>
                        <a id="menuIcons1" href=""><i class="fa fa-dashboard"></i> <span class="menuWords">Dashboard</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="contentIcons" id="contentIcons">
            <div class="contentTopNav">
                <a class="navicon" href="" id="Navicon"><i class="fa fa-navicon"></i></a>
                <a class="power-off" href=""><i class="fa fa-power-off"></i> Log-out</a>
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
                menuIcons.style.marginLeft = '15px';
                menuIcons1.style.marginLeft = '15px';

                menuWords = document.getElementsByClassName('menuWords');
                for(var i = 0; i < menuWords.length; i++){
                    menuWords[i].style.display = 'none';
                }     
            } else {
                menuIcons.style.marginLeft = '110px';
                menuIcons1.style.marginLeft = '110px';
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