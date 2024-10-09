const ConfirmAction = (e, action) => {
	e = e || window.event;
	e.preventDefault();

	if (confirm(`Are you sure you want to ${action} this record?`)) {
		window.location.href = e.target.href;
	}
};
