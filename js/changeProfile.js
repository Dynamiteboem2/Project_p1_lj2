const buttonSubmit = document.getElementById("changeProfileButton");

buttonSubmit.addEventListener("click", (event) => {
	event.preventDefault();
	if (CheckProfile()) {
		RemoveErrorMessage();

		document.getElementById("changeProfileForm").submit();
	} else {
		console.log("Change Profile Failed");
	}
});

let firstError = false;

const CheckProfile = () => {
	firstError = false;
	let firstName = document.getElementById("firstName").value;
	let infixName = document.getElementById("infixName").value;
	let lastName = document.getElementById("lastName").value;

	let error = false;

	if (firstName == "") {
		error = true;

		if (!firstError) {
			firstError = true;
			document.getElementById("firstName").focus();
			CreateErrorMessage("Voornaam is verplicht");
		}
	}

	if (!CheckOnlyLetters(firstName)) {
		error = true;

		if (!firstError) {
			firstError = true;
			document.getElementById("firstName").focus();
			CreateErrorMessage("Voornaam mag alleen letters bevatten");
		}
	}

	if (!CheckOnlyLetters(infixName)) {
		error = true;

		if (!firstError) {
			firstError = true;
			document.getElementById("infixName").focus();
			CreateErrorMessage("Tussenvoegsel mag alleen letters bevatten");
		}
	}

	if (lastName == "") {
		error = true;

		if (!firstError) {
			firstError = true;
			document.getElementById("lastName").focus();
			CreateErrorMessage("Achternaam is verplicht");
		}
	}

	if (!CheckOnlyLetters(lastName)) {
		error = true;

		if (!firstError) {
			firstError = true;
			document.getElementById("lastName").focus();
			CreateErrorMessage("Achternaam mag alleen letters bevatten");
		}
	}

	if (CheckLength(firstName, 100)) {
		error = true;

		if (!firstError) {
			firstError = true;
			document.getElementById("firstName").focus();
			CreateErrorMessage("Voornaam mag niet langer zijn dan 100 karakters");
		}
	}

	if (CheckLength(infixName, 100)) {
		error = true;

		if (!firstError) {
			firstError = true;
			document.getElementById("infixName").focus();
			CreateErrorMessage(
				"Tussenvoegsel mag niet langer zijn dan 100 karakters"
			);
		}
	}

	if (CheckLength(lastName, 100)) {
		error = true;

		if (!firstError) {
			firstError = true;
			document.getElementById("lastName").focus();
			CreateErrorMessage("Achternaam mag niet langer zijn dan 100 karakters");
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
