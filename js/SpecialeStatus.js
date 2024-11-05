const addInputs = document.querySelectorAll(".addInput");
const maxInput = 3;
let currentInputs = 0;

addInputs.forEach((addInput) => {
	addInput.addEventListener("click", (e) => {
		e.preventDefault();
		if (currentInputs >= maxInput) return;

		const newInputDiv = document.createElement("div");
		newInputDiv.classList.add("newInput");

		const deleteButton = document.createElement("button");
		deleteButton.classList.add("deleteInput");
		deleteButton.innerHTML = '<i class="fa-solid fa-trash"></i>';

		const newInput = document.createElement("input");
		newInput.type = "text";

		newInputDiv.appendChild(newInput);
		newInputDiv.appendChild(deleteButton);

		deleteButton.addEventListener("click", () => {
			currentInputs--;
			deleteButton.parentElement.remove();
		});

		addInput.parentElement.querySelector(".inputs").appendChild(newInputDiv);
		currentInputs++;

		if (currentInputs >= maxInput) addInput.classList.add("disabled");
		else addInput.classList.remove("disabled");
	});
});

document.querySelectorAll("textarea").forEach(function (textarea) {
	textarea.style.height = textarea.scrollHeight + "px";
	textarea.style.overflowY = "hidden";

	textarea.addEventListener("input", function () {
		this.style.height = "auto";
		this.style.height = this.scrollHeight + "px";
	});
});
