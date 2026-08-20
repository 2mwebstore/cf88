<style>
    .grid-3-footer {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 3px;
        padding: 10px;
    }
    @media screen and (max-width: 1000px) {
        .name_bank{
            font-size: 15px!important;
        }
        .grid-3-footer {
            padding: 5px !important; 
        }
        .grid-3-footer a img{
            width: 25px !important;
        }
    }
    @media screen and (max-width: 900px) {
        .name_bank{
            font-size: 14px!important;
        }
        .grid-3-footer {
            padding: 5px !important; 
        }
        .grid-3-footer a img{
            width: 24px !important;
        }
    }
    @media screen and (max-width: 800px) {
        .name_bank{
            font-size: 13px!important;
        }
        .grid-3-footer {
            padding: 5px !important; 
        }
        .grid-3-footer a img{
            width: 23px !important;
        }
    }
    @media screen and (max-width: 700px) {
        .name_bank{
            font-size: 12px!important;
        }
        .grid-3-footer {
            padding: 5px !important; 
        }
        .grid-3-footer a img{
            width: 22px !important;
        }
    }
    @media screen and (max-width: 600px) {
        .name_bank{
            font-size: 11px!important;
        }
        .grid-3-footer {
            padding: 5px !important; 
        }
        .grid-3-footer a img{
            width: 21px !important;
        }
    }
    @media screen and (max-width: 500px) {
        .name_bank{
            font-size: 10px!important;
        }
        .grid-3-footer {
            padding: 5px !important; 
        }
        .grid-3-footer a img{
            width: 20px !important;
        }
    }
    @media screen and (max-width: 400px) {
        .name_bank{
            font-size: 9px!important;
        }
        .grid-3-footer {
            padding: 5px !important; 
        }
        .grid-3-footer a img{
            width: 17px !important;
        }
    }
    .mt-2-footer {
        margin-top: .5rem 
    }
    @media screen and (max-width: 777px) {
        .mt-2-footer {
            margin-top: 50px ; 
        }
    }
    .mt-2-footer{
        min-width: 100%;
        position: absolute;
        text-align: center;
        left: 0;
    }
</style>
<div class=" bg-color-brand mt-2-footer "  style="align-items: center;">
    <a class="text-white name_bank">  © 2024 @lang('home.copyright')</a>
</div>
{{-- <script>
        $.ajax({
            url: '/api/footer',
            type: 'GET',
            success: function(response) {
                if (response.length != 0) {
                    const GridFooter = document.querySelector('.grid-3-footer');
                    let htmlContent = '';
                            response.forEach(function(footer) {
                                    htmlContent += '<div>';
                                        htmlContent += '<a href="'+footer.link+'" class="text-white">';
                                            htmlContent += '<img src="/upload/'+footer.photo+'" style="width: 25px;">';
                                        htmlContent += '</a>';
                                    htmlContent += '</div>';
                            });
                    GridFooter.innerHTML += htmlContent;
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
</script> --}}