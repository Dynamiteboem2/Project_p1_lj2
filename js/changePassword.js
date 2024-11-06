const buttonSubmitPassword = document.getElementById("changePasswordButton");

buttonSubmitPassword.addEventListener("click", (event) => {
	event.preventDefault();
	if (CheckPassword()) {
		RemoveErrorMessagePassword();

		document.getElementById("changePasswordForm").submit();
	} else {
		console.log("Change Profile Failed");
	}
});

let firstErrorPasswordPassword = false;

const CheckPassword = () => {
	firstErrorPassword = false;
	let currentPassword = document.getElementById("currentPassword").value;
	let newPassword = document.getElementById("newPassword").value;
	let confirmPassword = document.getElementById("confirmPassword").value;

	let error = false;

	if (currentPassword == "") {
		error = true;

		if (!firstErrorPassword) {
			firstErrorPassword = true;
			document.getElementById("currentPassword").focus();
			CreateErrorMessagePassword("Huidig wachtwoord is verplicht");
		}
	}

	if (newPassword == "") {
		error = true;

		if (!firstErrorPassword) {
			firstErrorPassword = true;
			document.getElementById("newPassword").focus();
			CreateErrorMessagePassword("Nieuw wachtwoord is verplicht");
		}
	}

	if (confirmPassword == "") {
		error = true;

		if (!firstErrorPassword) {
			firstErrorPassword = true;
			document.getElementById("confirmPassword").focus();
			CreateErrorMessagePassword("Bevestig wachtwoord is verplicht");
		}
	}

	if (newPassword != confirmPassword) {
		error = true;

		if (!firstErrorPassword) {
			firstErrorPassword = true;
			document.getElementById("confirmPassword").focus();
			CreateErrorMessagePassword("Wachtwoorden komen niet overeen");
		}
	}

	if (!CheckLengthPassword(newPassword, 5)) {
		error = true;

		if (!firstErrorPassword) {
			firstErrorPassword = true;
			document.getElementById("newPassword").focus();
			CreateErrorMessagePassword("Wachtwoord moet minimaal 5 tekens bevatten");
		}
	}

	if (error) {
		console.log("Error");
		return false;
	} else {
		console.log("No error");
		return true;
	}
};

const CreateErrorMessagePassword = (message) => {
	let anotherError = document.querySelector(".error");
	if (anotherError) anotherError.remove();

	let errorBox = document.querySelector("#error-placeholder-password");
	if (errorBox != null) errorBox.innerHTML = "";
	let errorElement = document.createElement("p");
	errorElement.innerHTML = message;
	errorElement.classList.add("error");
	errorBox.appendChild(errorElement);
};

const RemoveErrorMessagePassword = () => {
	let errorBox = document.querySelector("#error-placeholder-password");
	if (errorBox != null) errorBox.innerHTML = "";
};

const CheckLengthPassword = (input, length) => {
	if (input.length >= length) {
		return true;
	} else {
		return false;
	}
};

window.addEventListener("load", () => {
	RemoveErrorMessagePassword();

	window.history.replaceState({}, document.title, window.location.pathname);
});
