let form = document.getElementById('lobby__form');
let uniqueId = document.getElementById('uniqueId').value;
let displayName = getQueryParam('displayName');

if (displayName) {
    form.name.value = displayName;
}

form.addEventListener('submit', (e) => {
    e.preventDefault();

    displayName = e.target.name.value;
    const inviteCode = generateInviteCode();
    if (!inviteCode) {
        window.location = `./live.php`;
    } else {
        window.location.href = `./live_streaming.php?room=${inviteCode}&displayName=${encodeURIComponent(displayName)}`;
    }
});

function generateInviteCode() {
    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    let inviteCode = '';

    for (let i = 0; i < 6; i++) {
        const randomIndex = Math.floor(Math.random() * characters.length);
        inviteCode += characters.charAt(randomIndex);
    }

    return inviteCode;
}

function getQueryParam(param) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param);
}

function displayInviteLink(joinLink) {
    const linkElement = document.createElement('a');
    linkElement.href = joinLink;
    window.location.href = linkElement.href;
}
