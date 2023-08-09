<style>
    .foy-custom-searchform #searchform{
        display: flex;
        align-items: center;
        background: #fff;
    }
    #searchdiv span {
        margin: 0 !important;
        display: inline !important;
    }
    #searchdiv {
        padding-top: 40px !important;
    }
    /* for ajax search */
    .foy-suggestion-box, .foy-suggestion-box-1, .foy-suggestion-box-2 {
        position: absolute;
        background: #ffffff;
        max-width: 600px !important;
        width: 100%;
        padding: 15px;
        border-radius: 8px;
        box-shadow: rgb(0 0 0 / 16%) 0px 1px 4px;
        display: none;
        z-index: 999999;
    }
    /*.foy-suggestion-box{*/
    /*    height: 100%;*/
    /*    overflow: auto;*/
    /*}*/
    .foy-suggestion-box-1{
        top: 200px;
        left: 50%;
        transform: translateX(-50%);
    }

    .foy-suggestion-box-1 {
        max-width: 370px !important;
        width: 100% !important;
    }

    .foy-course-list img, .foy-course-list-1 img, .foy-course-list-2 img {
        height: 45px;
        width: 60px;
        border-radius: 3px;
        margin-right: 5px;
    }

    .foy-suggestion-box hr, .foy-suggestion-box-1 hr, .foy-suggestion-box-2 hr {
        margin-top: 10px !important;
        margin-bottom: 10px !important;
    }

    .foy-suggestion-box hr:last-child,  .foy-suggestion-box-1 hr:last-child, .foy-suggestion-box-2 hr:last-child {
        display: none;
    }

    #foy-loading, #foy-loading-1, #foy-loading-2 {
        display: none;
        background: #ffffff;
        padding: 3px 5px 3px 5px;
    }

    #foy-loading0-1 img, #foy-loading0-2 img {
        height: 17px;
        width: 20px;
    }
    #foy-loading img {
        height: 40px;
        width: 40px;
    }


    .foy-suggestion-box h3, .foy-suggestion-box-1 h3, .foy-suggestion-box-2 h3 {
        margin: 0px;
        font-size: 12px;
    }
    .foy-course-list a {
        padding: 0px !important;
        font-size: 14px;
        line-height: 22px;
    }
    .foy-course-list ul#menu-main-menu li a {
        padding: 0px !important;
    }
    .foy-course-list {
        align-items: center;
        display: flex;
        justify-content: start;
    }

</style>
<script>
    function foyFunction01() {
        jQuery('#foy-suggestion-box').css('display', 'none');
        // Add the suggestion box below the form

        jQuery('#foy-loading-1').css('display', 'block');
        const input_1 = document.querySelector('.home-hero-search #searchform input[name="s"]');

        var keyword_1 = input_1.value;
        if (keyword_1.length < 4) {
            jQuery('#foy-suggestion-box-1').html("");
            jQuery('#foy-suggestion-box-1').css('display', 'none');
            jQuery('#foy-loading-1').css('display', 'none');
        }
        else {
            jQuery.ajax({
                url: ajaxurl,
                //url: "/janets/wp-admin/admin-ajax.php",
                type: 'get',
                data: {
                    action: 'data_fetch',
                    keyword: keyword_1
                },
                success: function(data) {
                    console.log(data);
                    jQuery('#foy-suggestion-box-1').html(data);
                    jQuery('#foy-suggestion-box-1').css('display', 'block');
                    jQuery('#foy-loading-1').css('display', 'none');
                }
            });
        }
    }
    const navSearch_1 = document.querySelector('#searchform');

    navSearch_1.insertAdjacentHTML('afterend', '<div class="foy-suggestion-box-1" id="foy-suggestion-box-1"><!-- course suggestion --></div>');

    // Get the input element
    const input_1 = document.querySelector('#searchform');

    const spinner_1 = document.createElement('div');
    spinner_1.id = 'foy-loading-1';
    spinner_1.className = 'spinner-border';
    spinner_1.setAttribute('role', 'status');
    spinner_1.innerHTML = '<img src="https://coursegate.co.uk/wp-content/uploads/2023/06/loader.gif" alt="search loader">';
    input_1.after(spinner_1);
    // Add the event listener
    input_1.addEventListener('keyup', foyFunction01);
