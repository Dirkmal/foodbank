function openNav() {
  var windowSize =
    window.innerWidth ||
    document.documentElement.clientWidth ||
    document.body.clientWidth;

  if (windowSize <= 768.98) {
    //DoSomething
    document.getElementById("mySidenav").style.width = "250px";
  } else {
    document.getElementById("mySidenav").style.width = "19.666667%";
  }
}

/* Set the width of the side navigation to 0 */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}

$(document).ready(function () {
  $(".custom-toggle").click(function () {
    var dropdownMenu = $(this).parent().children(".dropdown-menu");
    if (dropdownMenu.hasClass("show")) {
      dropdownMenu.removeClass("show");
    } else {
      dropdownMenu.toggleClass("show");
    }
  });
});
window.onresize = openNav;
