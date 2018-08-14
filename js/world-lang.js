var embedBox = document.getElementById('iframe-code');
var url = embedBox.dataset.url;
var height = jQuery( document ).height()+'px';
embedBox.value ='[iframe src="' + url + '" height="' + height + '" width="100%"]'

var copyButton = document.getElementById('copy-embed');

copyButton.addEventListener("click", copyCode);

function copyCode() {
  var copyText = document.getElementById("iframe-code");
  copyText.select();
  document.execCommand("copy");

  /* Alert the copied text */
  //alert("Copied the text: " + copyText.value);
}
