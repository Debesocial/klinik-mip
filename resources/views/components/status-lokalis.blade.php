<style>
    #zoom {
        border: 1px black solid;
        box-shadow: 5px 5px 10px #1e1e1e;
        background-color: grey;
        z-index: 99999;
    }
</style>
<div>
    <div class="row justify-content-center mb-2">
        <input type="hidden" name="titik_lokalis" id="titik_lokalis">
        <div class="col-6 text-center">
            @if ($form)
            <button type="button" class="btn btn-sm btn-outline-secondary mb-1" onclick="removeMarks()">
                <b>Undo <i class="bi bi-arrow-counterclockwise"></i></b>
            </button>
            @endif
            <div class="input-group">
                <canvas id="myCanvas" style="cursor: pointer"></canvas>
                <canvas class="rounded-circle" id="zoom" width="100" height="100"
                    style="position:absolute; top:0; left:0; display:none"></canvas>

            </div>
        </div>
        @if ($form)
        <div class="col-6">
            <label for="" class="form-label">Status Lokalis <b class="text-danger">*</b></label>
            <div class="input-group">
                {{-- <img src="{{ asset('assets/images/body.png') }}" alt="" id="sourceImage" style="display: none;"> --}}
                <textarea type="number" name="status_lokalis" id="status_lokalis" rows="5" class="form-control"
                    placeholder="Masukkan status lokalis">Dalam batas normal</textarea>
                {!! validasi('Status lokalis') !!}
            </div>
        </div>
            
        @endif
    </div>
</div>
<script>
    // Array untuk menyimpan tanda-tanda yang sudah ada
    var marks = {!! $titik !!};
    var canvas = document.getElementById("myCanvas");
    var ctx = canvas.getContext("2d");
    // const img = document.getElementById("sourceImage");

    var img = new Image();
    img.src = "{{ asset('assets/images/body.png') }}";
    var width = 0;
    var height = 0;
    img.onload = drawImageOnCanvas;
    // Fungsi untuk menggambar gambar di kanvas
    function drawImageOnCanvas() {
        width = img.width / 2;
         height = img.height / 2;
   
        canvas.width = width;
        canvas.height = height;
        ctx.drawImage(img, 0, 0, width, height);
        // ctx.drawImage(img, 0, 0);

        // Menggambar kembali semua tanda yang sudah ada
        marks.forEach((mark) => {
            drawMark(ctx, mark.x, mark.y);
        });
    }

    // Fungsi untuk menggambar tanda silang di kanvas
    function drawMark(context, x, y, zoom = false, color = 'blue') {
        context.beginPath();
        const size = 5; // Ukuran tanda silang
        context.moveTo(x - size, y - size);
        context.lineTo(x + size, y + size);
        context.moveTo(x + size, y - size);
        context.lineTo(x - size, y + size);
        context.strokeStyle = color;
        context.lineWidth = 3;
        context.stroke();
        context.closePath();
    }

    
</script>
@if ($form)
    <script>
        function removeMarks() {
        marks.pop();
        drawImageOnCanvas();
    }


    // Fungsi untuk mendapatkan koordinat saat kanvas diklik
    function getCoordinates(event) {
        const canvas = document.getElementById("myCanvas");
        const rect = canvas.getBoundingClientRect();
        const x = event.clientX - rect.left;
        const y = event.clientY - rect.top;
        const ctx = canvas.getContext("2d");

        // Menggambar gambar kembali untuk mengembalikan gambar asli dan tanda-tanda yang sudah ada
        drawImageOnCanvas();

        // Menggambar tanda silang di titik yang diklik
        drawMark(ctx, x, y);

        // Menyimpan koordinat
        marks.push({
            x: x,
            y: y
        });
        $('#titik_lokalis').val(JSON.stringify(marks));
    }

    // Memanggil fungsi untuk menggambar gambar saat halaman dimuat
    // window.onload = drawImageOnCanvas;

    // Menambahkan event listener untuk menghandle klik pada kanvas

    canvas.addEventListener("click", getCoordinates);

    var zoom = document.getElementById("zoom");
    var zoomCtx = zoom.getContext("2d");
    canvas.addEventListener("mousemove", function(e) {
        // console.log(e);
        const rect = canvas.getBoundingClientRect();
        zoomCtx.clearRect(0, 0, canvas.width, canvas.height);
        zoomCtx.drawImage(img, (e.layerX - 25) * 2, (e.layerY - 25) * 2, width * 2, height * 2, 0, 0,
            width * 2,
            height *
            2);
        drawMark(zoomCtx, 50, 50, true, 'green');
        zoom.style.top = e.clientY - rect.top + 10 + "px"
        zoom.style.left = e.clientX - rect.left + 10 + "px"
        zoom.style.display = "block";
    });

    canvas.addEventListener("mouseout", function() {
        zoom.style.display = "none";
    });
    </script>
@endif
