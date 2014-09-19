function pop()
{
	var pop = document.getElementById('pop');
	if (pop) {pop.style.display = 'block';};
	if (pop) {pop.onclick = function() {this.style.display = 'none';};};
}

window.onload = pop;