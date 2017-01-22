$( document ).ready(function() {
  console.log(window.location.href);

    $(document).on('click','#submit',function() {
      var blacklist = ["alert","prompt","img","div","script","textarea","svg","iframe","input","confirm"];
      var text =  $('#text').val();
      var username =  $('#username').val();
      var email =  $('#email').val();


      $.each(blacklist, function( index, value ) {
        text = text.replace(value, "");
        username = username.replace(value, "");
        email = email.replace(value, "");

      });
      $('#text').val(text);
      $('#username').val(username);
      $('#email').val(email);

      $('#comment').submit();
    })
});
