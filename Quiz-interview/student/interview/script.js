const APP_ID = '581d12b8e3d34953be9a522c087776ab';
const TOKEN = '007eJxTYLCcuHmv9YpZf6NSg/otbir6Hklqna3Qmdjh7V7RZf7stpICg6mFYYqhUZJFqnGKsYmlqXFSqmWiqZFRsoGFubm5WWJS1oI7qQ2BjAyT3eRYGBkgEMRnYchNzMxjYAAAKQcelw==';
const CHANNEL_NAME = 'main';

let localTracks = [];
const remoteUsers = {};


let rtcClient;
let rtmClient;
// let channel;
let client;



const initRtm = async () => {
    try {
        rtmClient = AgoraRTM.createInstance(APP_ID);

        await rtmClient.login({ 'uid': RTM_UID, 'token': TOKEN });

        channel = rtmClient.createChannel(ROOM_ID);

        await channel.join();

        getChannelMembers();

        window.addEventListener('beforeunload', leaveRtmChannel);
        channel.on('MemberJoined', handleMemberJoined);
        channel.on('MemberLeft', handleMemberLeft);
        console.log('RTM initialization successful');

    } catch (error) {
        console.error('Error initializing RTM:', error);
    };
};


const joinAndDisplayLocalStream = async () => {
    try {
        client.on('user-published', handleUserJoin);
        client.on('user-left', handleUserLeft);

        const UID = await client.join(APP_ID, CHANNEL_NAME, TOKEN || null);

        localTracks = await AgoraRTC.createMicrophoneAndCameraTracks();

        const players = `<div class="video-container user-${UID}" id='user-container-${UID}'>
                            <div class="video-player" id="user-${UID}"></div>
                        </div>`;

        document.getElementById('video-stream').insertAdjacentHTML('beforeend', players);

        localTracks[1].play(`user-${UID}`);

        await client.publish(localTracks);
        // Your existing JavaScript code for video streaming and controls...

        initVolumeIndicator();


    } catch (error) {
        console.error('Error joining the channel:', error);
    }

};

const joinStream = async () => {
    try {
        client = AgoraRTC.createClient({ mode: 'rtc', codec: 'vp8' });
        await joinAndDisplayLocalStream();

        document.getElementById('join-btn').style.display = 'none';
        document.getElementById('stream-controls').style.display = 'flex';
    } catch (error) {
        console.error('Error joining the stream:', error);
    }
};

const handleUserJoin = async (user, mediatype) => {
    try {
        remoteUsers[user.uid] = user;
        await client.subscribe(user, mediatype);

        if (mediatype === 'video') {
            const player = document.getElementById(`user-container-${user.uid}`);
            if (player != null) {
                player.remove();
            }

            const players = `<div class="video-container" id='user-container-${user.uid}'>
                            <div class="video-player" id="user-${user.uid}"></div>
                        </div>`;

            document.getElementById('video-stream').insertAdjacentHTML('beforeend', players);
            user.videoTrack.play(`user-${user.uid}`);
        }

        if (mediatype === 'audio') {
            user.audioTrack.play();
        }

    } catch (error) {
        console.log("Something went wrong:", error);
    }
};

const handleUserLeft = async (user) => {
    try {
        delete remoteUsers[user.uid];
        document.getElementById(`user-container-${user.uid}`).remove();
    }
    catch (error) {
        console.log("Something went wrong:", error);
    }
};

const leaveAndRemoveLocalStream = async () => {
    try {
        // Stop and remove local tracks
        for (let i = 0; localTracks.length > i; i++) {
            localTracks[i].stop();
            localTracks[i].close();
        }

        // Leave the channel
        await client.leave();

        // Remove screen sharing player
        const screenPlayer = document.getElementById('screen-player');
        if (screenPlayer) {
            screenPlayer.remove();
        }

        // Show the join button again
        document.getElementById('join-btn').style.display = 'block';
        document.getElementById('stream-controls').style.display = 'none';
        document.getElementById('video-stream').innerHTML = '';
    } catch (error) {
        console.error('Error leaving the stream:', error);
    }
};

const toggleMic = async (e) => {

    if (localTracks[0].muted) {
        await localTracks[0].setMuted(false);
        e.target.innerText = 'Mic On';
        e.target.style.backgroundColor = 'cadetblue'; // Corrected spelling

    }
    else {
        await localTracks[0].setMuted(true);
        e.target.innerText = 'Mic Off';
        e.target.style.backgroundColoe = '#EE4B2B';
    }
};

const toggleCamera = async (event) => {
    try {
        if (localTracks[1].readyState === 'stopped') { // Check if camera track is stopped
            await localTracks[1].play();
            event.target.innerText = 'Camera On';
            event.target.style.backgroundColor = 'cadetblue';
        } else {
            await localTracks[1].stop(); // Stop the camera track explicitly
            event.target.innerText = 'Camera Off';
            event.target.style.backgroundColor = '#EE4B2B';
        }
    } catch (error) {
        console.error('Error toggling camera:', error);
    }
};

