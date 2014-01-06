(function() {
  $(function() {
    $('.widget-link-remove').on("click", function() {
      $(this).closest('.widget').slideUp("fast");
      return false;
    });
    return $('.is-dropdown-menu').on("click", function() {
      $(this).next("ul").slideToggle('fast', function() {
        return $(this).closest("li").toggleClass('active');
      });
      return false;
    });
  });

}).call(this);

/* Oepn active menu */
if (typeof(menu_id) != undefined)
    $('#'+menu_id).next('ul').slideToggle(0, function() {
        $(this).closest('li').toggleClass('active');
    });
console.log(menu_id);