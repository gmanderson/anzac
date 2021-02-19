let correspondence = document.querySelectorAll(".correspondence");
let front = document.querySelectorAll(".front");
let back = document.querySelectorAll(".back");

for(let i=0; i<correspondence.length; i++){
	
	correspondence[i].addEventListener('click', function(){
		
		if(front[i].classList.contains('front')){
			console.log('clicked leter');
			front[i].classList.remove('front');
			back[i].classList.remove('back');
			front[i].classList.add('turn-front');
			back[i].classList.add('turn-back');
		}else{
			console.log('unclicked');
			front[i].classList.remove('turn-front');
			back[i].classList.remove('turn-back');
			front[i].classList.add('front');
			back[i].classList.add('back');
		}
	});
	
}


// CONTACT PAGE
let remember = document.querySelector("#remember-me");

remember.addEventListener('click', function(){
	if (remember.checked === true){
		localStorage.setItem('name', document.querySelector('#name').value)
		localStorage.setItem('email', document.querySelector('#email').value)
		localStorage.setItem('mobile', document.querySelector('#mobile').value)
		localStorage.setItem('remember', 'true')
		console.log(localStorage.name)
		console.log(localStorage.remember)
	}
	
	if (remember.checked !== true){
		localStorage.removeItem('remember')
		localStorage.removeItem('name')
		localStorage.removeItem('email')
		localStorage.removeItem('mobile')
	}
	
})

if(localStorage.remember == 'true'){
	console.log('its true')
	document.querySelector('#name').value = localStorage.name
	document.querySelector('#email').value = localStorage.email
	document.querySelector('#mobile').value = localStorage.mobile
	remember.checked = localStorage.remember
	console.log(remember.value)
}