jQuery(document).ready(function($) {
  jQuery.post(
    sociable_async_options.ajaxurl,
    {
      action: 'load_skyscraper',
      link: window.location.href,
      title: jQuery('title').html()
    },
    function(response) {
      eval(response);
    }
  );
});
