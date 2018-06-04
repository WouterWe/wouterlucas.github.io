<!DOCTYPE html>
<html>
<style>
#BORD{
position: relative;
Background-color: green;
}
.blokje{
width: 10%;
height: 10%;
position: relative;
background-color: blue;
}
#getal{
position: relative;
background-color: red;
}
#waarde{
position: relative;
left: 0%;
height: 50%;
}
.button{
width: 100%;
height: 100%;
background-color: green;
}
</style>
<body>

<div id='BORD'></div>

<div id='getal'><center><p id='waarde'>1</p></center></div>
<p id='test'></p>


<?php
echo "<script>var Uid = " . $_GET['Uid'] . "; Eid = " . $_GET['Eid'] . "; var beurt = " . $_GET['beurt'] . "; var gevuldevakken = [" . $_GET['gevuld'] . "];</script>";
?>

<script>
var breedte = screen.width;
var hoogte = screen.height;
var hoofdwaarde = 0;
var teller = 0;
var teller2 = 1;

if (breedte > hoogte) {
hoofdwaarde = hoogte;
    
} else {
hoofdwaarde = breedte;
    
}


document.getElementById('BORD').style.width = hoofdwaarde/100 * 80 + 'px';
document.getElementById('BORD').style.height = hoofdwaarde/100 * 80 + 'px';
document.getElementById('BORD').style.top = (hoogte/100 * 50 - hoofdwaarde/100 * 40) + 'px';
document.getElementById('BORD').style.left = (breedte/100 * 50 - hoofdwaarde/100 * 40) + 'px';


document.getElementById('getal').style.width = hoofdwaarde/100 * 15 + 'px';
document.getElementById('getal').style.height = hoofdwaarde/100 * 20 + 'px';
document.getElementById('getal').style.top = (hoofdwaarde/100 * 10 - hoofdwaarde/100 * 95) + 'px';
document.getElementById('getal').style.left = hoofdwaarde/100 * 5 + 'px';

document.getElementById('waarde').style.fontSize = (hoofdwaarde/100 * 15) + 'px';

setTimeout(vakjesvul(), 0);

function vakjesvul(){
teller++;

if (teller < 11){

document.getElementById('BORD').innerHTML = document.getElementById('BORD').innerHTML + ("<div id='rij"+ teller +"' class='blokje'></div>");

}else if(teller < 21){

document.getElementById('BORD').innerHTML = document.getElementById('BORD').innerHTML + ("<div id='rij"+ teller +"' class='blokje' style='left:10%; top:-100%'></div>");
}else if(teller < 31){

document.getElementById('BORD').innerHTML = document.getElementById('BORD').innerHTML + ("<div id='rij"+ teller +"' class='blokje' style='left:20%; top:-200%'></div>");
}else if(teller < 41){

document.getElementById('BORD').innerHTML = document.getElementById('BORD').innerHTML + ("<div id='rij"+ teller +"' class='blokje' style='left:30%; top:-300%'></div>");
}else if(teller < 51){

document.getElementById('BORD').innerHTML = document.getElementById('BORD').innerHTML + ("<div id='rij"+ teller +"' class='blokje' style='left:40%; top:-400%'></div>");
}else if(teller < 61){

document.getElementById('BORD').innerHTML = document.getElementById('BORD').innerHTML + ("<div id='rij"+ teller +"' class='blokje' style='left:50%; top:-500%'></div>");
}else if(teller < 71){

document.getElementById('BORD').innerHTML = document.getElementById('BORD').innerHTML + ("<div id='rij"+ teller +"' class='blokje' style='left:60%; top:-600%'></div>");
}else if(teller < 81){

document.getElementById('BORD').innerHTML = document.getElementById('BORD').innerHTML + ("<div id='rij"+ teller +"' class='blokje' style='left:70%; top:-700%'></div>");
}else if(teller < 91){

document.getElementById('BORD').innerHTML = document.getElementById('BORD').innerHTML + ("<div id='rij"+ teller +"' class='blokje' style='left:80%; top:-800%'></div>");
}else if(teller < 101){

document.getElementById('BORD').innerHTML = document.getElementById('BORD').innerHTML + ("<div id='rij"+ teller +"' class='blokje' style='left:90%; top:-900%'></div>");
}

if (teller < 101){
setTimeout(vakjesvul(), 0);
}
}


				//einde opmaak
               
                
                //begin spelstart
 if (beurt == 0){
  var k;
  for(k=0; k < 100; k++){
   gevuldevakken[k] = 0;
  }
var plaats = 0;
setTimeout(volmaken() ,0);
}
function volmaken(){
plaats += 10;

       
document.getElementById('rij'+ plaats +'').innerHTML = "<button class='button' onclick='zetsteen("+ plaats +", "+ teller2 +")'></button>";

if (plaats < 100){
setTimeout(volmaken() ,0);
}
}


var vol = [0, 'f'];

var mdmd = 0;
var i;
var m;
function zetsteen(A, B){
gevuldevakken[A - 1] = B;
mdmd = 0;

for (i = 10; i < 101; i += 10) {
document.getElementById('rij'+ i +'').innerHTML = ''; 
}

vol[B - 1] = A;
document.getElementById('waarde').innerHTML = B + 1;
if (B == 10){
 beurt++;

 location.href = "https://pindapelja-lucasdeman.c9users.io/rekenen.php?Uid=" + Uid + "&Eid=" + Eid + "&beurt=" + beurt + "&gevuld=" + gevuldevakken;
}
for (m = 0; m < 10; m++){
if (vol[m] * 0 == 0){
document.getElementById('rij'+ vol[m] +'').innerHTML = (1 + m);
}else if(mdmd < 1){
mdmd++;
setTimeout(FORmule(), 0);
}
}



}


 var controle = 0;
 var t;
 var n;
 
 
function FORmule(){ 
teller2++;
for (t = 10; t < 110; t += 10) {

for (n = 0; n < 10; n++) {


if (vol[n] != t){
controle++;
}
}
if (controle == 10){

document.getElementById('rij'+ t +'').innerHTML = "<button class='button' onclick='zetsteen("+ t +", "+ teller2 +")'></button>";
}
controle = 0;
}

}


				//einde spelstart

    //veld herstellen
if (beurt != 0){
 var l;
 for (l=0; l < 100; l++){
  if (gevuldevakken[l] != 0){
   
   document.getElementById('rij' + (l + 1) + '').innerHTML = gevuldevakken[l];
  }
 }
 
}



</script>


</body>
</html>


