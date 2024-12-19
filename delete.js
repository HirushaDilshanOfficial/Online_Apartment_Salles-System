function confirmDelete(event) {
    //Prompt the user to type 'DELETE' 
    let userInput = prompt("Please type 'DELETE' to confirm the deletion:");

    //Check if the input type
    if (userInput == "DELETE") {
        alert("Record deleted successfully");
        return true; //Allow form submission
    } else {
        alert("Deletion cancelled. You must type 'DELETE' exactly.");
        event.preventDefault(); //form submission
        return false;
    }
}