function openTab(evt, tabName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  
  // Hide all tab contents
  for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
  }

  // Remove "active" class from all tab links
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  //Show the selected tab content 
  //set the clicked tab as active
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
}

//Automatically open the first tab
document.getElementById("defaultOpen").click(); 

function checkdelete() {
  return confirm('Are you sure you want to delete this apartment?');
}

