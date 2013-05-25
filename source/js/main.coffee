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
    Designers.init()
    
    self = this
    
    if window.location.hash
      hash_name = @idfromhash(window.location.hash)
      anchor = $("#p-#{hash_name}")
      if anchor.length
        $(document).imagesLoaded ->
          $(window).scrollTop anchor.offset().top - 200
          
    $('.designer-single__posts-list a').on 'click', (e) ->
      hash_name = self.idfromhash($(this).attr('href'))
      anchor = $("#p-#{hash_name}")
      $(document).imagesLoaded ->
        $('html,body').animate
          scrollTop: anchor.offset().top - 200
    
    $('#programs-header').sticky
      topSpacing: 50
    
    $('#programs-header a').on 'click', (e) ->
      program = $(this).attr('href').split('=').pop()
      p = $("#program-#{program}")
      if program != '' && p.length
        e.preventDefault()
        $('html,body').animate
          scrollTop: p.offset().top - 120
      
  idfromhash: (hash) ->
    hash.split('#').pop().split('-').pop()

Moment =
  enchiladas: ->
    $('#moment > div').each ->
      img = $(this).data('img')
      $(this).css('background', 'url(' + images_url + img + '.png)')
    
    unless $.browser.mobile
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

Designers =
  topOffset: 200
  init: ->
    if $('.designer-single').length
      $(window).on 'scroll resize', @scrollHandler
  
  scrollHandler: ->
    vh = $(window).height()
    scroll = parseInt($(this).scrollTop()) + Designers.topOffset
    
    $('.post-single').each ->
      content = $('.post-single__info', this)
      top = $(this).offset().top
      height = $(this).height()
      end = top + height - content.height()
      
      if scroll > top && scroll < end
        content.css 
          'position': 'fixed'
          'top': Designers.topOffset
          'bottom': 'auto'
      else if scroll > top
        content.css
          'position': 'absolute'
          'top':'auto'
          'bottom': 0
      else
        content.css
          'position': 'absolute'
          'top': 0
          'bottom': 'auto'
      