const buttonSubmit = document.getElementById("submitButton");

buttonSubmit.addEventListener("click", (event) => {
	event.preventDefault();
	if (CheckRegister()) {
		console.log("Register successful");
		RemoveErrorMessage();

		document.getElementById("register_form").submit();
	} else {
		console.log("Register failed");
	}
});

let firstError = false;

const CheckRegister = () => {
	firstError = false;
	let firstName = document.getElementById("first_name").value;
	let infixName = document.getElementById("infix_name").value;
	let lastName = document.getElementById("last_name").value;
	let email = document.getElementById("email").value;
	let password = document.getElementById("password").value;
	let confirmPassword = document.getElementById("confirm_password").value;
	let birthDate = document.getElementById("birthdate").value;

	let error = false;

	if (firstName == "") {
		error = true;
		AnimateError("first_name");

		if (!firstError) {
			firstError = true;
			document.getElementById("first_name").focus();
			CreateErrorMessage("Voornaam is verplicht");
		}
	}

	if (!CheckOnlyLetters(firstName)) {
		error = true;
		AnimateError("first_name");

		if (!firstError) {
			firstError = true;
			document.getElementById("first_name").focus();
			CreateErrorMessage("Voornaam mag alleen letters bevatten");
		}
	}

	if (!CheckOnlyLetters(infixName)) {
		error = true;
		AnimateError("infix_name");

		if (!firstError) {
			firstError = true;
			document.getElementById("infix_name").focus();
			CreateErrorMessage("Tussenvoegsel mag alleen letters bevatten");
		}
	}

	if (lastName == "") {
		error = true;
		AnimateError("last_name");

		if (!firstError) {
			firstError = true;
			document.getElementById("last_name").focus();
			CreateErrorMessage("Achternaam is verplicht");
		}
	}

	if (!CheckOnlyLetters(lastName)) {
		error = true;
		AnimateError("last_name");

		if (!firstError) {
			firstError = true;
			document.getElementById("last_name").focus();
			CreateErrorMessage("Achternaam mag alleen letters bevatten");
		}
	}

	if (email == "") {
		error = true;
		AnimateError("email");

		if (!firstError) {
			firstError = true;
			document.getElementById("email").focus();
			CreateErrorMessage("Email is verplicht");
		}
	}

	if (!CheckEmail(email)) {
		error = true;
		AnimateError("email");

		if (!firstError) {
			firstError = true;
			document.getElementById("email").focus();
			CreateErrorMessage("Email is niet geldig");
		}
	}

	if (password == "") {
		error = true;
		AnimateError("password");

		if (!firstError) {
			firstError = true;
			document.getElementById("password").focus();
			CreateErrorMessage("Watchwoord is verplicht");
		}
	}

	if (!CheckLength(password, 5)) {
		error = true;
		AnimateError("password");

		if (!firstError) {
			firstError = true;
			document.getElementById("password").focus();
			CreateErrorMessage("Wachtwoord moet minimaal 5 tekens bevatten");
		}
	}

	if (confirmPassword == "") {
		error = true;
		AnimateError("confirm_password");

		if (!firstError) {
			firstError = true;
			document.getElementById("confirm_password").focus();
			CreateErrorMessage("Bevestig wachtwoord is verplicht");
		}
	}

	if (password != confirmPassword) {
		error = true;
		AnimateError("confirm_password");

		if (!firstError) {
			firstError = true;
			document.getElementById("confirm_password").focus();
			CreateErrorMessage("Wachtwoorden komen niet overeen");
		}
	}

	if (birthDate == "") {
		error = true;
		AnimateError("birthdate");

		if (!firstError) {
			firstError = true;
			document.getElementById("birthdate").focus();
			CreateErrorMessage("Geboortedatum is verplicht");
		}
	}

	let today = new Date();
	let birth = new Date(birthDate);
	let age = today.getFullYear() - birth.getFullYear();

	if (age < 13) {
		error = true;
		AnimateError("birthdate");

		if (!firstError) {
			firstError = true;
			document.getElementById("birthdate").focus();
			CreateErrorMessage("Je moet minimaal 13 jaar oud zijn");
		}
	}

	if (age > 100) {
		error = true;
		AnimateError("birthdate");

		if (!firstError) {
			firstError = true;
			document.getElementById("birthdate").focus();
			CreateErrorMessage("Vul alstublieft een geldige geboortedatum in");
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

const AnimateError = (element) => {
	let elementToAnimate = document.getElementById(element);
	elementToAnimate.classList.add("input-error");
	setTimeout(() => {
		elementToAnimate.classList.remove("input-error");
	}, 800);
};

const CreateErrorMessage = (message) => {
	let anotherError = document.querySelector(".error");
	if (anotherError) anotherError.remove();

	let errorBox = document.querySelector("#error-placeholder");
	if (errorBox != null) errorBox.innerHTML = "";
	let errorElement = document.createElement("p");
	errorElement.innerHTML = message;
	errorElement.classList.add("error");
	errorBox.appendChild(errorElement);
};

const RemoveErrorMessage = () => {
	let errorBox = document.querySelector("#error-placeholder");
	if (errorBox != null) errorBox.innerHTML = "";
};

const CheckOnlyLetters = (input) => {
	// Can also empty
	let regex = /^[a-zA-Z\s]*$/;

	if (regex.test(input)) {
		return true;
	} else {
		return false;
	}
};

const CheckEmail = (email) => {
	let regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

	if (regex.test(email)) {
		return true;
	} else {
		return false;
	}
};

const CheckLength = (input, length) => {
	if (input.length >= length) {
		return true;
	} else {
		return false;
	}
};

window.addEventListener("load", () => {
	RemoveErrorMessage();

	window.history.replaceState({}, document.title, window.location.pathname);
});
