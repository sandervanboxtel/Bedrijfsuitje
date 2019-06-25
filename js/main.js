// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("myBtn").style.display = "block";
  } else {
    document.getElementById("myBtn").style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}

//time
function checkTime(i) {
  if (i < 10) {
    i = "0" + i;
  }
  return i;
}

function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  // add a zero in front of numbers<10
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('time').innerHTML = h + ":" + m + ":" + s;
  t = setTimeout(function() {
    startTime()
  }, 500);
}
startTime();


// Form Validate Admin
function validateForm() {
  var x = document.forms["loginForm"]["gebruikersnaam"].value;
  if (x == "") {
    alert("Voer alstublieft eerst beide velden in");
    return false;
  }
}

// Form Validate Personeel
function validateForm1() {
  var x = document.forms["formLogin"]["personeelsnummer"].value;
  if (x == "") {
    alert("Voer alstublieft eerst beide velden in");
    return false;
  }
}

// ImageChangerFunction
// function changeimg(image) {
//   var p = document.getElementById("p");
//   p.src = image.src;
//   p.parentElement.style.display ="block";
//   }