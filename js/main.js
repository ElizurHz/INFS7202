function signUpClear() {
  $('#signup_info').html('');
  $('#inputSignUpUsername').val('');
  $('#inputSignUpPassword').val('');
  $('#confirmPassword').val('');
}

function loginClear() {
  $('#login_info').html('');
  $('#inputLoginUsername').val('');
  $('#inputLoginPassword').val('');
}

function changePasswordClear() {
  $('#changePassword_info').html('');
  $('#currentPassword').val('');
  $('#newPassword').val('');
  $('#confirmNewPassword').val('');
}

function submitLoginForm() {
  var username = document.getElementById('inputLoginUsername');
  var password = document.getElementById('inputLoginPassword');

  if (!username.value) {
    $('#login_info').html('Username cannot be empty!');
    return;
  }
  if (!password.value) {
    $('#login_info').html('Password cannot be empty!');
    return;
  }

  $.ajax({
    url: 'Login.php?action=login',
    type: 'POST',
    dataType: 'json',
    data: {
      'username': username.value,
      'password': password.value
    },
    beforeSend: function() {
      $('#login_info').html('Waiting...');
    },
    success: function login_success(data) {
      if (data.status == "1") {
        $('#login_info').html("Login successful.");
        // close the modal and change the DOM of "Account"
        setTimeout(function(){
          $('#LoginModal').modal('hide');
        },1000);      
        $('#signup, #login').hide();
        $('#account').append('<li><a class="dropdown_item" id="currentUser">Current User: ' + data.username + '</a></li>');
        $('#account').append('<li id="logout"><a class="dropdown_item" data-toggle="modal" data-target="#LogoutModal">Log Out</a></li>');
        $('#account').append('<li id="changePassword"><a class="dropdown_item" data-toggle="modal" data-target="#changePasswordModal" onclick="changePasswordClear();">Change Password</a></li>');
        if (data.admin) {
          $('#account').append('<li id="newContent"><a class="dropdown_item" href="Upload.php">New Content</a></li>');
        }           
      } else {
        $('#login_info').html("Please enter the correct username or password.");
      }
    }
  })
}

function submitSignUpForm() {
  var username = document.getElementById('inputSignUpUsername');
  var password = document.getElementById('inputSignUpPassword');
  var confirm = document.getElementById('confirmPassword');
  var reg = /^[0-9a-zA-Z]*$/g;

  if (!username.value) {
    $('#signup_info').html('Username cannot be empty!');
    return;
  }
  if (!reg.test(username.value)) {
    $('#signup_info').html('You can only use A-Z, a-z, and 0-9 in your username!');
    return;
  }
  if (!password.value) {
    $('#signup_info').html('Password cannot be empty!');
    return;
  }
  if (password.value != confirm.value) {
    $('#signup_info').html('Please ensure your confirmation matches the password.');
    return;
  }

  $.ajax({
    url: 'Login.php?action=signup',
    type: 'POST',
    dataType: 'json',
    data: {
      'username': username.value,
      'password': password.value
    },
    beforeSend: function() {
      $('#signup_info').html('Waiting...');
    },
    success: function signup_success(data) {
      if (data.status == "1") {
        $('#signup_info').html("Sign up successful.");
        // close the modal and change the DOM of "Account" (Automaitc login)
        setTimeout(function(){
          $('#SignUpModal').modal('hide');
        },1000);        
        $('#signup, #login').hide();
        $('#account').append('<li><a class="dropdown_item" id="currentUser">Current User: ' + data.username + '</a></li>');
        $('#account').append('<li id="logout"><a class="dropdown_item" data-toggle="modal" data-target="#LogoutModal">Log Out</a></li>');
        $('#account').append('<li id="changePassword"><a class="dropdown_item" data-toggle="modal" data-target="#changePasswordModal" onclick="changePasswordClear();">Change Password</a></li>');
      }
      if (data == "0") {
        $('#signup_info').html("This username has already existed!");
      }
    }
  })
}


function clearWords() {
  document.getElementById('title_input').value = "";
  document.getElementById('comment_input').value = "";
}

function logOut() {
  $.ajax({
    url: 'Login.php?action=logout',
    type: 'POST',
    success: function out(data) {
      if (data == "1") {
        alert("Log Out Successful.");
      }
      $('#currentUser').hide();
      $('#logout').remove();
      $('#changePassword').remove();
      $('#newContent').remove();
      $('#currentUser').remove();
      $('#account').append('<li id="signup"><a class="dropdown_item" data-toggle="modal" data-target="#SignUpModal" onclick="signUpClear();">Sign Up</a></li>');
      $('#account').append('<li id="login"><a class="dropdown_item"  data-toggle="modal" data-target="#LoginModal" onclick="loginClear();">Login</a></li>');          

      setTimeout(function(){
        $('#LogoutModal').modal('hide');
      },1000);    
    }
  })
}

function uploadLogout() {
  self.location="index.php";
  logOut(); 
}

function changePassword() {
  var currPassword = document.getElementById('currentPassword');
  var newPassword = document.getElementById('newPassword');
  var confirmNewPassword = document.getElementById('confirmNewPassword');
  var currUser = $('#currentUser').html().substring(14);

  // Input the same password
  if (currPassword.value == newPassword.value) {
    $('#changePassword_info').html('Your new password cannot be the same as your current password!');
    return;
  }

  if (confirmNewPassword.value != newPassword.value) {
    $('#changePassword_info').html('Please ensure your confirmation matches the password.');
    return;
  }

  $.ajax({
    url: 'Login.php?action=changePassword',
    type: 'POST',
    dataType: 'json',
    data: {
      'currUser': currUser,
      'currPassword': currPassword.value,
      'newPassword': newPassword.value
    },
    success: function change(data) {
      if (data == "0") {
        $('#changePassword_info').html('Plesae input your current password correctly!');
      }
      if (data == "1") {
        $('#changePassword_info').html('Your password has been successfully changed.');
        setTimeout(function(){
          $('#changePasswordModal').modal('hide');
        },1000);
      }
    }
  })
}

$(function() {
  $('.uploaded_pics img, #upload_logo, .albums ul li img').mouseenter(function () {
    $(this).animate({
      opacity:.66
    },200);
  });
  $('.uploaded_pics img, #upload_logo, .albums ul li img').mouseleave(function () {
    $(this).animate({
      opacity:1
    },200);
  });
});

