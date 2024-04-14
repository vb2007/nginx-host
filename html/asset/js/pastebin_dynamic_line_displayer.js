const textarea = document.getElementById("paste");
const lineNumbers = document.querySelector(".line-numbering .line-number");

function updateLineNumbers() {
    const lines = textarea.value.split("\n");
    let lineNumberContent = "";

    for (let i = 1; i <= lines.lenght; i++) {
        lineNumberContent += "${i}\n";
    }
    lineNumbers.textContent = lineNumberContent;
}

updateLineNumbers();

textarea.addEventListener("input", updateLineNumbers);