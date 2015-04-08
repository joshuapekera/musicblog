var canvas, ctx, source, context, analyser, fbc_array, bars, bar_x, bar_width, bar_height, canvasContext;

window.addEventListener('load', init, false);

function init() {
	setupWebAudio();
	setupDrawingCanvas();
	draw();
}


function setupWebAudio() {
	var audio = document.getElementById('music');
	var audioContext = new webkitAudioContext();
    
	analyser = audioContext.createAnalyser();
    canvas = document.getElementById('analyser_render');
    ctx = canvas.getContext('2d');
	var source = audioContext.createMediaElementSource(audio);
	source.connect(analyser);
	analyser.connect(audioContext.destination);
	audio.play();
    frameLooper();
}


function frameLooper(){
    window.webkitRequestAnimationFrame(frameLooper);
    fbc_array = new Uint8Array(analyser.frequencyBinCount);
    analyser.getByteFrequencyData(fbc_array);
    ctx.clearRect(0, 0, canvas.width, canvas.height); // Clear the canvas
    ctx.fillStyle = '#00CCFF'; // Color of the bars
    bars = 100;
    for (var i = 0; i < bars; i++) {
        bar_x = i * 3;
        bar_width = 2;
        bar_height = -(fbc_array[i] / 2);
        //fillRect( x, y, width, height ) // Explanation of the parameters below
        ctx.fillRect(bar_x, canvas.height, bar_width, bar_height);
    }
}