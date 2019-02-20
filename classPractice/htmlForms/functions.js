// JavaScript File
/*global $*/

//var firstNameValue = $('#item4').val();

var answer = document.querySelector('#item4');
var guessField = document.querySelector('.radio');
var message = document.querySelector('.message');
var guessSubmit = document.querySelector('.input-group');

function checkGuess() {
    var userGuess = Number(guessField.value);
    if(userGuess === answer){
        message.innerHTML = 'Congrats! you got it right!';
    }
    
}

guessSubmit.addEventListener('click', checkGuess);