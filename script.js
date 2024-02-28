document.getElementById('login-form').addEventListener('submit', function(event) {
    event.preventDefault();
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    
    // Add your authentication logic here
    // For simplicity, I'll just check if both fields are filled
    if (username && password) {
        // Authentication successful, show dashboard
        document.querySelector('.login-container').classList.add('hidden');
        document.querySelector('.dashboard-container').classList.remove('hidden');
    } else {
        alert('Please enter username and password.');
    }
});
