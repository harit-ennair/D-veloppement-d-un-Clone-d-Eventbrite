async function updateEventStatus(eventId, newStatus) {
    try {
        const formData = new FormData();
        formData.append('id', eventId);
        formData.append('status', newStatus);

        const response = await fetch('App/Controllers/AdminController.php', {
            method: 'POST',
            body: formData
        });

        const result = await response.text();
        
        if (result === 'success') {
            const successMessage = document.createElement('div');
            successMessage.className = 'fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded shadow-lg';
            successMessage.textContent = 'Status updated successfully';
            document.body.appendChild(successMessage);
            
            setTimeout(() => {
                successMessage.remove();
            }, 3000);
        } else {
            alert('Failed to update status: ' + result);
        }
    } catch (error) {
        console.error('Error updating status:', error);
        alert('Error updating status. Please try again.');
    }
}

document.addEventListener('DOMContentLoaded', () => {
    const statusSelects = document.querySelectorAll('select[data-id]');
    
    statusSelects.forEach(select => {
        select.addEventListener('change', async (e) => {
            const eventId = select.dataset.id;
            const newStatus = select.value;
            
            if (confirm(`Are you sure you want to change the status to ${newStatus}?`)) {
                await updateEventStatus(eventId, newStatus);
            } else {
                select.value = select.dataset.previousValue;
            }
        });
        
        select.dataset.previousValue = select.value;
    });
});