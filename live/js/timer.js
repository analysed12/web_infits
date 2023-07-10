// timer.js
var startTime;

function startTimer() {
    startTime = new Date();
    setInterval(updateTimer, 1000); // Update the timer every second

    // Make the timer visible
    var timerElement = document.getElementById('timer');
    timerElement.style.visibility = 'visible';
}

function updateTimer() {
    var currentTime = new Date();
    var timeDiff = currentTime - startTime;

    var hours = Math.floor((timeDiff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((timeDiff % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((timeDiff % (1000 * 60)) / 1000);

    // Format the time values with leading zeros
    hours = hours.toString().padStart(2, '0');
    minutes = minutes.toString().padStart(2, '0');
    seconds = seconds.toString().padStart(2, '0');

    var timerElement = document.getElementById('timer');
    timerElement.textContent = hours + ':' + minutes + ':' + seconds;
}

// Add the event listener to the "Join" button
document.getElementById('join-btn').addEventListener('click', startTimer);
