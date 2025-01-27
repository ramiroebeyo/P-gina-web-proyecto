//sidebar open/close

var sidebarOpen = true;

    Navicon.addEventListener( 'click', (event) => {
        event.preventDefault();

        if(sidebarOpen == true){
            sidebarOpen = false;
            sidebar.style.width = '4%';       
            sidebar.style.height = '120vh';
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
            menuIcons1.style.paddingBottom = '100px';
            menuIcons2.style.marginLeft = '110px';
            menuIcons3.style.marginLeft = '110px';
            menuIcons4.style.marginLeft = '110px';
            menuIcons5.style.marginLeft = '110px';
            sidebarOpen = true;
            sidebar.style.height = '120vh';
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

