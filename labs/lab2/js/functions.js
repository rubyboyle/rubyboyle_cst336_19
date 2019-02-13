      var randomNumber = Math.floor(Math.random() * 99) + 1;
      var guesses = document.querySelector('#guesses');
      var lastResult = document.querySelector('#lastResult');
      var lowOrHi = document.querySelector('#lowOrHi');
      var wins = document.querySelector('#wins');
      var losses = document.querySelector('#losses');

      var guessSubmit = document.querySelector('.guessSubmit');
      var guessField = document.querySelector('.guessField');

      var guessCount = 1;
      var resetButton = document.querySelector('#reset');
      
      var winCounter = 0;
      var lossCounter = 0;
      
      resetButton.style.display = 'none';
      guessField.focus();
     
      function displayGames(){
        wins.innerHTML = "Wins: " + winCounter;
        losses.innerHTML = "Losses: " + lossCounter;
      }
      
      function checkGuess() {
        var userGuess = Number(guessField.value);
        if (guessCount === 1) {
          guesses.innerHTML = 'Previous guesses: ';
        }
        guesses.innerHTML += userGuess + ' ';

        if (userGuess === randomNumber) {
          lastResult.innerHTML = 'Congratulations! You got it right!';
          lastResult.style.backgroundColor = "#4dc6a3";
          lowOrHi.innerHTML = '';
          winCounter++;
          setGameOver();
          displayGames();
        } else if (guessCount === 7) {
          lastResult.innerHTML = 'Sorry, you lost!';
          lossCounter++;
          setGameOver();
          displayGames();
        } else {
          lastResult.innerHTML = 'Wrong!';
          lastResult.style.backgroundColor = "#f5535e";
        if (userGuess < randomNumber) {
            lowOrHi.innerHTML = 'Last guess was too low!';
          }
          else if (userGuess > randomNumber) {
            lowOrHi.innerHTML = 'Last guess was too high!';
          }
        }
         
        guessCount++;
        guessField.value = '';
        guessField.focus();
        
         if (userGuess > 99){
            lowOrHi.innerHTML = 'Last guess was over 99, you get another attempt!';
            guessCount--; //subtracts a guess but remains in viewed queue
          }
          
      }
      
      guessSubmit.addEventListener('click', checkGuess);

      function setGameOver() {
        guessField.disabled = true;
        guessSubmit.disabled = true;
        resetButton.style.display = 'inline';
        resetButton.addEventListener('click', resetGame);
        displayGames();
      }

      function resetGame() {
        guessCount = 1;
    
        var resetParas = document.querySelectorAll('.resultParas p');
        for (var i = 0; i < resetParas.length; i++) {
          resetParas[i].textContent = '';
        }

        //resetButton.style.display = 'none';

        guessField.disabled = false;
        guessSubmit.disabled = false;
        guessField.value = '';
        guessField.focus();

        lastResult.style.backgroundColor = 'white';

        randomNumber = Math.floor(Math.random() * 99) + 1;
      }
   
    