var SOM_block = document.getElementById('somOptionsBlock');
var validation_key = document.getElementById('validation_key');

SOM_block.style.display = 'none' ; // HIDE SOM INFORMATION



function launchSOMButtons() {
			if (SOM_block.style.display == "none") {
				SOM_block.style.display = 'block';
			} else {
				SOM_block.style.display = 'none';
			}
		}



function validateKey() {
	if (validation_key.value == 'hahaha') { // CHECK IF PASSWORD IS CORRECT
		//alert('Welcome ' + validation_key.value);
		launchSOMButtons();
	} else {
		//alert(validation_key.value);
		//SOM_block.innerHTML = 'Wrong Password!';
	}
}