document.getElementById('facilitiesInput').addEventListener('input', function () {
    const query = this.value.trim().toLowerCase();
    const dropdown = document.getElementById('facilitiesDropdown');
    
    dropdown.innerHTML = '';

    if (query.length > 0) {
        const filteredFacilities = Object.values(facilities).filter(facility => 
            facility.toLowerCase().includes(query)
        );

        if (filteredFacilities.length > 0) {
            filteredFacilities.forEach(facility => {
                const listItem = document.createElement('li');
                listItem.textContent = facility;
                listItem.classList.add('dropdown-item');
                listItem.addEventListener('click', function () {
                    document.getElementById('facilitiesInput').value = facility;
                    dropdown.style.display = 'none';
                });
                dropdown.appendChild(listItem);
            });

            dropdown.style.display = 'block';
        } else {
            dropdown.style.display = 'none';
        }
    } else {
        dropdown.style.display = 'none';
    }
});

// Add facilities as tags
let selectedFacilities = []; // Array to store selected facilities

document.getElementById('facilitiesInput').addEventListener('keypress', function (event) {
    if (event.key === 'Enter') {
        event.preventDefault();
        const facility = this.value.trim();

        if (facility.length > 0 && !selectedFacilities.find(f => f.name === facility)) {
            // Assume ID is determined from facilities array
            const facilityObject = { id: facilities[facility], name: facility };

            selectedFacilities.push(facilityObject);
            addFacilityTag(facilityObject);
            this.value = '';
        }
    }
});

function addFacilityTag(facilityObject) {
    const tagContainer = document.getElementById('facilityTags');
    const tag = document.createElement('span');
    tag.classList.add('badge', 'bg-primary', 'me-1');
    tag.textContent = facilityObject.name;

    // Add a remove button to the tag
    const removeButton = document.createElement('button');
    removeButton.type = 'button';
    removeButton.classList.add('btn-close', 'btn-close-white', 'ms-2');
    removeButton.addEventListener('click', function () {
        selectedFacilities = selectedFacilities.filter(f => f.id !== facilityObject.id);
        tag.remove();
    });

    tag.appendChild(removeButton);
    tagContainer.appendChild(tag);

    // Sync the selected facilities to a hidden input field
    updateFacilitiesInput();
}

function updateFacilitiesInput() {
    const hiddenInput = document.getElementById('hiddenFacilitiesInput');
    hiddenInput.value = JSON.stringify(selectedFacilities);
}
