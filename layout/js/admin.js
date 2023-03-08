function mySwitch() {
    document.getElementById("myBox").style.display = "none";
  }

function uncheck(){
    document.getElementById('checkbox').checked = false;
}
function validateForm() {
  var name = document.forms["myForm"]["name_person"].value;
  var address = document.forms["myForm"]["address"].value;
  var number = document.forms["myForm"]["number"].value;
  
  if (name.length > 0 && address.length > 0 && number.length > 0) {
    return true;
  } else {
    alert("Please fill in all fields.");
    return false;
  }
}

// function validateForm() {
//   var name = document.forms["myForm"]["name_person"].value;
//   var address = document.forms["myForm"]["address"].value;
//   var number = document.forms["myForm"]["number"].value;
  
//   if (name.length > 0 && address.length > 0 && number.length > 0) {
//     return true;
//   } else {
//     alert("Please fill in all fields.");
//     return false;
//   }
// }
