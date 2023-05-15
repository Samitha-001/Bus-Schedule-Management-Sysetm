function downloadFile(url, filename) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4) {
        if (xhr.status === 200) {
          var blob = new Blob([xhr.response], {type: xhr.getResponseHeader('Content-Type')});
          var link = document.createElement('a');
          link.href = window.URL.createObjectURL(blob);
          link.download = filename;
          link.click();
        } else {
          console.error('Error downloading file: ' + xhr.statusText);
        }
      }
    };
    xhr.open('GET', url);
    xhr.responseType = 'arraybuffer';
    xhr.send();
  }
  