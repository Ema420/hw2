function openNav(){
    const current = document.getElementById('modale')
    current.classList.add('modale');
    document.getElementById('popup').classList.remove('hide');
    document.getElementById('popup').classList.add('popup');
    const navButton = document.querySelectorAll('.hideButton');
    for (button of navButton){
        button.classList.remove('hideButton');
        button.classList.add('mostra');
    }
    document.body.classList.add('no-scroll');

	window.addEventListener('click',closeNav);

}
function closeNav(event){
	if(event.keyCode == 27 || event.target.className == 'modale'){
        document.getElementById('modale').classList.remove('modale');
        document.getElementById('modale').classList.add('hide');
        document.getElementById('popup').classList.remove('popup')
        document.getElementById('popup').classList.add('hide')

        document.body.classList.remove('no-scroll');
    }

}