document.getElementById('btn_on_session').addEventListener('click', session);
document.getElementById('btn_on_register').addEventListener('click', register);
window.addEventListener('resize', resize_width);

var container_login_register = document.querySelector(
	'.container_login-register'
);
var form_login = document.querySelector('.form_login');
var form_register = document.querySelector('.form_register');
var bg_box_login = document.querySelector('.bg_box_login');
var bg_box_register = document.querySelector('.bg_box_register');

function resize_width() {
	if (window.innerWidth > 850) {
		bg_box_login.style.display = 'block';
		bg_box_register.style.display = 'block';
	} else {
		bg_box_register.style.display = 'block';
		bg_box_register.style.opacity = '1';
		bg_box_login.style.display = 'none';
		form_login.style.display = 'block';
		form_register.style.display = 'none';
		container_login_register.style.left = '0px';
	}
}

resize_width();

function session() {
	if (window.innerWidth > 850) {
		form_register.style.display = 'none';
		container_login_register.style.left = '10px';
		form_login.style.display = 'block';
		bg_box_register.style.opacity = '1';
		bg_box_login.style.opacity = '0';
	} else {
		form_register.style.display = 'none';
		container_login_register.style.left = '0px';
		form_login.style.display = 'block';
		bg_box_register.style.display = 'block';
		bg_box_login.style.display = 'none';
		bg_box_login.style.opacity = '0';
	}
}

function register() {
	if (window.innerWidth > 850) {
		form_register.style.display = 'block';
		container_login_register.style.left = '410px';
		form_login.style.display = 'none';
		bg_box_register.style.opacity = '0';
		bg_box_login.style.opacity = '1';
	} else {
		form_register.style.display = 'block';
		container_login_register.style.left = '0px';
		form_login.style.display = 'none';
		bg_box_register.style.display = 'none';
		bg_box_login.style.display = 'block';
		bg_box_login.style.opacity = '1';
	}
}
