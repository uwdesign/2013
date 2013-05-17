window.$ = jQuery
$ ->
  Global.init()

Global =
  init: -> 
    Menu.init()


Menu =
  init: ->
    self = this
    $('.menu .designers').on 'mouseenter', (e) ->
      self.dropDown $('#designers-menu')
    
    $('.menu .work').on 'mouseenter', (e) ->
      self.dropDown $('#work-menu')
      
    $('.sub-menu').on 'mouseleave', ->
      $(this).closest('.sub-menu-wrapper').removeClass('open')
      
  dropDown: (menu) ->
    $('.sub-menu-wrapper').removeClass('open')
    menu.addClass('open')
