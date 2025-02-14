async function toggleUserStatus(button) {
    let userId = button.getAttribute("data-id");
    let currentStatus = button.getAttribute("data-status");
    let newStatus = (currentStatus === "active") ? "banned" : "active";

    try {
        const formData = new FormData();
        formData.append("user_id", userId);
        formData.append("action", currentStatus === "active" ? "ban" : "unban");

        const response = await fetch("App/Controllers/AdminController.php", {
            method: "POST",
            body: formData
        });

        const data = await response.text();
        console.log("Server Response:", data);

        button.setAttribute("data-status", newStatus);
        button.textContent = newStatus === "active" ? "Ban" : "Unban";

        let statusCell = document.querySelector(`.status-cell[data-id="${userId}"]`);
        if (statusCell) {
            statusCell.textContent = newStatus;
            statusCell.className = `status-cell ${newStatus.toLowerCase()}`;
        }

        // Optionally refresh the page to show updated data
        // location.reload();

    } catch (error) {
        console.error("Error:", error);
        alert("An error occurred while updating status");
    }
}