

document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("dropdown-toggle").addEventListener("click", function() {
        const dropdownMenu = document.getElementById("dropdown-menu");
        dropdownMenu.style.display = dropdownMenu.style.display === "block" ? "none" : "block";
    });
  
    window.onclick = function(event) {
        if (!event.target.matches('#dropdown-toggle')) {
            const dropdowns = document.getElementsByClassName("dropdown-menu");
            for (let i = 0; i < dropdowns.length; i++) {
                const openDropdown = dropdowns[i];
                if (openDropdown.style.display === "block") {
                    openDropdown.style.display = "none";
                }
            }
        }
    }
  });
  
    let menu = document.querySelector('#menu-icon');
    let navbar = document.querySelector('.navbar');
  
    menu.onclick = () => {
      menu.classList.toggle('bx-x');
      navbar.classList.toggle('active');
  
    }
    window.onscroll = () => {
      menu.classList.remove('bx-x');
      navbar.classList.remove('active');
    }
  
  

  
  