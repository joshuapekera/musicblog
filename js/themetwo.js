// Fancy Box
jQuery(document).ready(function() {
            jQuery(".fancybox").fancybox();
    
        });

function toggle_visibility(id) {
       var e = document.getElementById(id);
       if(e.style.display == 'block')
          e.style.display = 'none';
       else
          e.style.display = 'block';
    }

// Dropdown Menu
var $link = $(".main-nav a");
var $slide = $(".main-nav ul");

$link.on('click', function() { 
   var el = $(this);
   el.next($slide)
   .slideToggle();
 });

$link
.closest($slide)
.prev($link)
.addClass("parent");

$(".parent").on('click', function() { 
   var el = $(this);
   el.toggleClass("parent-expanded");
});