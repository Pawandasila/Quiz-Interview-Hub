<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Call</title>
    <style>
        video {
            width: 100%;
            max-width: 600px;
        }
    </style>
</head>

<body>
    <h1>Video Call</h1>
    <video id="localVideo" autoplay></video>
    <video id="remoteVideo" autoplay></video>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            const configuration = { iceServers: [{ urls: "stun:stun.l.google.com:19302" }] };
            let peerConnection;

            // Get user media
            navigator.mediaDevices.getUserMedia({ video: true, audio: true })
                .then(stream => {
                    $("#localVideo")[0].srcObject = stream;
                    peerConnection = new RTCPeerConnection(configuration);
                    stream.getTracks().forEach(track => peerConnection.addTrack(track, stream));
                })
                .catch(error => console.error("getUserMedia error:", error));

            // Handle ICE Candidate events
            peerConnection.onicecandidate = (event) => {
                if (event.candidate) {
                    // Send the candidate to the other peer
                    // Implement your signaling logic here
                }
            };

            // Handle the creation of the remote stream
            peerConnection.ontrack = (event) => {
                $("#remoteVideo")[0].srcObject = event.streams[0];
            };

            // Implement your signaling logic here to exchange SDP and ICE candidates

            // Example: Socket.io for signaling
            const socket = io.connect('your_signaling_server_url');

            // Listen for messages from the signaling server
            socket.on('message', (message) => {
                if (message.type === 'offer' || message.type === 'answer') {
                    peerConnection.setRemoteDescription(new RTCSessionDescription(message))
                        .then(() => {
                            if (message.type === 'offer') {
                                return peerConnection.createAnswer();
                            }
                        })
                        .then(answer => peerConnection.setLocalDescription(answer))
                        .then(() => {
                            // Send the answer to the other peer
                            // Implement your signaling logic here
                        })
                        .catch(error => console.error("Error setting remote description:", error));
                } else if (message.type === 'candidate') {
                    // Add the new ICE candidate to our connection
                    peerConnection.addIceCandidate(new RTCIceCandidate(message.candidate))
                        .catch(error => console.error("Error adding ice candidate:", error));
                }
            });

            // Example: Send an offer to the other peer
            peerConnection.createOffer()
                .then(offer => peerConnection.setLocalDescription(offer))
                .then(() => {
                    // Send the offer to the other peer
                    // Implement your signaling logic here
                })
                .catch(error => console.error("Error creating offer:", error));
        });
    </script>
</body>

</html>