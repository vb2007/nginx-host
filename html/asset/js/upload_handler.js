const fileInput = document.getElementById("fileToUpload");

//figyeli, hogy van-e kiválatsza fájl. ha van, meghívja a feltöltés függvényt
fileInput.addEventListener("change", (e) => {
    const file = e.target.files[0];
    if (file) {
        uploadFile(file);
    }
});

function uploadFile(File) {
    const chunkSize = 1024 * 1024; //1mb-os méretenként tölti fel a fájlt
    let offset = 0;

    const uploadChunk = () => {
        const chunk = file.slice(offset, offset + chunkSize);
    }
}