</script>




<script type="text/javascript">
    function foyFunction2() {
        jQuery('#foy-suggestion-box').css('display', 'none');
        jQuery('#foy-suggestion-box-1').css('display', 'none');
        jQuery('#foy-loading-2').css('display', 'block');
        const input_2 = document.querySelector('#searchform input[name="s"]');
        var keyword_2 = input_2.value;
        if (keyword_2.length < 4) {
            jQuery('#foy-suggestion-box-2').html("");
            jQuery('#foy-suggestion-box-2').css('display', 'none');
            jQuery('#foy-loading-2').css('display', 'none');
        }
        else {
            jQuery.ajax({
                url: ajaxurl,
                //url: "/janets/wp-admin/admin-ajax.php",
                type: 'get',
                data: {
                    action: 'data_fetch',
                    keyword: keyword_2
                },
                success: function(data) {
                    jQuery('#foy-suggestion-box-2').html(data);
                    jQuery('#foy-suggestion-box-2').css('display', 'block');
                    jQuery('#foy-loading-2').css('display', 'none');
                }
            });
        }
    }
    // Add the suggestion box below the form
    const navSearch_2 = document.querySelector('#searchform');
    navSearch_2.insertAdjacentHTML('beforeend', '<div class="foy-suggestion-box-2" id="foy-suggestion-box-2"><!-- course suggestion --></div>');

    // Get the input element
    const input_2 = document.querySelector('#searchform input[name="s"]');
    const spinner_2 = document.createElement('div');
    spinner_2.id = 'foy-loading-2';
    spinner_2.className = 'spinner-border';
    spinner_2.innerHTML = '<img src="https://coursegate.co.uk/wp-content/uploads/2023/06/loader.gif" alt="search loader">';
    input_2.after(spinner_2);

    // Add the event listener
    input_2.addEventListener('keyup', foyFunction2);
</script>


<script type="text/javascript">
    function foyFunction() {
        // jQuery('#foy-suggestion-box').css('display', 'none');
        jQuery('#foy-loading').css('display', 'block');
        const input = document.querySelector('.foy-custom-searchform input[name="s"]');
        var keyword = input.value;
        if (keyword.length < 4) {
            jQuery('#foy-suggestion-box').html("");
            jQuery('#foy-suggestion-box').css('display', 'none');
            jQuery('#foy-loading').css('display', 'none');
        }
        else {
            jQuery.ajax({
                url: ajaxurl,
                //url: "/janets/wp-admin/admin-ajax.php",
                type: 'get',
                data: {
                    action: 'data_fetch',
                    keyword: keyword
                },
                success: function(data) {
                    jQuery('#foy-suggestion-box').html(data);
                    jQuery('#foy-suggestion-box').css('display', 'block');
                    jQuery('#foy-loading').css('display', 'none');
                }
            });
        }
    }
    // Add the suggestion box below the form
    const navSearch = document.querySelector('.foy-custom-searchform');
    console.log(navSearch);

    navSearch.insertAdjacentHTML('beforeend', '<div class="foy-suggestion-box" id="foy-suggestion-box"><!-- course suggestion --></div>');

    // Get the input element
    const input = document.querySelector('.foy-custom-searchform input[name="s"]');
    const spinner = document.createElement('div');
    spinner.id = 'foy-loading';
    spinner.className = 'spinner-border';
    spinner.setAttribute('role', 'status');
    spinner.innerHTML = '<img src="https://coursegate.co.uk/wp-content/uploads/2023/06/loader.gif" alt="search loader">';
    input.after(spinner);

    // Add the event listener
    input.addEventListener('keyup', foyFunction);
</script>
