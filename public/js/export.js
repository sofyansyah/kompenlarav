$(function () 
    {
        var kar = $('.pcr_karyawan');
        var table_html = $('.pcr_karyawan')[0].outerHTML;
        var css_html = '<style>.export, .text-center, .text-left {border: 1pt solid #333} </style>';
        $("#btnExport").click(function(e) 
        {
            e.preventDefault();
            window.open('data:application/vnd.ms-excel,' + 
                encodeURIComponent('<html><head>' + css_html + '</' + 'head><body>' + table_html + '</body></html>'));
        });
    });