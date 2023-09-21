let navbar = document.querySelector('.header .flex .navbar');

document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
    userBox.classList.remove('active');
}

window.onscroll = () =>{
    userBox.classList.remove('active');
    navbar.classList.remove('active');
}


function loader() {
    document.querySelector(".loader-container").classList.add("fade-out");
  }
  
  function fadeOut() {
    setInterval(loader, 500);
  }
  
  window.onload = fadeOut;