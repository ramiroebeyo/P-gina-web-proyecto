//sidebar open/close
var Navicon = document.getElementById('Navicon');
var sidebar = document.getElementById('sidebar');
var contentIcons = document.getElementById('contentIcons');
var logo = document.getElementById('logo');
var userImage = document.getElementById('userImage');
var userName = document.getElementById('userName');
var menuIcons = document.getElementById('menuIcons');
var menuIcons1 = document.getElementById('menuIcons1');
var menuIcons2 = document.getElementById('menuIcons2');
var menuIcons3 = document.getElementById('menuIcons3');
var menuIcons4 = document.getElementById('menuIcons4');
var menuIcons5 = document.getElementById('menuIcons5');
var sidebarOpen = true;
var menuWords;

    Navicon.addEventListener( 'click', (event) => {
        event.preventDefault();

        if(sidebarOpen == true){
            sidebarOpen = false;
            sidebar.style.width = '12%';       
            sidebar.style.height = '120vh';
            sidebar.style.transition = '0.3s all';
            contentIcons.style.width = '96%';
            logo.style.fontSize = '30px';
            logo.style.marginLeft = '-10px';
            userName.style.display = 'none';    

            menuWords = document.getElementsByClassName('menuWords');
            for(var i = 0; i < menuWords.length; i++){
                menuWords[i].style.display = 'none';
            }     
        } else {
            sidebarOpen = true;
            sidebar.style.width = '20%';
            sidebar.style.transition = '0.16s all';
            contentIcons.style.width = '75%';
            logo.style.fontSize = '80px';
            logo.style.marginLeft = '0px';
            sidebar.style.transition = '0.16s all';
            sidebarOpen = true;

            menuWords = document.getElementsByClassName('menuWords');
            for(var i = 0; i < menuWords.length; i++){
                menuWords[i].style.display = 'inline-block';
            }    
        }              
    });    

