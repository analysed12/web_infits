let messagesContainer = document.getElementById('_messages');
messagesContainer.scrollTop = messagesContainer.scrollHeight;

const memberContainer = document.getElementById('members__container');
const memberButton = document.getElementById('members__button');

const chatContainer = document.getElementById('messages__container');
const chatButton = document.getElementById('chat__button');

let activeMemberContainer = false;
try {
  memberButton.addEventListener('click', () => {
    if (activeMemberContainer) {
      memberContainer.style.display = 'none';
    } else {
      memberContainer.style.display = 'block';
    }

    activeMemberContainer = !activeMemberContainer;
  });
} catch (error) {
  console.log(error);
  console.log('No member button found');
}


let activeChatContainer = false;
try {
  chatButton.addEventListener('click', () => {
    if (activeChatContainer) {
      chatContainer.style.display = 'none';
    } else {
      chatContainer.style.display = 'block';
    }

    activeChatContainer = !activeChatContainer;
  });
} catch (error) {
  console.log(error);
  console.log('No chat button found');
}


let displayFrame = document.getElementById('streams__container')
let videoFrames = document.getElementsByClassName('video__container')
let userIdInDisplayFrame = null;

let expandVideoFrame = (e) => {

    let child = displayFrame.children[0]
  // if (child) {
  //   document.getElementById('streams__container').appendChild(child)
  // }

  // displayFrame.style.display = 'block'
  // displayFrame.appendChild(e.currentTarget)
  // userIdInDisplayFrame = e.currentTarget.id

  // for (let i = 0; videoFrames.length > i; i++) {
  //   if (videoFrames[i].id != userIdInDisplayFrame) {
  //     videoFrames[i].style.height = '100px'
  //     videoFrames[i].style.width = '100px'
  //   }
  // }

}

// for (let i = 0; videoFrames.length > i; i++) {
//   videoFrames[i].addEventListener('click', expandVideoFrame)
// }


let hideDisplayFrame = () => {
  userIdInDisplayFrame = null
  displayFrame.style.display = null

  let child = displayFrame.children[0]
  document.getElementById('streams__container').appendChild(child)

  for (let i = 0; videoFrames.length > i; i++) {
    videoFrames[i].style.height = '400px'
    videoFrames[i].style.width = '650px'
  }
}

//displayFrame.addEventListener('click', hideDisplayFrame)