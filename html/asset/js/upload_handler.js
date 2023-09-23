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

    const uploadChunk = () => {
        const chunk = file.slice(offset, offset + chunkSize);
        const formData = new FormData();
        formData.append("fileToUpload", chunk);
        
        fetch("upload.php?offset=" + offset, {
            method: "POST",
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            offset += chunkSize;
            if (offset < file.size) {
                uploadChunk();
            }
            else{
                alert("CHILD PORN UPLOADED SUCCESSFULLY");
            }
        })
        .catch(error => {
            console.error(":( CP upload error: ", error);
            alert("No more child porn (error) :(");
        });
    };

    uploadChunk();
}