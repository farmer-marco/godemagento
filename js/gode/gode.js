
jQuery(document).ready(function() {
    function showSubMenu() {
        $jq(this).find('ul:first').addClass('submenu-active'); $jq(this).unbind('click');
    }
    
    $jq('.show-more').on('click', showSubMenu);
    $jq('.back-cell').on('click', function(e) {
        $jq('.submenu-active:last').removeClass('submenu-active');
        e.stopPropagation();
        $jq(window).scrollTop(0);
        $jq('.show-more').on('click', showSubMenu);
    });
    
    // var el = $jq("#hamburger");

    // el.on("click", function(){
    //   $jq(this).toggleClass("active");
    // });
    
});

function toggleSidenav(bool) {
  document.getElementById("hamburger").classList.toggle('active');
  document.body.classList.toggle('sidenav-active');  
  document.body.classList.toggle('noscroll');

}
