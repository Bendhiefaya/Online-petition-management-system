function selectPetition() {
  alert("press ok to view your petition content ");
  var x = document.getElementById("dropdown").value;//getting the selected  value of the dropdown list
//transporting data using ajax 
  $.ajax({
    url: "showinfo.php", //page where is the code that will be executed 
    method: "POST",
    data: {
      id: x, // data that we will be working with 
    },
    success: function (data) {
      $("#content").html(data); //where we will display our results
    },
  });
}
/* function for the form validation */
function validateform() {
  var name = document.form.name.value;
  var familyname = document.form.familyname.value;
  var password1 = document.form.password1.value;
  var email = document.form.email.value;
  var password2 = document.form.password2.value;
  if (name == null || name == "") {
    alert("enter your name please !");
  }
  if (familyname == null || familyname == "") {
    alert("enter your family name please !");
  }
  if (email == null || email == "") {
    alert("enter your email please !");
  }
  if (password1 == null || password1 == "") {
    alert("enter your password please !");
  }
  if (password2 == null || password2 == "") {
    alert("enter your password please !");
  }
  if (password1 != password2) {
    alert("passwords do not match!");
  }
  if (password1.length < 8) {
    alert("password must be at least 8 characters long !");
    return false;
  }
}
