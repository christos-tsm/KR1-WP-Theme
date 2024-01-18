jQuery(document).ready(function ($) {
    function fetchProjects(taxonomy, action, page = 1) {
        $.ajax({
            url: scriptVars.ajaxurl,
            type: 'post',
            data: {
                action: action,
                taxonomy: taxonomy,
                page: page
            },
            success: function (result) {
                $('.projects-grid').html(result);
                $('#pagination-container').html($(result).find('.pagination'));
            }
        });
    }

    $('.filters__item--projects').click(function () {
        var taxonomy = $(this).data('taxonomy');
        $('.filters__item').removeClass('active');
        $(this).addClass('active');
        fetchProjects(taxonomy, 'filter_projects');
    });

    $('.filters__item--posts').click(function () {
        var taxonomy = $(this).data('taxonomy');
        $('.filters__item').removeClass('active');
        $(this).addClass('active');
        fetchProjects(taxonomy, 'filter_posts');
    });

});
