var btnAbrirInst = document.getElementById('btn-abrir-inst'),
	overlay1 = document.getElementById('overlay1'),
	popup1 = document.getElementById('popup1'),
	btnCancelar = document.getElementById('btn-cancelar'),
	btnAbrirEnt = document.getElementById('btn-abrir-ent');


btnAbrirInst.addEventListener('click', function(){
	overlay1.classList.add('active');
	popup1.classList.add('active');
});