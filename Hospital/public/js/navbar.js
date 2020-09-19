const displayRespnsiveMenu = () => {

    let links = document.getElementById('top');
  
    if(links.className === 'links'){
        links.className += ' responsive';
    }else{
        links.className  = 'links';
    }
  }