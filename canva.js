$(document).ready(function(){
    $('a').click(function(){
            $('html,body').animate(
            	{scrollTop: ($($(this).attr('href')).offset().top -180)},500);
    });
});
window.onload = function() {
		//Definitions
		var reactTime = 3000;
		var count = (reactTime/1000)-1;
		var interval, count_interval, show_interval, times = 0;
		var result, rightAns = "";
		var c = document.getElementById('canvas');
		var startImg = document.getElementById("startImg");
		var startbtn = document.getElementById("start_btn");
		var startBtn = document.getElementById("startBtn");
		var control = document.getElementById("control");
		var stop = document.getElementById("stop_btn");
		var endImg = document.getElementById("endImg");
		var restartbtn = document.getElementById("restart_btn");
		var restartBtn = document.getElementById("restartBtn");
		var time = document.getElementById("time");
		var score = document.getElementById("score");
		var answer = document.getElementById("answer");
		var test = document.getElementById("test");
		var scoreShow = document.getElementById("scoreShow");
		var ans = document.getElementsByClassName("other");
		const spid1 = ['s11','s12','s13','s14','s15','s16','s17','s18','s19','s110','s111','s112'];
		const spid2 = ['s21','s22','s23','s24','s25','s26','s27','s28','s29','s210','s211','s212'];	
		const aa = { 
			Glycine: { letter3: "Gly", letter1: "G", property: "non-polar" },
			Alanine: { letter3: "Ala", letter1: "A", property: "non-polar" },
			Valine: { letter3: "Val", letter1: "V", property: "non-polar" },
			Cysteine: { letter3: "Cys", letter1: "C", property: "non-polar" },
			Proline: { letter3: "Pro", letter1: "P", property: "non-polar" },
			Leucine: { letter3: "Leu", letter1: "L", property: "non-polar" },
			Isoleucine: { letter3: "Ile", letter1: "I", property: "non-polar" },
			Methionine: { letter3: "Met", letter1: "M", property: "non-polar" },
			Trptophan: { letter3: "Trp", letter1: "W", property: "non-polar" },
			Phenylalanine: { letter3: "Phe", letter1: "F", property: "non-polar" },
			Serine: { letter3: "Ser", letter1: "S", property: "polar" },
			Threonine: { letter3: "Thr", letter1: "T", property: "polar" },
			Tyrosine: { letter3: "Tyr", letter1: "Y", property: "polar" },
			Asparagine: { letter3: "Asn", letter1: "N", property: "polar" },
			Glutamine: { letter3: "Gln", letter1: "Q", property: "polar" },
			Lysine: { letter3: "Lys", letter1: "K", property: "positive charge" },
			Arginine: { letter3: "Arg", letter1: "R", property: "positive charge" },
			Histidine: { letter3: "His", letter1: "H", property: "positive charge" },
			Aspartic_acid: { letter3: "Asp", letter1: "D", property: "negative charge" },
			Glutamic_acid: { letter3: "Glu", letter1: "E", property: "negative charge" }
		}

		//Button click functions
		startbtn.onclick = function() {
			startImg.style.display = "none";
			startBtn.style.display = "none";
			control.style.display = "block";
			test.style.display = "block";
			start();			
		}

		stop.onclick = function() {
			gameOver(times);
		}

		restartbtn.onclick = function() {
			location.reload();
		}
		
		//Ans is right or wrong
		spid = spid1.concat(spid2);
		for(var i=0; i<spid.length; i++){
			spid[i] += "input";
		}

		
		function showAns(){
			spid.forEach(function(ele){
				var Ele = document.getElementById(ele);
				if(Ele!=null){
					Ele.onclick = function(){
						answer.style.color ="black";
						answer.innerHTML = Ele.value;
						if(Ele.value===rightAns){
							result = "correct!";
						}else{
							result = "wrong!";
						}
					}
				}
			});
			
		}

		//Game running
		function draw() {
			if(times>0){ 
				if(answer.innerHTML!=result && result==="correct!") { 	
					answer.style.color = "blue";				
					answer.innerHTML = result; 
				}else{
					//no answer in 3 secs, game is over
					gameOver(times);
				}
			}
			score.innerHTML = times;
			let t = times%18;
			if(times==0){
				//start
				addTestGroups(times+1,times,times+2);
			}else if(t>0 && t<10){
				//move to right
				rmTestGroups(t,t-1,t+1,t);
				addTestGroups(t+1,t,t+2);
			}else if(t>9){
				//move to left
				let x = 19-t;
				rmTestGroups(x+1,x,x+2,x+1);
				addTestGroups(x,x+1,x-1);
			}else if(t==0){
				//move to left
				rmTestGroups(t+2,t+1,t+3,t+2);
				addTestGroups(t+1,t,t+2);
			}
			times += 1;
		}

		function getTestValue() {
			let keys = Object.keys(aa);
			let randomProperty = aa[keys[Math.random()*keys.length << 0]];
			return randomProperty;
		}

		function addTest(id,cls,value){
			input = document.createElement("input");
			input.value = value;
			input.type = "button";
			input.id = id+"input";
			document.getElementById(id).classList.add(cls);
			document.getElementById(id).appendChild(input);
		}

		function addTestMethod(){
			let arr = [];
			let self_num = Math.floor(Math.random()*3);
			switch((Math.floor(Math.random()*6))+1){
				case 1:
					arr = [0,1,2];
					break;
				case 2:
					arr = [1,0,2];
					break;
				case 3:
					arr = [2,0,1];
					break;
				case 4:
					arr = [0,2,1];
					break;
				case 5:
					arr = [1,2,0];
					break;
				case 6:
					arr = [2,1,0];
					break;
			}
			return { self: self_num, arr: arr };

		}

		function addTestGroups(id0,id1,id2){
			let tests = [];
			let tests_1 = [];
			let self_num = addTestMethod().self;
			let arr_num = addTestMethod().arr;
			
			//make sure that there is no repeat choice
			do{
				tests = [getTestValue(),getTestValue(),getTestValue()];
				tests_1 = [tests[0].letter1,tests[1].letter1,tests[2].letter1];
				tests_1 = [...(new Set(tests_1))];
			} while(tests_1.length<3);
				
			switch((Math.random()>0.5)?-1:1){
				case -1:
					addTest(spid1[id0],"self",tests[self_num].letter1);
					addTest(spid1[id2],"other",tests[arr_num[0]].letter3);
					addTest(spid1[id1],"other",tests[arr_num[1]].letter3);
					addTest(spid2[id0],"other",tests[arr_num[2]].letter3);
					rightAns = tests[self_num].letter3;
					break;
				case 1:
					addTest(spid1[id0],"self",tests[self_num].letter3);
					addTest(spid1[id2],"other",tests[arr_num[1]].letter1);
					addTest(spid1[id1],"other",tests[arr_num[2]].letter1);
					addTest(spid2[id0],"other",tests[arr_num[0]].letter1);
					rightAns = tests[self_num].letter1;
					break;
			}
			
		}

		function rmTest(id,cls){
			document.getElementById(id).classList.remove(cls);
			let ele = document.getElementById(id+"input");
			ele.parentNode.removeChild(ele);
		}
		
		function rmTestGroups(id1,id2,id3,id4){
			rmTest(spid1[id1],"self");
			rmTest(spid1[id2],"other");
			rmTest(spid1[id3],"other");
			rmTest(spid2[id4],"other");
		}

		function countdown(){
			if(count==0){
				count = 3;
			}
			time.innerHTML = count;
			count -= 1;			
		}

		function start() {
			interval = setInterval(draw,reactTime);
			count_interval = setInterval(countdown,1000);
			show_interval = setInterval(showAns,100);
		}
	
		function gameOver(t){
			clearInterval(interval);
			clearInterval(count_interval);
			clearInterval(show_interval);
			if(t==0){ t=1;}
			scoreShow.innerHTML = "Your protein contains " + (t-1) +" amino acids.";
			control.style.display = "none";
			test.style.display = "none";
			endImg.style.display = "block";
			scoreShow.style.display = "block";
			restartBtn.style.display = "block";
		}

}

