<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Whatsapp Notifikasi Mikrotik</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Whatsapp Notifikasi Mikrotik</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Generate Data</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <input type="hidden" id="api_key" class="form-control" value="c3jPNCxC2YS0NBuMZC4d1kzGpriqty" readonly>
                        <div class="mb-3">
                            <label for="sender" class="form-label">Sender</label>
                            <input type="text" id="sender" class="form-control" value="62816202021" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="number" class="form-label">Whatsapp Penerima</label>
                            <input type="number" id="number" class="form-control">
                        </div>
                       <div class="mb-3">
                            <label for="ipaddress" class="form-label">IP Address</label>
                            <input type="text" id="ipaddress" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Nama Pelanggan</label>
                            <input type="text" id="message" class="form-control" value"aaa">
                        </div>
                        <button id="generateBtn" class="btn btn-primary">Generate</button>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <label for="generatedUrl" class="form-label">Pastekan di (Status Up) Netwatch</label>
                        <div class="input-group mb-3">
                            <textarea id="generatedUrl" class="form-control" rows="4"></textarea>
                            <button class="btn btn-primary" id="copyBtn">Copy</button>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col-md-6">
                
            </div>
        </div>
    </div>

    <footer class="bg-light text-center p-3 mt-4">
        <strong>Semar Intermedia Net &copy; 2023</strong>
    </footer>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JavaScript -->
    <script>
        $(document).ready(function() {
           $("#generateBtn").click(function() {
            var api_key = $("#api_key").val();
            var sender = $("#sender").val();
            var number = $("#number").val();
            var message = $("#message").val();
            var ipaddress = $("#ipaddress").val();
        
            // Perform validation here
            if (!api_key || !sender || !number || !message || !ipaddress) {
                alert("Please fill out all fields.");
                return;
            }
        
            var encodedMessage = encodeURIComponent("*" + message + "*");
            
            var url = '/tool netwatch add host="' + encodeURIComponent(ipaddress) + '" comment="' + message + '" disabled=no down-script=\x22:local\x20id\x20[/system\x20identity\x20get\x20name]\x5cr\x5c\x20\x20\x20\x20\x20\x20\x5cn:local\x20dat\x20[/system\x20clock\x20get\x20date]\x5cr\x5c\x20\x20\x20\x20\x20\x20\x5cn:local\x20clk\x20[/system\x20clock\x20get\x20time]\x5cr\x5c\x20\x20\x20\x20\x20\x20\x5cn:local\x20hst\x20\x5c$host\x5cr\x5c\x20\x20\x20\x20\x20\x20\x5cn:local\x20cmnt\x20[/tool\x20netwatch\x20get\x20value-name=comment\x20[find\x20host=\x5c$hst]\x20comment]\x5cr\x5c\x20\x20\x20\x20\x20\x20\x5cn/tool fetch url=\x5c\x22https://wa.pusatdata.xyz/send-message\x5c?api_key=' + encodeURIComponent(api_key) + '&sender=' + encodeURIComponent(sender) + '&number=' + encodeURIComponent(number) + '&message=' + encodedMessage + '%0AIP%20Address%20:%20\x5c$host%0AStatus%20DOWN%20%E2%9D%8C\x5c\x22 keep-result=no" up-script=\x22:local\x20id\x20[/system\x20identity\x20get\x20name]\x5cr\x5c\x20\x20\x20\x20\x20\x20\x5cn:local\x20dat\x20[/system\x20clock\x20get\x20date]\x5cr\x5c\x20\x20\x20\x20\x20\x20\x5cn:local\x20clk\x20[/system\x20clock\x20get\x20time]\x5cr\x5c\x20\x20\x20\x20\x20\x20\x5cn:local\x20hst\x20\x5c$host\x5cr\x5c\x20\x20\x20\x20\x20\x20\x5cn:local\x20cmnt\x20[/tool\x20netwatch\x20get\x20value-name=comment\x20[find\x20host=\x5c$hst]\x20comment]\x5cr\x5c\x20\x20\x20\x20\x20\x20\x5cn/tool fetch url=\x5c\x22https://wa.pusatdata.xyz/send-message\x5c?api_key=' + encodeURIComponent(api_key) + '&sender=' + encodeURIComponent(sender) + '&number=' + encodeURIComponent(number) + '&message=' + encodedMessage + '%0AIP%20Address%20:%20\x5c$host%0AStatus%20UP%20%E2%9C%85\x5c\x22 keep-result=no"';
            
            $("#generatedUrl").val(url);
        });





            $("#copyBtn").click(function() {
                var generatedUrl = $("#generatedUrl");
                generatedUrl.select();
                document.execCommand("copy");
            });
            
            // Mencegah penggunaan tombol Ctrl+U
            document.addEventListener('keydown', function(event) {
                if (event.ctrlKey && (event.key === 'u' || event.key === 'U')) {
                    event.preventDefault();
                    console.log('Penggunaan tombol Ctrl+U tidak diizinkan.');
                }
            });
            
            // Mencegah penggunaan tombol Ctrl+S
            document.addEventListener('keydown', function(event) {
                if (event.ctrlKey && (event.key === 's' || event.key === 'S')) {
                    event.preventDefault();
                    console.log('Penggunaan tombol Ctrl+S tidak diizinkan.');
                }
            });
            
            // Mencegah klik kanan
            document.addEventListener('contextmenu', function(event) {
                event.preventDefault();
                console.log('Klik kanan tidak diizinkan.');
            });
            
            // Convert input text to uppercase
            $("#message").on("input", function() {
                var capitalizedText = $(this).val().toUpperCase();
                $(this).val(capitalizedText);
            });

        });
    </script>
</body>
</html>
