/**
 * login-colors.js 
 *
 * Changes login background colours.
 *
 */

$(function (){
    var silentcomicsClassName = "silentcomics_"+Math.floor((Math.random() * 10) + 1);
    $('body').addClass(silentcomicsClassName);
});

var myArray = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F'];
setInterval(function () {
    var rand = myArray[Math.round(Math.random() * (myArray.length - 1))];
    var rand1 = myArray[Math.round(Math.random() * (myArray.length - 1))];
    var rand2 = myArray[Math.round(Math.random() * (myArray.length - 1))];
    var rand3 = myArray[Math.round(Math.random() * (myArray.length - 1))];
    var rand4 = myArray[Math.round(Math.random() * (myArray.length - 1))];
    var rand5 = myArray[Math.round(Math.random() * (myArray.length - 1))];  
    document.getElementById("body").body.background= '#'+rand+rand2+rand3+rand1+rand5+rand4;
  document.body.style.background= '#'+rand+rand1+rand2+rand3+rand4+rand5;
    setTimeout(function () {
      var rand = myArray[Math.round(Math.random() * (myArray.length - 1))];
      var rand1 = myArray[Math.round(Math.random() * (myArray.length - 1))];
      var rand2 = myArray[Math.round(Math.random() * (myArray.length - 1))];
      var rand3 = myArray[Math.round(Math.random() * (myArray.length - 1))];
      var rand4 = myArray[Math.round(Math.random() * (myArray.length - 1))];
      var rand5 = myArray[Math.round(Math.random() * (myArray.length - 1))];  
      document.getElementById("body").body.background= '#'+rand+rand2+rand1+rand3+rand5+rand4;
      document.body.style.background= '#'+rand+rand1+rand3+rand2+rand4+rand5;
    }, 1000);   
}, 1000);