/* Insert your javascript here */

let postCard = document.querySelector('div.post-card');
let front = document.querySelector('.front');
let back = document.querySelector('.back');

postCard.addEventListener('click', ()=> {
	if(front.classList.contains('front')){
		console.log('clicked');
		front.classList.remove('front');
		back.classList.remove('back');
		front.classList.add('turn-front');
		back.classList.add('turn-back');
	}else{
		console.log('unclicked');
		front.classList.remove('turn-front');
		back.classList.remove('turn-back');
		front.classList.add('front');
		back.classList.add('back');
	}

});
