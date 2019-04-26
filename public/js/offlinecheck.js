$( document ).ready(function() {
  var checkStatus = function() {
    if (navigator.onLine) {
        console.log("online hu");
        document.getElementById("btn-submit").removeAttribute("disabled");
        $("#view_offline").hide();

    } else {
        console.log("offline hu");
        document.getElementById("btn-submit").setAttribute("disabled","disabled");
        $("#view_offline").show();
        //$( ":submit" ).setAttribute("disabled","disabled");
    }
  }

  window.addEventListener("online", function() {
    checkStatus();
  });
  window.addEventListener("offline", function() {
    checkStatus();
  });




});

// $( document ).ready(function() {
//   var testObject = { 'one': 1, 'two': 2, 'three': 3 };
//
//   // Put the object into storage
//   localStorage.setItem('testObject', JSON.stringify(testObject));
//
//   // Retrieve the object from storage
//   var retrievedObject = localStorage.getItem('testObject');
//
//   console.log('retrievedObject: ', JSON.parse(retrievedObject));
// });
