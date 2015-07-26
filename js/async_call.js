jQuery(document).ready(function($) {
  var data = {
    link: window.location.href,
    title: jQuery('title').html()
  };

  jQuery.post(sociable_async_options.base_url + 'includes/async_request.php', data, function(response) {
    eval(response);
  });
});
