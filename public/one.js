// Handle Login form display
function showLoginForm() {
    document.getElementById('hero').style.display = 'none';
    document.getElementById('login-form').style.display = 'block';
}

// Handle OTP verification display
function sendOtp() {
    document.getElementById('login-form').style.display = 'none';
    document.getElementById('otp-form').style.display = 'block';
}

// Verify OTP (this is just a simulation)
function verifyOtp() {
    alert('OTP Verified Successfully!');
    document.getElementById('otp-form').style.display = 'none';
    document.getElementById('hero').style.display = 'block';
}



// login

// const loginButton = document.getElementById('loginButton');
//         const loginModal = document.getElementById('loginModal');
//         const modalOverlay = document.getElementById('modalOverlay');
//         const closeModal = document.getElementById('closeModal');

        // Open modal
        // loginButton.addEventListener('click', () => {
        //     loginModal.classList.add('active');
        //     modalOverlay.classList.add('active');
        // });

        // Close modal
        // closeModal.addEventListener('click', () => {
        //     loginModal.classList.remove('active');
        //     modalOverlay.classList.remove('active');
        // });

        // Close modal when clicking outside
        // modalOverlay.addEventListener('click', () => {
        //     loginModal.classList.remove('active');
        //     modalOverlay.classList.remove('active');
        // });

        const openLogin = document.getElementById('openLogin');
        const closeLogin = document.getElementById('closeLogin');
        const backButtonUser = document.getElementById('backButtonUser');
        const backButtonOrg = document.getElementById('backButtonOrg');
        const loginInterface = document.getElementById('loginInterface');
        const userForm = document.getElementById('userForm');
        const orgForm = document.getElementById('orgForm');
        const loginOptions = document.getElementById('loginOptions');

        // Show login interface
        openLogin.addEventListener('click', () => {
            loginInterface.classList.add('active');
        });

        // Hide login interface
        closeLogin.addEventListener('click', () => {
            loginInterface.classList.remove('active');
            resetForms();
        });

        // Show User Form
        document.getElementById('userLogin').addEventListener('click', () => {
            loginOptions.classList.add('hidden');
            userForm.classList.remove('hidden');
        });

        // Show Organization Form
        document.getElementById('orgLogin').addEventListener('click', () => {
            loginOptions.classList.add('hidden');
            orgForm.classList.remove('hidden');
        });

        // Back Button Logic for User Form
        backButtonUser.addEventListener('click', () => {
            loginOptions.classList.remove('hidden');
            userForm.classList.add('hidden');
        });

        // Back Button Logic for Organization Form
        backButtonOrg.addEventListener('click', () => {
            loginOptions.classList.remove('hidden');
            orgForm.classList.add('hidden');
        });

        // Reset forms
        function resetForms() {
            loginOptions.classList.remove('hidden');
            userForm.classList.add('hidden');
            orgForm.classList.add('hidden');
        }

        // Submit Login
        function submitLogin(role) {
            const identifier = role === "user"
                ? document.getElementById('citizenship').value
                : document.getElementById('pan').value;
            const phone = role === "user"
                ? document.getElementById('phone').value
                : document.getElementById('orgPhone').value;

            // Example POST request
            fetch('http://localhost:3000/login', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ role, identifier, phone })
            })
                .then(response => {
                    if (!response.ok) throw new Error("Login failed");
                    return response.json();
                })
                .then(data => {
                    alert(data.message);
                    // Redirect to main page
                    window.location.href = "/main.html";
                })
                .catch(err => alert(err.message));
        }