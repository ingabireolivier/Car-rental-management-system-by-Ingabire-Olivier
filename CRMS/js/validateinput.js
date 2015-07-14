function checkNumber(textBox)
{
	while (textBox.value.length > 0 && isNaN(textBox.value)) {
		textBox.value = textBox.value.substring(0, textBox.value.length - 1)
	}
	textBox.value = trim(textBox.value);
}
//
function checkText(textBox)
{
	var alphaExp = /^[a-zA-Z]+$/;
	while (textBox.value.length > 0 && !textBox.value.match(alphaExp)) {
		textBox.value = textBox.value.substring(0, textBox.value.length - 1)
	}
	textBox.value = trim(textBox.value);
}