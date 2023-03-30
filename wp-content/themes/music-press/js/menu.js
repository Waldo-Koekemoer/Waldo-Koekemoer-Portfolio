// Check if has header image
const rpMenu = document.getElementById("masthead");

if((!rpMenu) || (rpMenu && menuObject.menu_position_abs == true )) {
	let rpElement = document.getElementById("menu-top");
	rpElement.classList.add("rp-menu");
}
