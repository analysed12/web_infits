let handleMemberJoined = async (MemberId) => {
    console.log('A new member has joined the room:', MemberId)
    addMemberToDom(MemberId)

    let members = await channel.getMembers()
    updateMemberTotal(members)

    let { name } = await rtmClient.getUserAttributesByKeys(MemberId, ['name'])
    addBotMessageToDom(`Welcome to the room ${name}! 👋`)
}

// let addMemberToDom = async(MemberId) => {
//     let { name } = await rtmClient.getUserAttributesByKeys(MemberId, ['name'])

//     let membersWrapper = document.getElementById('member__list')
//     let memberItem = `<div class="member__wrapper" id="member__${MemberId}__wrapper">
//                         <span class="green__icon"></span>
//                         <p class="member_name">${name}</p>
//                     </div>`

//     membersWrapper.insertAdjacentHTML('beforeend', memberItem)
// }

// let updateMemberTotal = async (members) => {
//     let total = document.getElementById('members__count')
//     total.innerText = members.length
// }

let handleMemberLeft = async (MemberId) => {
    removeMemberFromDom(MemberId)

    let members = await channel.getMembers()
    updateMemberTotal(members)
}

let removeMemberFromDom = async (MemberId) => {
    let memberWrapper = document.getElementById(`member__${MemberId}__wrapper`)
    let name = memberWrapper.getElementsByClassName('member_name')[0].textContent
    addBotMessageToDom(`${name} has left the room.`)

    memberWrapper.remove()
}

// let getMembers = async() => {
//     let members = await channel.getMembers()
//     updateMemberTotal(members)
//     for (let i = 0; members.length > i; i++) {
//         addMemberToDom(members[i])
//     }
// }

let handleChannelMessage = async (messageData, MemberId) => {
    console.log('A new message was received')
    let data = JSON.parse(messageData.text)

    if (data.type === 'chat') {
        addMessageToDom(data.displayName, data.message)
    }

    if (data.type === 'user_left') {
        document.getElementById(`user-container-${data.uid}`).remove()

        if (userIdInDisplayFrame === `user-container-${uid}`) {
            displayFrame.style.display = null

            for (let i = 0; videoFrames.length > i; i++) {
                videoFrames[i].style.height = '300px'
                videoFrames[i].style.width = '300px'
            }
        }
    }
}

let sendMessage = async (e) => {
    e.preventDefault()

    let message = e.target.message.value;
    console.log(message);
    console.log(displayName);
    channel.sendMessage({ text: JSON.stringify({ 'type': 'chat', 'message': message, 'displayName': displayName }) });
    addMessageToDom(displayName, message)
    e.target.reset()
}

let addMessageToDom = (name, message) => {
    let messagesWrapper = document.getElementById('_messages')

    let newMessage = `<div class="message__wrapper">
    <div class="message__body">
    <img src="./assets/images/live-user-default.svg" alt="Profile Picture" class="profile-picture-in-message">
    <div class="message__content" style="padding-left: 10px;">
        <strong class="message__author">${name}</strong>
        <p class="message__text">${message}</p>
    </div>
</div>

                    </div>`

    messagesWrapper.insertAdjacentHTML('beforeend', newMessage)

    let lastMessage = document.querySelector('#_messages .message__wrapper:last-child')
    if (lastMessage) {
        lastMessage.scrollIntoView()
    }
}

let addBotMessageToDom = (botMessage) => {
    let messagesWrapper = document.getElementById('_messages')

    let newMessage = `<div class="message__wrapper">
    <div class="message__body__bot">
    <img src="./assets/images/live-user-default.svg" alt="Profile Picture" class="profile-picture-in-message">
    <div class="message__content__bot" style="padding-left: 10px;>
        <strong class="message__author__bot">Bot</strong>
        <p class="message__text__bot">${botMessage}</p>
    </div>
</div>

                    </div>`

    messagesWrapper.insertAdjacentHTML('beforeend', newMessage)

    let lastMessage = document.querySelector('#_messages .message__wrapper:last-child')
    if (lastMessage) {
        lastMessage.scrollIntoView()
    }
}

let leaveChannel = async () => {
    await channel.leave()
    await rtmClient.logout()
}

function submitEmoji() {

    let message = "😊";
    channel.sendMessage({ text: JSON.stringify({ 'type': 'chat', 'message': message, 'displayName': displayName }) })
    addMessageToDom(displayName, message)
    e.target.reset()


}

function submitThumb() {
    let message = "👍";
    channel.sendMessage({ text: JSON.stringify({ 'type': 'chat', 'message': message, 'displayName': displayName }) })
    addMessageToDom(displayName, message)
    e.target.reset()

}


window.addEventListener('beforeunload', leaveChannel)
let messageForm = document.getElementById('message__form')
messageForm.addEventListener('submit', sendMessage)
