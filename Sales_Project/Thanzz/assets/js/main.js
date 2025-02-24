// Dynamic data fetching for dashboards
document.addEventListener('DOMContentLoaded', () => {
    const dashboard = document.getElementById('dashboard');
    if (dashboard) {
        fetch('../ajax/fetch_dashboard.php')
            .then(response => response.json())
            .then(data => {
                for (const key in data) {
                    const element = document.getElementById(key);
                    if (element) {
                        element.textContent = data[key];
                    }
                }
            })
            .catch(error => console.error('Error fetching dashboard data:', error));
    }

    // Invoice form submission
    const invoiceForm = document.getElementById('invoiceForm');
    if (invoiceForm) {
        invoiceForm.addEventListener('submit', event => {
            event.preventDefault();
            const formData = new FormData(invoiceForm);

            fetch('../ajax/add_invoice.php', {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Invoice submitted successfully!');
                        invoiceForm.reset();
                    } else {
                        alert('Error submitting invoice: ' + data.error);
                    }
                })
                .catch(error => console.error('Error submitting invoice:', error));
        });
    }
});
