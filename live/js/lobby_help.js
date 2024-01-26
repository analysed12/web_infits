function generateMeetingLink() {
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
}

function getQueryParam(param) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param);
}