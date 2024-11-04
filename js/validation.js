document.getElementById('payment-form').addEventListener('submit', function(event) {
    event.preventDefault(); 

    const formData = new FormData(this);
    const xhr = new XMLHttpRequest();
    xhr.open('POST', this.action, true);

    xhr.onload = function() {
        if (xhr.status === 200) {
            console.log('Hello');
            console.log(xhr);
            console.log(xhr.responseText);
            const response = JSON.parse(xhr.responseText);
            console.log(response);
            document.querySelectorAll('.error-message').forEach(div => div.innerHTML = '');

            if (response.success === false) {
                for (const [key, message] of Object.entries(response.errors)) {
                    const errorDiv = document.getElementById('error-' + key);
                    if (errorDiv) {
                        errorDiv.innerHTML = message; 
                    }
                }
            } else {
                window.location.href = "../pages/stand.php?message=Stand succesvol gehuurt!";
            }
        } else {
            alert("er is iets fout gegaan");
        }
    };

    xhr.send(formData);
});

// error message gaat weg
document.querySelectorAll('#payment-form input, #payment-form select').forEach(input => {
    input.addEventListener('input', function() {
        const errorDiv = document.getElementById('error-' + this.name);
        if (errorDiv) {
            errorDiv.innerHTML = ''; 
        }
    });
});

