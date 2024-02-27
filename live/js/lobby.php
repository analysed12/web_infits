<?php 
    require_once('constant/constant.php');
?>
<script>
        const script = document.createElement('script');
    script.src = '<?=$DEFAULT_PATH.'live/js/lobby_help.js';?>';
    document.head.appendChild(script);
    script.addEventListener('load', function () {
        // Now you can use the functions from functions.js
        // sayHello();
        // const sum = addNumbers(5, 10);
        // console.log('Sum:', sum);
        let displayName = getQueryParam('displayName');
        let meetingCode = generateMeetingLink();

        let form = document.getElementById('lobby__form');
    let uniqueId = document.getElementById('uniqueId').value;
    // displayName();
    // let displayName = getQueryParam('displayName');

    if (displayName) {
        form.name.value = displayName;
        console.log(displayName);
    }

    window.onload = function(){
        console.log(window.location);
        console.log(displayName);
    };

    // const meetingCode = generateMeetingLink();
    form.addEventListener('submit', (e) => {
        e.preventDefault();

        displayName = e.target.name.value;
        // const inviteCode = generateInviteCode();
        // const meetingCode = generateMeetingLink();
        // if (!inviteCode && !meetingCode) {
        if (!meetingCode) {
            window.location.href = `./live.php`;
        } else {
            // window.location.href = `./live_streaming.php?room=${inviteCode}&displayName=${encodeURIComponent(displayName)}&meetingLink=${meetingCode}`;
            window.location.href = `./live_streaming.php?displayName=${encodeURIComponent(displayName)}&meetingLink=${meetingCode}`;
        }
    });

    /*function generateInviteCode() {
        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        let inviteCode = '';

        for (let i = 0; i < 6; i++) {
            const randomIndex = Math.floor(Math.random() * characters.length);
            inviteCode += characters.charAt(randomIndex);
        }

        return inviteCode;
    }*/

    /* function generateMeetingLink() {
        const characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
        let meetingCode = '';
        let counter = 0;

        for (let i = 0; i < 9; i++) {
            const randomIndex = Math.floor(Math.random() * characters.length);
            if(counter > 2){
                    meetingCode += '-';
                    counter = 0;
                }
            meetingCode += characters.charAt(randomIndex);
            counter++;
        }
        return meetingCode;
    } */

    /* function getQueryParam(param) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(param);
    } */

    function displayInviteLink(joinLink) {
        const linkElement = document.createElement('a');
        linkElement.href = joinLink;
        window.location.href = linkElement.href;
    }
    }); // Replace with the correct path to your functions.js file



    // document.head.appendChild(script);
</script>