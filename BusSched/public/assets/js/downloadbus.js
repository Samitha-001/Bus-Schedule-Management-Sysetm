        document.getElementById("downloadBtn").addEventListener("click", function() {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "schedulebus.view.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var link = document.createElement("a");
                    link.href = "data:text/csv;charset=utf-8," + encodeURIComponent(xhr.responseText);
                    link.download = "buses.csv";
                    link.style.display = "none";
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                }
            };
            xhr.send("download=true");
            console.log(xhr);
        });