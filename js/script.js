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
/* home work 4.2 */
function scrollMsg() {
	CurMSg = document.frm.runtext.value;
	CurMSg = CurMSg.substring(1, CurMSg.length) + CurMSg.substring(0, 1);
	document.frm.runtext.value = CurMSg;
	timerID = setTimeout("scrollMsg()", 100);
}

/* home work 4.7 */
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

/* home work 3.7 */
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

function OnTimer(){
	var bStop = true;
	for(var i = 0; i < nCount; i++){
		aoChars[i].m_fX += aoChars[i].m_fDX;
		aoChars[i].m_fY += aoChars[i].m_fDY;
		if((Math.abs(aoChars[i].m_fX) < 1) &&(Math.abs(aoChars[i].m_fY) < 1)){
			aoChars[i].m_fX = 0;
			aoChars[i].m_fY = 0;
			aoChars[i].m_fDX = 0;
			aoChars[i].m_fDY = 0;
		} else
			bStop = false;
		UpdateSpanPos(i);
	}
	if(bStop)
		window.clearInterval(nTimerID);
}
		
function OnTimer_1(){
	fX += fdX;if(fX > 0){
		fX = 0;clearInterval(nTimerID);
		InitPhase_2();}elsefdX += 0.75;
	aoChars[0].style.left = Math.ceil(fX).toString() + "px";
}

function OnTimer(){
	var dfAlpha = 360 / nCount;
	for(var i = 0; i < nCount; i++){
		var oSpan = aoChars[i];
		var nTop = nYPos + nHeight * Math.sin(fAlpha -i * dfAlpha * Math.PI / 180);
		oSpan.style.top  = nTop;
		oSpan.style.left = nXPos + nWidth *Math.cos(fAlpha -i * dfAlpha * Math.PI / 180);
		oSpan.style.fontSize =((nTop -nYPos + nHeight) / (2 * nHeight)) *(nFontSizeMax -nFontSizeMin) + nFontSizeMin;
	}
	fAlpha += 0.02;
}

/* home work 3.9 */
var nStarCount  = 128;
nMinSpeed  = 1;  
nMaxSpeed  = 5; 
nMinSize  = 1;
nMaxSize  = 3;

var aStars  = new Array(nStarCount);
var nWidth  = screen.width;
var nHeight = screen.height;

function ResetStar(i, x){
	var oDiv = aStars[i];
		if(x < 0)x = Math.round(Math.random() * nWidth);
			oDiv.x = x;
			oDiv.y = Math.round(Math.random() * nHeight);
			oDiv.nSpeed = Math.round(Math.random() * (nMaxSpeed -nMinSpeed)) + nMinSpeed;
	
			oDiv.style.backgroundColor = 
				RGB_Str(Math.round(Math.random() * 0xFF),
					Math.round(Math.random() * 0xFF),
					Math.round(Math.random() * 0xFF));

			var nSize = Math.round(Math.random() * (nMaxSize -nMinSize)) + nMinSize;
			
			oDiv.style.width = nSize.toString(10) + "px";
			oDiv.style.height = oDiv.style.width;

		UpdateStarPos(i);
}

function UpdateStarPos(i){
	var oDiv = aStars[i];
	oDiv.style.top  = oDiv.y.toString() + "px";
	oDiv.style.left = oDiv.x.toString() + "px";
}

function MoveStars(){
	for(var i = 0; i < nStarCount; i++){
		aStars[i].x += aStars[i].nSpeed;
		if(aStars[i].x > nWidth)
			ResetStar(i, 0);
		else
			UpdateStarPos(i);
	}
}
