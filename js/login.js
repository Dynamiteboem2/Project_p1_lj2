const buttonSubmit = document.getElementById("submitButton");

buttonSubmit.addEventListener("click", (event) => {
	event.preventDefault();
	if (CheckLogin()) {
		console.log("Login successful");
		RemoveErrorMessage();

		document.getElementById("login_form").submit();
	} else {
		console.log("Login failed");
	}
});

let firstError = false;

const CheckLogin = () => {
	firstError = false;
	let email = document.getElementById("email").value;
	let password = document.getElementById("password").value;

	let error = false;

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
	errorBox.innerHTML = "";
	let errorElement = document.createElement("p");
	errorElement.innerHTML = message;
	errorElement.classList.add("error");
	errorBox.appendChild(errorElement);
};

const RemoveErrorMessage = () => {
	let errorBox = document.querySelector("#error-placeholder");
	errorBox.innerHTML = "";
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
