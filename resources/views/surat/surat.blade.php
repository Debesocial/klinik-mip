<style>
    img {
        width: 100px
    }

    .m-0 {
        margin: 0;
    }

    h2 {
        margin-bottom: 0.1rem;
    }

    .w100 {
        width: 100%;
        height: auto;
    }

    .col {
        flex: 1 0 0%;
    }

    .text-end {
        text-align: right;
    }

    .text-start {
        text-align: left;
    }

    .text-center {
        text-align: center;
    }

    tr.border_bottom td {
        border-bottom: 1px solid black;
        padding-bottom: 10px
    }

    .row {
        display: flex;
        flex-wrap: wrap;
    }
</style>
<table style="border-collapse: collapse;">
    <tbody>
        <tr class="border_bottom">
            <td style="white-space: nowrap; width:1%"><img src="{{ imgUri(base_path('public\logo\1.png')) }}"
                    alt="">
            </td>
            <td style="padding-left: 50px">
                <h2>PT. Mandiri Inti Perkasa</h2>
                <p class="m-0">
                    <small>Site Lagub, Kecamatan Sembakung, Kab. Nunukan Provinsi Kalimantan Utara </small>
                </p>
                <small>
                    email: mip-site@mandirigroup.net
                </small>
            </td>
        </tr>
        <tr>
            <td class="w100" style="padding-left: 20px" colspan="2">@yield('body-surat')</td>
        </tr>
    </tbody>
</table>
