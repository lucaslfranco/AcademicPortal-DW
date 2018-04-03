var acc = document.getElementsByClassName("sidenav-section");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        /* Toggle between adding and removing the "active" class,
        to highlight the button that controls the sidenav_options */
        this.classList.toggle("active");

        /* Toggle between hiding and showing the active sidenav_options */
        var sidenav_options = this.nextElementSibling;
        if (sidenav_options.style.maxHeight){
            sidenav_options.style.maxHeight = null;
          } else {
            sidenav_options.style.maxHeight = sidenav_options.scrollHeight + "px";
          } 
    });
}