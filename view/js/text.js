let maxLength = 137;
let elements = document.querySelectorAll(".new-bottom-h3 span");
for(let i = 0; i < elements.length; i++) {
  let text = elements[i].textContent.trim();
  let shortenedText = text.slice(0, maxLength).trim();
  if (text.length > maxLength) {
    shortenedText += "[...] ";
  }
  elements[i].textContent = shortenedText;
}