require('./bootstrap');

require('alpinejs');

document.getElementById("body").onscroll = function myFunction() {
  var scrolltotop = document.scrollingElement.scrollTop;
  var target = document.getElementById("bg-image");

  if (!target) return;
  var xvalue = "center";
  var factor = 0.7;
  var yvalue = scrolltotop * factor;
  target.style.backgroundPosition = xvalue + " " + yvalue + "px";
}

// Add active class to the current button (highlight it)
const currentLocation = location.href;
const menuItem = document.querySelectorAll('.subMenuItem');
const menuLenght = menuItem.length;
for (let i = 0; i < menuLenght; i++) {
  if (menuItem[i]?.href === currentLocation) {
    menuItem[i].className = 'active';
  }
}

var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("activeAcc");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}