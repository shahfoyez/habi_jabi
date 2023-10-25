<button id="playSoundButton">Play Notification Sound</button>
<audio id="notificationSound" preload="auto" allow="autoplay">
    <source src="C:\Users\Staff Asia - PC\Desktop\test.wav" type="audio/mpeg">
</audio>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const playButton = document.getElementById('playSoundButton');
    if (playButton) {
        playButton.click();
    }
    // notificationSound.play();
    // document.getElementById('startButton').addEventListener('click', function() {
    //     sendAjaxRequest();
    // });
    // // Function to play the notification sound

    //
    const notificationSound = document.getElementById('notificationSound');
    function playNotificationSound() {
        notificationSound.play();
    }
    // // Example: Play the sound when a button is clicked
    document.getElementById('playSoundButton').addEventListener('click', playNotificationSound);
    // Function to send the AJAX request
    function sendAjaxRequest() {
        $.ajax({
            url: 'https://api.coindesk.com/v1/bpi/currentprice.json',
            method: 'GET',
            success: function (data) {
                console.log("Byuadf");
                if (data) {
                    // Show a SweetAlert2 popup
                    Swal.fire({
                        title: 'Notification',
                        text: 'The condition is true!',
                        icon: 'info'
                    });

                    // Play the notification sound
                    // const notificationSound = new Audio('https://www.w3schools.com/tags/horse.mp3');
                    // Get a reference to the audio element
                    const notificationSound = document.getElementById('notificationSound');
                    console.log(notificationSound);
                    notificationSound.muted = false;
                    notificationSound.play();
                    // playNotificationSound();

                }
            }
        });
    }


    // function playNotificationSound() {
    //     const notificationSound = document.getElementById('notificationSound');
    //     console.log(notificationSound);
    //     notificationSound.play();
    // }
    // Call the function initially
    sendAjaxRequest();

    // Set an interval to send the AJAX request every 10 seconds
    setInterval(sendAjaxRequest, 5000); // 10 seconds = 10,000 milliseconds
</script>