let initVolumeIndicator = () => {
    client.enableAudioVolumeIndicator();

    AgoraRTC.setParameter('AUDIO_VOLUME_INDICATION_INTERVAL', 200);
    client.on("volume-indicator", volumes => {
        console.log('volume:', volumes);
        volumes.forEach((volume) => {
            console.log('volumes:', volume.level, 'UID:', volume.uid);

            try {

                let item = document.getElementsByClassName(`user-${volume.uid}`)[0];

                if (volume.level >= 50) {
                    item.style.border = '5px solid #00ff00'; // Set border directly
                } else {
                    item.style.border = '5px solid #fff'; // Set border directly
                }
            } catch (error) {
                console.error(error)
            }

        });
    });
}

const toggleScreen = async (e) => {
    let screenButton = e.currentTarget;
    let cameraButton = document.getElementById('camera-btn');

    if (!sharingScreen) {
        sharingScreen = true;

        screenButton.classList.add('active');
        cameraButton.classList.remove('active');
        cameraButton.style.display = 'none';

        localScreenTracks = await AgoraRTC.createScreenVideoTrack();

        // Remove existing video container
        document.getElementById(`user-container-${uid}`).remove();
        displayFrame.style.display = 'block';

        // Create a new video container for the shared screen
        let player = `<div class="video__container" id="user-container-${uid}">
            <div class="video-player" id="user-${uid}"></div>
        </div>`;
        displayFrame.insertAdjacentHTML('beforeend', player);
        document.getElementById(`user-container-${uid}`).addEventListener('click', expandVideoFrame);
        userIdInDisplayFrame = `user-container-${uid}`;
        localScreenTracks.play(`user-${uid}`);

        // Unpublish the camera track and publish the screen sharing track
        await client.unpublish([localTracks[1]]);
        await client.publish([localScreenTracks]);

        // Resize other video frames
        let videoFrames = document.getElementsByClassName('video__container');
        for (let i = 0; videoFrames.length > i; i++) {
            if (videoFrames[i].id !== userIdInDisplayFrame) {
                videoFrames[i].style.height = '100px';
                videoFrames[i].style.width = '100px';
            }
        }
    } else {
        sharingScreen = false;
        cameraButton.style.display = 'block';
        document.getElementById(`user-container-${uid}`).remove();
        await client.unpublish([localScreenTracks]);
        switchToCamera();
    }
};

const leaveStream = async (e) => {
    e.preventDefault();

    // Show the join button and hide the stream controls
    document.getElementById('join-btn').style.display = 'block';
    document.getElementById('stream-controls').style.display = 'none';

    // Stop and close all tracks
    for (let i = 0; localTracks.length > i; i++) {
        localTracks[i].stop();
        localTracks[i].close();
    }

    // Unpublish all tracks from the client
    await client.unpublish(localTracks);

    // Remove the video container
    document.getElementById(`user-container-${uid}`).remove();

    // Reset display frame if the shared screen was displayed
    if (userIdInDisplayFrame === `user-container-${uid}`) {
        displayFrame.style.display = null;
        let videoFrames = document.getElementsByClassName('video__container');
        for (let i = 0; videoFrames.length > i; i++) {
            videoFrames[i].style.height = '300px';
            videoFrames[i].style.width = '300px';
        }
    }

    // Send a message indicating user left
    channel.sendMessage({ text: JSON.stringify({ 'type': 'user_left', 'uid': uid }) });
};





const enterRoom = async (e) => {
    e.preventDefault();

    let displayName = e.target.displayName.value

    joinAndDisplayLocalStream()

}

function sendMessage() {

    var messageInput = document.getElementById('message-input');
    var message = messageInput.value.trim();
    messageInput.value = '';
}

// Function to receive and display incoming messages
function receiveMessage(message) {
    var chatMessages = document.getElementById('chat-messages');
    var newMessage = document.createElement('div');
    newMessage.textContent = message;
    chatMessages.appendChild(newMessage);
}




document.getElementById('send-btn').addEventListener('click', sendMessage);

document.addEventListener('DOMContentLoaded', () => {


    document.getElementById('join-btn').addEventListener('click', joinStream);
    document.getElementById('leave-btn').addEventListener('click', leaveAndRemoveLocalStream);
    document.getElementById('mic-btn').addEventListener('click', toggleMic);
    document.getElementById('video-btn').addEventListener('click', toggleCamera);
    document.getElementById('screen-share-btn').addEventListener('click', toggleScreenShare);
    document.getElementById('stop-share-btn').addEventListener('click', stopScreenShare);
});
