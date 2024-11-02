(function ($) {

  "use strict";

  /**
   * Adds a mobile friendly toggle link to the search form block.
   */
  Backdrop.behaviors.searchToggle = {
    attach: function(context, settings) {
      $(context).find('.block-search-form').once('block-search-toggle').each(function() {
        var element = this;
        var $toggle = $(element).find('.block-title');
        var $block = $toggle.parents('.block-search-form');
        $toggle.on('click', function(e) {
          $block.toggleClass('search-toggle-active');
          if ($block.hasClass('search-toggle-active')) {
            $block.find('.form-search').focus();
          }
        });
      });
    }
  };

  })(jQuery);
