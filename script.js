let timer;

function autoVerify(){

clearTimeout(timer);

timer = setTimeout(async ()=>{

let userId = document.getElementById("userId").value;
let zoneId = document.getElementById("zoneId").value;

if(userId.length < 5 || zoneId.length < 2){
return;
}

document.getElementById("result").innerHTML = "Checking...";

const res = await fetch("verify.php",{

method:"POST",

headers:{
"Content-Type":"application/json"
},

body:JSON.stringify({
userId:userId,
zoneId:zoneId
})

});

const data = await res.json();

if(data.nickname){

document.getElementById("result").innerHTML =
"Player: "+data.nickname+" ✅";

}else{

document.getElementById("result").innerHTML =
"Invalid ID ❌";

}

},700);

}