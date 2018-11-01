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
