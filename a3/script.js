let correspondence = document.querySelectorAll(".correspondence");
let front = document.querySelectorAll(".front");
let back = document.querySelectorAll(".back");

for(let i=0; i<correspondence.length; i++){
	
	correspondence[i].addEventListener('click', function(){
		
		if(front[i].classList.contains('front')){
			console.log('clicked letter');
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
