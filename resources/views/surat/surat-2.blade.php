<html>
    <head>
        <style>
           @page {
                margin-left :2cm;
                margin-right: 2cm;
                margin-top: 0.5cm;
            }
            img {
                height: 40px;
                width: auto
            }
        
            .m-0 {
                margin: 0;
            }
        
            h3 {
                margin-bottom: 0.1rem;
                margin-top: 0;
                color: midnightblue;
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
        
            /* tr.border_bottom td {
                padding-bottom: 10px;
            } */
        
            .row {
                display: flex;
                flex-wrap: wrap;
            }
             
            body {
                font-family: 'sans-serif';
            }
        </style>
    </head>
    <body>
        <header >
            <table >
                <tbody>
                    <tr class="border_bottom" >
                        <td style="padding-left:20px;"><img src="{{ imgUri(realpath('logo\2.png')) }}"
                                alt="">
                        </td>
                        <td style="padding-left: 20px;">
                            <div >
                                <h3 >PT. Mandiri Inti Perkasa</h3>
                                <p class="m-0" style="font-size:14px">Site Lagub, Kecamatan Sembakung, Kab. Nunukan Provinsi Kalimantan Utara</p>
                                <small style="font-size:12px">
                                    email: mip-site@mandirigroup.net
                                </small>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </header>
        
        <main style="font-size:14px">
            @yield('body-surat')
        </main>
        <footer style="margin-top:0">
            <div class="row">
                <table class="w100">
                    <tr>
                        <td width=30% style="font-size:12px">( @yield('no_surat') )</td>
                        <td width=30% class="text-end" style="font-size:12px">No.Revisi: @yield('no_revisi')</td>
                        <td width=30%> </td>
                    </tr>
                </table>
            </div>
        </footer>
        <div style="border-bottom: 3px dotted black; margin-bottom: 5px; margin-top: 5px;"></div>
        <header >
            <table >
                <tbody>
                    <tr class="border_bottom" >
                        <td style="padding-left:20px;"><img src="{{ imgUri(realpath('logo\2.png')) }}"
                                alt="">
                        </td>
                        <td style="padding-left: 20px;">
                            <div >
                                <h3 >PT. Mandiri Inti Perkasa</h3>
                                <p class="m-0" style="font-size:14px">Site Lagub, Kecamatan Sembakung, Kab. Nunukan Provinsi Kalimantan Utara</p>
                                <small style="font-size:12px">
                                    email: mip-site@mandirigroup.net
                                </small>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </header>
        
        <main style="font-size:14px">
            @yield('body-surat')
        </main>
        <footer style="margin-top:0">
            <div class="row">
                <table class="w100">
                    <tr>
                        <td width=30% style="font-size:12px">( @yield('no_surat') )</td>
                        <td width=30% class="text-end" style="font-size:12px">No.Revisi: @yield('no_revisi')</td>
                        <td width=30%> </td>
                    </tr>
                </table>
            </div>
        </footer>
    </body>
</html>

