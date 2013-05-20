window.$ = jQuery
$ ->
  Global.init()

Global =
  init: -> 
    Menu.init()
    Posts.init()
    Boxes.init()


Menu =
  init: ->
    self = this
    $('.menu .designers a').on 'mouseenter', (e) ->
      self.dropDown $('#designers-menu')
    
    $('.menu .work a').on 'mouseenter', (e) -> 
      self.dropDown $('#work-menu')
      
    $('.sub-menu').on 'mouseleave', ->
      $(this).closest('.sub-menu-wrapper').removeClass('open')
      
  dropDown: (menu) ->
    $('.sub-menu-wrapper').removeClass('open')
    menu.addClass('open')

Boxes =
  init: ->
    maxY = 0
    z = 0
    $('#boxshots img').each ->
      x = $(this).data('x')
      y = $(this).data('y')
      z += 1
      if y > maxY
        maxY = y
      $(this).css
        left: x
        top: y
        'z-index': z
    
    $('#boxshots').css
      height: maxY + 300

Posts =
  init: ->
    $('#posts').imagesLoaded ->
      $(this).isotope
        masonry:
          columnWidth: 273