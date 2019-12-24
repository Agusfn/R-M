jQuery( document ).ready(function( $ ) {

	$('[data-toggle="tooltip"]').tooltip();



    $(".filter select").change(function() {
        var newUrl = UpdateQueryString("page", null, window.location.href);
        window.location.href = UpdateQueryString($(this).attr("name"), $(this).val(), newUrl);
    })

    

});



function slugify(text) 
{
    var from = "ãàáäâẽèéëêìíïîõòóöôùúüûñç·/_,:;";
    var to   = "aaaaaeeeeeiiiiooooouuuunc------";
    for (var i = 0, len = from.length; i < len; i++) {
        text = text.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
    }
    return text
        .toString()                     // Cast to string
        .toLowerCase()                  // Convert the string to lowercase letters
        .trim()                         // Remove whitespace from both sides of a string
        .replace(/\s+/g, '-')           // Replace spaces with -
        .replace(/&/g, '-y-')           // Replace & with 'and'
        .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
        .replace(/\-\-+/g, '-');        // Replace multiple - with single -
}




function UpdateQueryString(key, value, url) {
      if (!url) url = window.location.href;
      var re = new RegExp("([?&])" + key + "=.*?(&|#|$)(.*)", "gi"),
          hash;

      if (re.test(url)) {
          if (typeof value !== 'undefined' && value !== null) {
              return url.replace(re, '$1' + key + "=" + value + '$2$3');
          } 
          else {
              hash = url.split('#');
              url = hash[0].replace(re, '$1$3').replace(/(&|\?)$/, '');
              if (typeof hash[1] !== 'undefined' && hash[1] !== null) {
                  url += '#' + hash[1];
              }
              return url;
          }
      }
      else {
          if (typeof value !== 'undefined' && value !== null) {
              var separator = url.indexOf('?') !== -1 ? '&' : '?';
              hash = url.split('#');
              url = hash[0] + separator + key + '=' + value;
              if (typeof hash[1] !== 'undefined' && hash[1] !== null) {
                  url += '#' + hash[1];
              }
              return url;
          }
          else {
              return url;
          }
      }
  }