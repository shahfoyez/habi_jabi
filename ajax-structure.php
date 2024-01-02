<script>
    jQuery(document).ready(function ($) {
        function sendAjaxRequest(page, filters) {
            var data = {
                action: 'get_courses_ajax',
                page: page,
                filters: filters,
            };
            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: data,
                beforeSend: function() {

                },
                success: function(response) {
                    console.log(response);
                },
                complete: function() {
                   
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('AJAX Error:', textStatus, errorThrown);
                }
            });
        }
        // Event listener for radio buttons and pagination
        $(document).on('click', '.foy-allcourse-pagination', function (e) {
            sendAjaxRequest(page, selectedFilters);
        });
    });
</script>
