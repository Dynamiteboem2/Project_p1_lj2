// If there is a query message or error, remove it after 5 seconds
// if (window.location.search) {
// 	setTimeout(() => {
// 		window.history.replaceState(null, null, window.location.pathname);
// 	}, 5000);
// }

// This is not working the page is not refreshing
// This is the correct way to do it
if (window.location.search) {
	setTimeout(() => {
		window.location.href = window.location.pathname;
	}, 2500);
}
