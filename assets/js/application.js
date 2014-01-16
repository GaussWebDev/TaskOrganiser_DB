$('.widget-link-remove').on("click", function() {  
  $(this).closest('.widget').slideUp("fast");
});
    
$('.is-dropdown-menu').on("click", function() {
  event.preventDefault();
  $(this).next("ul").slideToggle('fast', function() {
    $(this).closest("li").toggleClass('active');
})  });


/* Oepn active menu */
if (typeof(menu_id) != undefined)
    $('#'+menu_id).next('ul').slideToggle(0, function() {
        $(this).closest('li').toggleClass('active');
    });
