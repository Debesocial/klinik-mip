<html>
    <head>
        <style>
           @page {
                margin-left :2cm;
                margin-right: 2cm;
            }
            img {
                height: 80px;
                width: auto
            }
        
            .m-0 {
                margin: 0;
            }
        
            h2 {
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
        
            tr.border_bottom td {
                padding-bottom: 10px;
            }
        
            .row {
                display: flex;
                flex-wrap: wrap;
            }
             
            body {
                font-family: 'sans-serif';
                
            }
            .bg-red{
                color:  rgba(220, 20, 60,1);
            }
            .bg-blue{
                color:  blue;

            }
            header { position: fixed; top: 0; left: 0px; right: 0px; border-bottom: 1px solid black;}
            footer { position: fixed; bottom: 0; left: 0px; right: 0px; }
            main { position: fixed; top:100px ; font-size: 14px; line-height: 1.5; padding-top: 10px; width: 100%;}
        </style>
    </head>
    <body>
        <header >
            <table >
                <tbody>
                    <tr class="border_bottom" >
                        <td style="padding-left:20px;"><img src="{{ imgUri(base_path('public/logo/2.png')) }}"
                                alt="">
                        </td>
                        <td style="padding-left: 20px;">
                            <div >
                                <h2 >PT. Mandiri Inti Perkasa</h2>
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
        
        <main >
            @yield('body-surat')
        </main>
        <footer>
            <div class="row">
                <table class="w100">
                    <tr>
                        <td style="font-size:12px">( @yield('no_surat') )</td>
                        <td class="text-end" style="font-size:12px">No.Revisi: @yield('no_revisi')</td>
                    </tr>
                </table>
            </div>
        </footer>
    </body>
</html>

