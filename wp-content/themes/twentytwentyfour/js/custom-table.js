function removeItem(id) {
	console.log("Id:" + id);
	fetch('/wp-content/themes/twentytwentyfour/php/remove_item.php', {
		method: 'POST',
		headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		body: `id=${id}`
	})
	.then(res => res.json())
	.then(data => {
		if (data.success) {
			alert('Элемент был удалён.');
			location.reload();
		} else {
			alert(data.message);
		}
	});
}

function addItem() {
	const username = prompt("Введите логин");
	const name = prompt("Введите имя");
	const profession = prompt("Введите профессию");

	fetch('/wp-content/themes/twentytwentyfour/php/add_item.php', {
		method: 'POST',
		headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		body: `username=${encodeURIComponent(username)}&name=${encodeURIComponent(name)}&profession=${encodeURIComponent(profession)}`
	})
	.then(res => res.json())
	.then(data => {
		if (data.success) {
			alert('Элемент добавлен.');
			location.reload();
		} else {
			alert(data.message);
		}
	});
}

// https://myblog.net/wp-content/themes/twentytwentyfour/php/add_item.php
// https://myblog.net/wp-content/themes/twentytwentyfour/php/remove_item.php

console.log("Loaded!");