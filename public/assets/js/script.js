$(document).ready(function () {
  $('#loginForm').on('submit', function (e) {
    e.preventDefault();
    
    const email = $('#email').val();
    const password = $('#password').val();
    const rememberMe = $('#rememberMe').is(':checked');
    
    $.ajax({
      url: '/api/login',
      type: 'POST',
      contentType: 'application/json',
      data: JSON.stringify({ email, password, rememberMe }),
      success: function (response) {
        if (response.status === 'ok') {
          $('#message').html(`<div class="alert alert-success">${response.message}</div>`);
        } else {
          $('#message').html(`<div class="alert alert-danger">${response.message}</div>`);
        }
      },
      error: function () {
        $('#message').html(`<div class="alert alert-danger">Something went wrong!</div>`);
      }
    });
  });
});