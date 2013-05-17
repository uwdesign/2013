(function() {
  var Global, Menu;

  window.$ = jQuery;

  $(function() {
    return Global.init();
  });

  Global = {
    init: function() {
      return Menu.init();
    }
  };

  Menu = {
    init: function() {
      var self;

      self = this;
      $('.menu .designers').on('mouseenter', function(e) {
        return self.dropDown($('#designers-menu'));
      });
      $('.menu .work').on('mouseenter', function(e) {
        return self.dropDown($('#work-menu'));
      });
      return $('.sub-menu').on('mouseleave', function() {
        return $(this).closest('.sub-menu-wrapper').removeClass('open');
      });
    },
    dropDown: function(menu) {
      $('.sub-menu-wrapper').removeClass('open');
      return menu.addClass('open');
    }
  };

}).call(this);
