var fileInput = document.getElementById('file');
var file = fileInput.files[0];

var chunkSize = 1024 * 1024; // 1MB-os chunkok
var chunks = Math.ceil(file.size / chunkSize);

for (var i = 0; i < chunks; i++) {
    var start = i * chunkSize;
    var end = Math.min(file.size, start + chunkSize);

    var chunk = file.slice(start, end);

    uploadChunk(chunk, i);
}

function uploadChunk(chunk, i) {
    var xhr = new XMLHttpRequest();

    xhr.open('POST', '/page/upload.php', true);
    xhr.setRequestHeader('X-Chunk-Number', i);
    xhr.send(chunk);
}