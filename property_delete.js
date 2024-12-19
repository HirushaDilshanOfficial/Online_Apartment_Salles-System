function confirmDelete(event) {
    

    // Prompt the user to type DELETE for confirmation
    let userInput = prompt("Please type 'DELETE' to confirm the deletion:");
    
    // Check if the user typed 'DELETE'
    if (userInput === "DELETE") {
        
        alert("Record delete Successfully")
        event.target.form.submit(); 
    } else {
        
        alert("Deletion cancelled. You did not type 'DELETE'.");
    }
}
