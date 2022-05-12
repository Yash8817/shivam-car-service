var check_pass = function() {
    if (document.getElementById('password').value ==
      document.getElementById('cpassword').value) {
        document.getElementById('pass_message').style.color = 'green';
        document.getElementById('pass_message').innerHTML = 'Valid password';
        
      } else {
        document.getElementById('pass_message').style.color = 'red';
        document.getElementById('pass_message').innerHTML = 'Password not matching!';
        
    }
  }
  
  var check_phone = function() {
    if (document.getElementById('mobile').value.length == 10)
     {
        document.getElementById('phone_message').style.color = 'green';
        document.getElementById('phone_message').innerHTML = '';
        
      } else {
        document.getElementById('phone_message').style.color = 'red';
        document.getElementById('phone_message').innerHTML = 'required 10 digits, match requested format!';
        
    }
  }


  var check_name = function() {
    if (document.getElementById('name').value.length == 10)
     {
        document.getElementById('phone_message').style.color = 'green';
        document.getElementById('phone_message').innerHTML = '';
        
      } else {
        document.getElementById('phone_message').style.color = 'red';
        document.getElementById('phone_message').innerHTML = 'required 10 digits, match requested format!';
        
    }
  }
  