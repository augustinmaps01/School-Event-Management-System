/*-------------------*/
/*Clock Functionality*/

//Selectors
const numSecond_Digit1 = document.querySelectorAll('.num-second .digit1')[0];
const numSecond_Digit2 = document.querySelectorAll('.num-second .digit2')[0];
const numSecondArray = [numSecond_Digit1, numSecond_Digit2];

const numMinute_Digit1 = document.querySelectorAll('.num-minute .digit1')[0];
const numMinute_Digit2 = document.querySelectorAll('.num-minute .digit2')[0];
const numMinuteArray = [numMinute_Digit1, numMinute_Digit2];

const numHour_Digit1 = document.querySelectorAll('.num-hour .digit1')[0];
const numHour_Digit2 = document.querySelectorAll('.num-hour .digit2')[0];
const numHourArray = [numHour_Digit1, numHour_Digit2];



const toggleHour = document.getElementsByClassName('toggle-12-24')[0];
const ampm = document.getElementsByClassName('ampm')[0];

timer();
setInterval(timer, 1000);

function timer(){

	const now = new Date();

	//Get seconds, minute, an hours from Date.
	const seconds = now.getSeconds(),
	      minutes = now.getMinutes(),
	      hours = now.getHours();

	//Make hours either 12 or 24 hour format
	let hours_12;
	if(toggleHour.checked){
		hours_12 = hours; //Make 24 hour format
	} else {
		hours_12 = hours % 12 || 12; //Make hours 12 hour format
	}

	//Run timer function again to refresh hour format immediately
	toggleHour.onclick = function(){
		timer();
	}


	//Make the values always double-digit
	let secondsDbl = ("0" + seconds).slice(-2),
	    minutesDbl = ("0" + minutes).slice(-2),
	    hoursDbl   = ("0" + hours_12).slice(-2);

	//Seperate the two digits of each into an array
	const secondsOutput = [],
	      stringNumberSeconds = secondsDbl.toString();

	const minutesOutput = [],
	      stringNumberMinutes = minutesDbl.toString();

	const hoursOutput = [],
	      stringNumberHours = hoursDbl.toString();

	for (i = 0; i < 2; i++){
		secondsOutput.push(+stringNumberSeconds.charAt(i));
		minutesOutput.push(+stringNumberMinutes.charAt(i));
		hoursOutput.push(+stringNumberHours.charAt(i));
	}

	for(i = 0; i < 10; i++){

		//I may find a better way to do this later, but this works for now.
		for (j = 0; j < 2; j++){
			if (secondsOutput[j] == i){
				numSecondArray[j].classList.add('num'+i);
			} else {
				numSecondArray[j].classList.remove('num'+i);
			}

			if (minutesOutput[j] == i){
				numMinuteArray[j].classList.add('num'+i);
			} else {
				numMinuteArray[j].classList.remove('num'+i);
			}

			if (hoursOutput[j] == i){
				numHourArray[j].classList.add('num'+i);
			} else {
				numHourArray[j].classList.remove('num'+i);
			}
		}

	}


	//Decide when AM or PM should display.
	if(now.getHours() < 12){
		ampm.innerHTML = "AM";
	}else{
		ampm.innerHTML = "PM";
	}
	
}




/*----------------------*/
/*Toggle display seconds*/

//Selectors
const toggleSecond = document.getElementsByClassName('toggle-second')[0];
const secondsColon = document.getElementsByClassName('colon-second')[0];

function secondsToggle(){
	for(i = 0; i < 2; i++){
		if (toggleSecond.checked){
			numSecondArray[i].classList.remove('inactive');
			secondsColon.classList.remove('inactive');
		} else {
			numSecondArray[i].classList.add('inactive');
			secondsColon.classList.add('inactive');
		}
	}
};

setTimeout(secondsToggle, 50);

//Switch display styles depending on if checkbox is checked.
toggleSecond.onclick = function(){
	secondsToggle();
}