var url = {
 base_url: function (module) {
  var url_host = window.location.host;
  var url_protocol = window.location.protocol;
  return url_protocol + '//' + url_host + '/' + 'pobb-dev' + '/' + module + '/';
 },
 base_next: function (module) {
  var url_host = window.location.host;
  var url_protocol = window.location.protocol;
  return url_protocol + '//' + url_host + '/' + 'pobb-dev' + '/' + module;
 },

 baseUrlUnifi: function(module){
    var url_host = window.location.host;
    var url_protocol = window.location.protocol;
    return url_protocol + '//' + url_host + '/' + 'unifi' + '/' + module+"/";
 },

 base_url_timbangan: function (module) {
   var url_host = window.location.host;
   var url_protocol = window.location.protocol;
   return (
     url_protocol +
     "//" +
     url_host +
     "/" +
     "timbangan" +
     "/" +
     module +
     "/"
   );
 },
};