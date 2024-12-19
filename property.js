function filterProperties() {
    const selectedDistrict = document.getElementById('district').value.toLowerCase();
    const propertyCards = document.querySelectorAll('.property-card');

    propertyCards.forEach(card => {
        const cardDistrict = card.getAttribute('data-district').toLowerCase();
        if (selectedDistrict === "" || cardDistrict === selectedDistrict) {
            card.style.display = "block"; //Show the card if it matches the filter
        } else {
            card.style.display = "none"; //Hide the card if it doesn't match
        }
    });
}


