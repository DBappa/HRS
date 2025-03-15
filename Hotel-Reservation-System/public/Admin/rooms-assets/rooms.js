document.getElementById('facilitiesInput').addEventListener('input', function () {
    const query = this.value.trim().toLowerCase();
    const dropdown = document.getElementById('facilitiesDropdown');
    dropdown.innerHTML = '';

    if (query.length > 0) {
        const filteredFacilities = Object.values(facilities).filter(f => f.toLowerCase().includes(query));
        dropdown.style.display = filteredFacilities.length > 0 ? 'block' : 'none';

        filteredFacilities.forEach(facility => {
            const listItem = document.createElement('li');
            listItem.textContent = facility;
            listItem.classList.add('dropdown-item', 'py-2', 'font-lg', 'pl-2', 'cursor-pointer');
            listItem.addEventListener('click', () => {
                document.getElementById('facilitiesInput').value = facility;
                dropdown.style.display = 'none';
            });
            dropdown.appendChild(listItem);
        });
    } else {
        dropdown.style.display = 'none';
    }
});

let selectedFacilities = []; // Store selected facilities

document.getElementById('facilitiesInput').addEventListener('keypress', function (event) {
    if (event.key === 'Enter') {
        event.preventDefault();
        const facility = this.value.trim();
        if (facility && !selectedFacilities.some(f => f.name === facility)) {
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
    tag.classList.add('inline-flex', 'items-center', 'bg-blue-500', 'text-white', 'text-sm', 'font-medium', 'px-3', 'py-1', 'rounded-full', 'mr-2', 'shadow-md');
    tag.textContent = facilityObject.name;

    const removeButton = document.createElement('button');
    removeButton.type = 'button';
    removeButton.classList.add('ml-2', 'text-white', 'hover:text-gray-200', 'focus:outline-none', 'focus:ring', 'focus:ring-gray-300');
    removeButton.textContent = 'x';
    removeButton.addEventListener('click', () => {
        selectedFacilities = selectedFacilities.filter(f => f.id !== facilityObject.id);
        tag.remove();
        updateFacilitiesInput();
    });

    tag.appendChild(removeButton);
    tagContainer.appendChild(tag);
    updateFacilitiesInput();
}

function updateFacilitiesInput() {
    document.getElementById('hiddenFacilitiesInput').value = JSON.stringify(selectedFacilities);
}
