<div class="input-group rounded-pill mb-3">
    <span class="input-group-text bg-transparent border-0 rounded-pill" id="search-addon">
        <i class="fas fa-search"></i>
    </span>
    <input type="text" id="cari_penyakit" class="form-control rounded-pill" placeholder="Cari penyakit"
        onkeyup="cariPenyakit(this)" aria-label="Search" aria-describedby="search-addon" autofocus>
</div>
<div class="container-lg vh-100 " id="list-penyakit">

</div>


<script>
    function cariPenyakit(field) {
        let val = $(field).val();
        let url = '/cari-penyakit';
        $.ajax({
            type: "get",
            url: url,
            data: {
                keyword: val
            },
            dataType: "json",
            beforeSend: function() {
                html = `<div class="text-center my-5">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                        </div></div>`;
                $('#list-penyakit').html(html);
            },
            success: function(data) {
                let html = ``;
                if (data.code == 404) {
                    html =
                        `<div class="my-5 text-center"><h3 class="text-secondary">${data.msg}</h3></div>`;
                } else if (data.code == 200) {
                    data.data.forEach(d => {
                        html += `<div class="card bg-body" style="cursor:pointer" onclick='addPenyakit(${JSON.stringify(d)})'>
                            <div class="card-body">
                                <h5>${d.primer}</h5>
                                <ul>
                                    <li>
                                        Blok : ${d.sub_klasifikasi.nama_penyakit} 
                                    </li>
                                    <li>
                                        Category : ${d.category.nama_penyakit}
                                    </li>
                                    <li>
                                        Chapter : ${d.sub_klasifikasi.klasifikasi_penyakit?.klasifikasi_penyakit??'-'}
                                    </li>
                                    <li>
                                        Pengertian : <b>${d.pengertian}</b>
                                    </li>
                                </ul>
                            </div>
                        </div>`;
                    });
                }
                $('#list-penyakit').html(html)
            }
        });
    }
</script>
