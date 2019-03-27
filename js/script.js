/* console.log('You are at ' + window.location); */

/* home work 3.4 */
//var money = parseInt(prompt('Cколько у вас с собой есть денег?'));
//var apple = parseInt(prompt('Cколько вы купили яблок?'));
//var bread = parseInt(prompt('Cколько вы купили батонов хлеба?'));
//var oneApple = parseInt(prompt('Cколько стоит одно яблоко?'));
//var oneBread = parseInt(prompt('Cколько стоит один батон хлеба?'));
//var result = money - (apple * oneApple + bread * oneBread);
//console.log(result >= 0);
//document.body.innerHTML = String(result >= 0);

/* home work 3.9 */
document.body.style.backgroundColor = prompt('Какой будет фон у страницы?');
let page = document.querySelector('.page');
let pageColor = prompt('Какой будет цвет текста на странице?');
page.style.color = pageColor;
let name = document.querySelector('.name');
name.innerHTML = prompt('Как зовут человека, который вас вдохновляет?');
let img = document.querySelector('img');
img.setAttribute('src', prompt('Введите адрес картинки'));
let shortBioParagraph = document.querySelector('.shortBio');
shortBioParagraph.innerHTML = prompt('Введите текст страницы');
shortBioParagraph += ' animated'; 

/* test running line (message) */
function setMsg(msg, ctrlwidth) {
	msg = " " + msg;
	newmsg = msg;
	while (newmsg.length , ctrlwidth) {
		newmsg += msg;
	}
	document.write('<form name="frm">');
	document.write('<input type="text" name="runtext" value="' + newmsg +'" size='+ ctrlwidth+'>');
	document.wrap('</form>');
	scrollMsg();
}

function scrollMsg() {
	CurMSg = document.frm.runtext.value;
	CurMSg = CurMSg.substring(1, CurMSg.length) + CurMSg.substring(0, 1);
	document.frm.runtext.value = CurMSg;
	timerID = setTimeout("scrollMsg()", 100);
}


function NextImage(){
	if(oImageLoad == null){
		var nImage = nCurImage + 1;
		if(nImage == nImgCount)
			nImage = 0;
		ShowImage(nImage);}
}

function PrevImage(){
	if(oImageLoad == null){
		var nImage = nCurImage -1;
		if(nImage < 0)
			nImage = nImgCount -1;ShowImage(nImage);
	}
}

/*** Test ***/
var nDevX = 300;
var nDevY = 300;

for(var i = 0; i < nCount; i++){
	aoChars[i].m_fX = Math.random() * 2 * nDevX -nDevX;
	aoChars[i].m_fY = Math.random() * 2 * nDevY -nDevY;
	aoChars[i].m_fDX = -aoChars[i].m_fX / nDevX;
	aoChars[i].m_fDY = -aoChars[i].m_fY / nDevY;UpdateSpanPos(i);
}

function UpdateSpanPos(nNumber){
	aoChars[nNumber].style.top = Math.round(aoChars[nNumber].m_fX).toString(10) + "px";
	aoChars[nNumber].style.left =Math.round(aoChars[nNumber].m_fY).toString(10) + "px";
}
