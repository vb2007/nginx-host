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
    let offset = 0; //ez a változó figyeli, hogy jelenleg hogy halad a fájl feltöltése

    //minden fájlrész feltöltését kezeli
    const uploadChunk = () => {
        const chunk = file.slice(offset, offset + chunkSize);
        const formData = new FormData();
        formData.append("fileToUpload", chunk);
        
        //post kérelmet küld a jelenlegi feltöltési érékkkel
        fetch("upload.php?offset=" + offset, {
            method: "POST",
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            //hozzáadja az offsethez a hátralévő adatmennyiséget
            offset += chunkSize;
            //majd addig ismétli a feltöltést, amíg van adat a fájlban
            if (offset < file.size) {
                uploadChunk();
            }
            else{
                alert("File uploaded successfully.");
            }
        })
        //hibák kiírása
        .catch(error => {
            console.error("File upload error: ", error);
            alert("There was an error uploading your file.");
        });
    };

    uploadChunk();
}