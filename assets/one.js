// Submit user form
document.getElementById('userSubmit').addEventListener('click', function() {
    const citizenship = document.getElementById('citizenship').value;
    const phone = document.getElementById('phone').value;

    fetch('/assets/login.php', {  // Correct file path based on your folder structure
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ type: 'user', citizenship, phone })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = 'user-dashboard.html';  // Redirect to user dashboard
        } else {
            alert('Invalid credentials');
        }
    });
}); 
// Submit organization form
document.getElementById('orgSubmit').addEventListener('click', function() {
    const pan = document.getElementById('pan').value;
    const phone = document.getElementById('orgPhone').value;

    // Send a request to the server to validate organization
    fetch('/login.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ type: 'organization', pan, phone })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = 'org-dashboard.html';  // Redirect to organization dashboard
        } else {
            alert('Invalid credentials');
        }
    });
});
