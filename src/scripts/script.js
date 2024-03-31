document.getElementById('createAccountButton').addEventListener('click', function() {
    document.getElementById('logForm').style.display = 'none';
    document.getElementById('signForm').style.display = 'block';
});

document.getElementById('loginButton').addEventListener('click', function() {
    document.getElementById('logForm').style.display = 'block';
    document.getElementById('signForm').style.display = 'none';
});