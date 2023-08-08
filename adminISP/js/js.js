function myFunction() {
    var x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }




   // 👇 pass the form into the function as a parameter
   function checkPassword(form) {
    // 👇 get passwords from the field using their name attribute
    const password = form.password.value;
    const PasswordConfirmation = form.PasswordConfirmation.value;

    // 👇 check if both match using if-else condition
    if (password != PasswordConfirmation) {
      alert("Error! Password did not match.");
      return false;
    } else {
      
      return true;
    }
  }