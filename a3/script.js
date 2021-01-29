/* Insert your javascript here */

let postCard = document.querySelector('div.post-card');
let front = document.querySelector('.front');
let back = document.querySelector('.back');

let letter = document.querySelector('div.letter');
let envelope = document.querySelector('.envelope');

postCard.addEventListener('click', ()=> {
	if(front.classList.contains('front')){
		console.log('clicked post card');
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

letter.addEventListener('click', ()=> {
	if(envelope.classList.contains('envelope')){
		console.log('clicked letter');
		envelope.classList.remove('envelope');
		envelope.classList.add('envelope-remove');
	}else{
		console.log('unclicked');
		envelope.classList.remove('envelope-remove');
		envelope.classList.add('envelope');
	}

});
