document
    .getElementById("facilitiesInput")
    .addEventListener("input", function () {
        const query = this.value.trim().toLowerCase();
        const dropdown = document.getElementById("facilitiesDropdown");
        dropdown.innerHTML = "";

        if (query.length > 0) {
            const filteredFacilities = facilities.filter((f) =>
                f.name.toLowerCase().includes(query)
            );
            dropdown.style.display =
                filteredFacilities.length > 0 ? "block" : "none";

            filteredFacilities.forEach((facility) => {
                const listItem = document.createElement("li");
                listItem.textContent = facility.name;
                listItem.classList.add(
                    "dropdown-item",
                    "py-2",
                    "font-lg",
                    "pl-2",
                    "cursor-pointer"
                );
                listItem.addEventListener("click", () => {
                    addFacilityTag(facility); // Add facility to tags
                    document.getElementById("facilitiesInput").value = ""; // Clear the input field
                    dropdown.style.display = "none"; // Close the dropdown
                });
                dropdown.appendChild(listItem);
            });
        } else {
            dropdown.style.display = "none";
        }
    });

let selectedFacilities = []; // Store selected facilities

document
    .getElementById("facilitiesInput")
    .addEventListener("keydown", function (event) {
        const dropdown = document.getElementById("facilitiesDropdown");

        if (event.key === "Enter") {
            event.preventDefault(); // Prevent form submission if inside a form
            const facilityName = this.value.trim();

            // Check if the input field has a value
            if (facilityName) {
                // Try to match the facility name in the list
                const matchedFacility = facilities.find(
                    (f) => f.name.toLowerCase() === facilityName.toLowerCase()
                );

                if (matchedFacility) {
                    // Add the matched facility as a tag
                    addFacilityTag(matchedFacility);
                } else {
                    // Add the unmatched facility with a null ID
                    addFacilityTag({ id: null, name: facilityName });
                }

                this.value = ""; // Clear the input field
            }

            dropdown.style.display = "none"; // Close the dropdown
        }
    });

function addFacilityTag(facilityObject) {
    const tagContainer = document.getElementById("facilityTags");
    const tag = document.createElement("span");
    tag.classList.add(
        "inline-flex",
        "items-center",
        "bg-blue-500",
        "text-white",
        "text-sm",
        "font-medium",
        "px-3",
        "py-1",
        "rounded-full",
        "mr-2",
        "shadow-md"
    );
    tag.textContent = facilityObject.name;

    const removeButton = document.createElement("button");
    removeButton.type = "button";
    removeButton.classList.add(
        "ml-2",
        "text-white",
        "hover:text-gray-200",
        "focus:outline-none",
        "focus:ring",
        "focus:ring-gray-300"
    );
    removeButton.textContent = "x";
    removeButton.addEventListener("click", () => {
        selectedFacilities = selectedFacilities.filter(
            (f) => f.name !== facilityObject.name // Compare by name
        );
        tag.remove();
        updateFacilitiesInput();
    });

    tag.appendChild(removeButton);
    tagContainer.appendChild(tag);
    selectedFacilities.push(facilityObject); // Add the facility to the selected list
    updateFacilitiesInput();
}

function updateFacilitiesInput() {
    document.getElementById("hiddenFacilitiesInput").value =
        JSON.stringify(selectedFacilities);
}


// Image Drag & Drop Upload Feature
const dropzone = document.getElementById("dropzone");
const previewContainer = document.getElementById("previewContainer");

// Handle files from drag-and-drop or input selection
function handleFiles(files) {
    Array.from(files).forEach((file) => {
        if (file.type.startsWith("image/")) {
            const reader = new FileReader();

            reader.onload = (e) => {
                // Create a container div for each preview
                const previewDiv = document.createElement("div");
                previewDiv.classList.add(
                    "relative",
                    "w-full",
                    "h-32",
                    "rounded",
                    "shadow",
                    "overflow-hidden"
                );

                // Create the image element
                const img = document.createElement("img");
                img.src = e.target.result;
                img.alt = file.name;
                img.classList.add("w-full", "h-full", "object-cover");

                // Create the delete (cross) button
                const deleteButton = document.createElement("button");
                deleteButton.innerHTML = "&times;";
                deleteButton.classList.add(
                    "absolute",
                    "top-2",
                    "right-2",
                    "bg-gray-900",
                    "text-white",
                    "w-6",
                    "h-6",
                    "rounded-full",
                    "text-sm",
                    "flex",
                    "items-center",
                    "justify-center",
                    "hover:bg-gray-700",
                    "cursor-pointer"
                );

                // Attach delete functionality
                deleteButton.onclick = () => previewDiv.remove();

                // Append the image and delete button to the container
                previewDiv.appendChild(img);
                previewDiv.appendChild(deleteButton);

                // Append the container to the preview section
                previewContainer.appendChild(previewDiv);
            };

            reader.readAsDataURL(file);
        }
    });
}

// Drag-and-Drop Handlers
function handleDrop(event) {
    event.preventDefault();
    const { files } = event.dataTransfer;
    handleFiles(files);
}

function handleDragOver(event) {
    event.preventDefault();
}
