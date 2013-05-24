window.$ = jQuery
root_url = location.protocol + '//' + location.hostname + ':' + location.port
images_url = root_url + '/wp-content/themes/uwdesign2013/images/'

$ ->
  Global.init()

Global =
  init: -> 
    Menu.init()
    Posts.init()
    Boxes.init()
    Moment.enchiladas()
    
    if window.location.hash
      hash_name = window.location.hash.split('#').pop().split('-').pop()
      anchor = $("#p-#{hash_name}")
      if anchor.length
        $(document).imagesLoaded ->
          $(window).scrollTop anchor.offset().top - 200

Moment =
  enchiladas: ->
    $('#moment > div').each ->
      img = $(this).data('img')
      $(this).css('background', 'url(' + images_url + img + '.png)')
    
    skrollr.init()

Boxes =
  
  init: ->
    self = this
    
    $('[data-userid]').on 'mouseenter', (e) ->
      self.mouseLeaveHandler()
      
      userid = $(this).data('userid')
      $("[data-userid=#{userid}], #boxshots").addClass('active')
    .on 'mouseleave', (e) ->
      self.mouseLeaveHandler()
    
    $('#boxshots, #programs-list').on 'mouseleave', ->
      $('#boxshots').removeClass('active')
      
  mouseLeaveHandler: ->
    $('[data-userid]').removeClass('active')


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


Posts =
  init: ->
    $('#posts').imagesLoaded ->
      $(this).isotope
        masonry:
          columnWidth: 273