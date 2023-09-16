document.getElementById('languageSelect').addEventListener('change', function() {
    var language = this.value; // Get the selected language
  
    // Get the element you want to translate
    var elementToTranslate = document.getElementById('myText');
  
    // Get the translation for the selected language
    var translation = elementToTranslate.getAttribute('data-' + language);
  
    if (translation) {
      // Change the text content to the translation
      elementToTranslate.textContent = translation;
    }
  });
  