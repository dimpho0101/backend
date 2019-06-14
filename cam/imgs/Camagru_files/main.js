//Global vars

let width = 500,
    height = 0,
    filter = 'none',
    streaming = false;

// Dom elements
const video = document.getElementById('video');
const canvas = document.getElementById('canvas');
const photos = document.getElementById('photos');
const photoButton = document.getElementById('photo-button');
const clearButton = document.getElementById('clear-button');
const photoFilter = document.getElementById('photo-filter');
var sticker = document.getElementById('sticker');

//Get media stream
navigator.mediaDevices.getUserMedia({ video: true, audio: false })
    .then(function(stream) {
        // Link to the video source
        video.srcObject = stream;
        //play video
        video.play();

    })
    .catch(function(err) {
        console.log(`Error: ${err}`);
    });


//play when ready
video.addEventListener('canplay', function(e) {
    if (!streaming) {
        //set video/ canvas height
        height = video.videoHeight / (video.videoWidth / width)

        video.setAttribute('width', width);
        video.setAttribute('height', height);
        canvas.setAttribute('width', width);
        canvas.setAttribute('height', height);

        streaming = true;
    }

}, false);

//photo button event
photoButton.addEventListener('click', function(e) {
    takePicture();

    e.preventDefault();
}, false);

//filter event
photoFilter.addEventListener('change', function(e) {
    //set filter to chosen option
    filter = e.target.value;
    // set filter to vide
    sticker.src = filter;
    e.preventDefault();
});

//clear event
clearButton.addEventListener('click', function(e) {
    //clear photo;

    photos.innerHTML = '';
    //change filter back to normal

    filter = 'none';
    //set video filter
    video.style.filter = filter;

    // reset select list
    photoFilter.selectedIndex = 0;

});


//take picture from canvas
function takePicture() {
    // create canvas
    const context = canvas.getContext('2d');
    if (width && height) {

        canvas.width = width;
        canvas.height = height;

        // draw an image of the video on the canvas
        context.drawImage(video, 0, 0, width, height);

        //create image from the canvas

        const imgUrl = canvas.toDataURL('image/png');

        console.log(imgUrl);

        // create img element
        const img = document.createElement('img');

        // set image src
        img.setAttribute('src', imgUrl);

        //set image fileter
        img.style.filter = filter;

        //add image to photos
        photos.appendChild(img);
    }
}