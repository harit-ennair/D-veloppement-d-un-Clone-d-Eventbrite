document.addEventListener("DOMContentLoaded", function () {
    const addCategoryForm = document.getElementById("catForm");
    const categoryList = document.getElementById("tbody");

    if (addCategoryForm) {
        addCategoryForm.addEventListener("submit", async function (e) {
            e.preventDefault();
            const categoryName = document.getElementById("catName").value;

            const formData = new FormData();
            formData.append("name", categoryName);
            formData.append("action", "addCategory");

            try {
                const response = await fetch("/App/Controllers/CategoryController.php", {
                    method: "POST",
                    body: formData,
                });

                const data = await response.json();

                if (data.success) {
                    showAlert("success", "Category added successfully!");
                    addCategoryForm.reset();
                    loadCategories();
                } else {
                    showAlert("error", data.message || "Error adding category");
                }
            } catch (error) {
                showAlert("error", "An error occurred");
                console.error("Error:", error);
            }
        });
    }

    async function updateCategory(id, name) {
        const newName = prompt("Enter new category name:", name);
        if (newName) {
            const formData = new FormData();
            formData.append("id", id);
            formData.append("name", newName);
            formData.append("action", "updateCategory");

            try {
                const response = await fetch("/App/Controllers/CategoryController.php", {
                    method: "POST",
                    body: formData,
                });

                const data = await response.json();

                if (data.success) {
                    showAlert("success", "Category updated successfully!");
                    loadCategories();
                } else {
                    showAlert("error", data.message || "Error updating category");
                }
            } catch (error) {
                showAlert("error", "An error occurred");
                console.error("Error:", error);
            }
        }
    }

    async function deleteCategory(id) {
        if (confirm("Are you sure you want to delete this category?")) {
            const formData = new FormData();
            formData.append("id", id);
            formData.append("action", "deleteCategory");

            try {
                const response = await fetch("/App/Controllers/CategoryController.php", {
                    method: "POST",
                    body: formData,
                });

                const data = await response.json();

                if (data.success) {
                    showAlert("success", "Category deleted successfully!");
                    loadCategories();
                } else {
                    showAlert("error", data.message || "Error deleting category");
                }
            } catch (error) {
                showAlert("error", "An error occurred");
                console.error("Error:", error);
            }
        }
    }

    async function loadCategories() {
        try {
            const response = await fetch("/App/Controllers/CategoryController.php?action=getCategories");
            const data = await response.json();

            categoryList.replaceChildren();

            data.forEach((category) => {
                const row = document.createElement("tr");

                const nameCell = document.createElement("td");
                nameCell.textContent = category.name;

                const actionCell = document.createElement("td");
                actionCell.className = "space-x-2"; 

                const editButton = document.createElement("button");
                editButton.textContent = "Edit";
                editButton.onclick = () => updateCategory(category.id, category.name);
                editButton.className = "bg-blue-500 text-white px-3 py-1 rounded-lg hover:bg-blue-700 transition duration-300 shadow-md cursor-pointer";

                const deleteButton = document.createElement("button");
                deleteButton.textContent = "Delete";
                deleteButton.onclick = () => deleteCategory(category.id);
                deleteButton.className = "bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-700 transition duration-300 shadow-md cursor-pointer";

                actionCell.appendChild(editButton);
                actionCell.appendChild(deleteButton);

                row.appendChild(nameCell);
                row.appendChild(actionCell);
                categoryList.appendChild(row);
            });
        } catch (error) {
            console.error("Error:", error);
            showAlert("error", "Error loading categories");
        }
    }

    function showAlert(type, message) {
        const alertDiv = document.createElement("div");
        alertDiv.className = `fixed top-4 right-4 p-4 rounded-lg text-white opacity-0 transition-opacity duration-500 ${
            type === "success" ? "bg-green-500" : "bg-red-500"
        }`;
        alertDiv.textContent = message;
        document.body.appendChild(alertDiv);

        setTimeout(() => {
            alertDiv.classList.add("opacity-100"); 
        }, 50);

        setTimeout(() => {
            alertDiv.classList.remove("opacity-100");
            setTimeout(() => alertDiv.remove(), 500);
        }, 3000);
    }

    loadCategories();
    window.updateCategory = updateCategory;
    window.deleteCategory = deleteCategory;
});
