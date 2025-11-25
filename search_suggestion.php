     <style>
                /* for ajax search */
                .foy-suggestion-box {
                  position: absolute;
                  background: #ffffff;
                  max-width: 345px !important;
                  width: 100%;
                  padding: 15px;
                  border-radius: 8px;
                  box-shadow: rgb(0 0 0 / 16%) 0px 1px 4px;
                  display: none;
                  z-index: 999999;
                }

                .foy-search-suggestion .foy-course-list img {
                  height: 45px;
                  width: 60px;
                  border-radius: 3px;
                  margin-right: 5px;
                }

                .foy-suggestion-box hr {
                  margin-top: 10px !important;
                  margin-bottom: 10px !important;
                }

                .foy-suggestion-box hr:last-child {
                  display: none;
                }

                #foy-loading {
                  display: none;
                  background: transparent;
                  padding: 0;
                  position: absolute;
                  right: 4%;
                  top: 50%;
                  transform: translateY(-50%);
                }

                #foy-loading img {
                  height: 30px;
                  width: 30px;
                }

                .foy-suggestion-box h3 {
                  margin: 0px;
                  font-size: 12px;
                }

                #foy-search-suggestion .foy-course-list a {
                  padding: 0px !important;
                  font-size: 14px;
                  line-height: 22px;
                }

                #foy-search-suggestion .foy-course-list ul#menu-main-menu li a {
                  padding: 0px !important;
                }

                #foy-search-suggestion .foy-course-list {
                  align-items: center;
                  display: flex;
                  justify-content: start;
                }

                .search-highlight {
                  color: rgb(255, 107, 129);
                }

                .foy-search-cat {
                  align-items: center;
                  display: flex;
                  justify-content: start;
                  gap: 10px;
                  s
                }
              </style>
              <div class="header__search-input">
                <div class="search-container" id="foy-search-suggestion">
                  <form method="GET" action="<?php echo get_site_url(); ?>" id="header-search-form">
                    <input type="text" name="s" placeholder="Search Courses ..." class="autocomplete_field"
                      id="autoCompleteOne" value="" autocomplete="off">
                    <input type="hidden" name="post_type" value="course">
                    <button type="submit" id="search_iconOne" class="btn btn-warning btn-fla" aria-label="Search">
                      <span class="fa fa-search" style="pointer-events: none;"></span>
                    </button>
                  </form>
                </div>
              </div>
              <script type="text/javascript">
                jQuery(document).ready(function ($) {
                  function foyFunction() {
                    const navSearch = $(this).closest('#foy-search-suggestion');
                    const suggestionBox = navSearch.find('.foy-suggestion-box');
                    let loader = navSearch.find('#foy-loading');
                    const keyword = $(this).val();
                    if (keyword.length < 4) {
                      if (suggestionBox) {
                        suggestionBox.remove();
                      }
                      if (loader) {
                        loader.remove();
                      }
                    } else {
                      if (!suggestionBox.length) {
                        navSearch.append(
                          '<div class="foy-suggestion-box" id="foy-suggestion-box"><!-- course suggestion --></div>'
                        );
                      }
                      if (!loader.length) {
                        const input = navSearch.find('input[name="s"]');
                        loader = $('<div>', {
                          id: 'foy-loading',
                          class: 'spinner-border',
                          role: 'status'
                        })
                          .html(
                            '<img src="https://www.johnacademy.co.uk/wp-content/uploads/2024/04/loader-3.webp" alt="search loader">'
                          );
                        input.after(loader);
                      }
                      loader.show();
                      $.ajax({
                        url: ajaxurl,
                        type: 'get',
                        data: {
                          action: 'data_fetch',
                          keyword: keyword
                        },
                        success: function (data) {
                          const suggestionBox = navSearch.find(
                            '.foy-suggestion-box');
                          suggestionBox.html(data).show();
                          loader.hide();
                        }
                      });
                    }
                  }
                  $('#foy-search-suggestion input[name="s"]').on('keyup', foyFunction);
                });
                document.addEventListener('click', function (event) {
                  var suggestionBox = document.querySelector('.foy-suggestion-box');
                  if (suggestionBox) {
                    let loader = document.querySelector('#foy-loading');
                    var isClickedInside = suggestionBox.contains(event.target);
                    if (!isClickedInside) {
                      suggestionBox.remove();
                      if (loader) {
                        loader.remove();
                      }
                    }
                  }
                });
              </script>




       // Search Suggestion

            function data_fetch()
            {
                $keyword = sanitize_text_field($_REQUEST['keyword']);
                $categories = get_terms(
                    array(
                        'taxonomy' => 'course-cat',
                        'name__like' => $keyword,
                    )
                );
                function title_filter($where, &$wp_query)
                {
                    global $wpdb;
                    if ($search_term = $wp_query->get('search_prod_title')) {
                        $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'%' . esc_sql($wpdb->esc_like($search_term)) . '%\'';
                    }
                    return $where;
                }
                $args = array(
                    'post_status' => 'publish',
                    'post_type' => 'course',
                    'orderby' => 'meta_value_num',
                    // 1. define a custom query variable here to pass your term through
                    'search_prod_title' => $keyword,
                    'meta_query' => array(
                        array(
                            // 'key' => 'average_rating',
                            'key' => 'vibe_students',
                        ),
                        array(
                            'key' => 'vibe_product',
                            'value' => array(''),
                            'compare' => 'NOT IN'
                        )
                    ),
                    //		'tax_query' => array(
                    //			array(
                    //				'taxonomy' => 'course-cat',
                    //				'field'    => 'ID',
                    //				'terms'    => 7515,
                    //				'operator' => 'NOT IN'
                    //			)
                    //		),
                    'order' => 'DESC',
                    'posts_per_page' => 10,
                );
                add_filter('posts_where', 'title_filter', 10, 2);
                $the_query = new WP_Query($args);
                remove_filter('posts_where', 'title_filter', 10);
                if (!empty($categories) && !is_wp_error($categories)) { ?>
        <div class="foy-search-cat-list">
            <?php
                    foreach ($categories as $category) { ?>
                <li class="foy-search-cat">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    <a href="<?php echo home_url() . '/course-cat/' . $category->slug; ?>">
                        <?php
                        $post_title = $category->name;
                        $highlighted_title = preg_replace(
                            '/(' . preg_quote($keyword, '/') . ')/i',
                            '<span class="search-highlight">$1</span>',
                            $post_title
                        );
                        echo $highlighted_title;
                        ?>
                    </a>
                </li>
            <?php
                    } ?>
        </div>
        <hr>
        <?php
                }

                if ($the_query->have_posts()) {
                    while ($the_query->have_posts()):
                        $the_query->the_post();
        ?>
            <li class="foy-course-list">
                <a href="<?php echo esc_url(get_permalink()); ?>">
                    <?php
                        $search_term = get_query_var('search_prod_title');
                        $post_title = get_the_title();
                        $highlighted_title = preg_replace(
                            '/(' . preg_quote($keyword, '/') . ')/i',
                            '<span class="search-highlight">$1</span>',
                            $post_title
                        );
                        echo $highlighted_title;
                    ?>
                </a>
            </li>
            <hr>
    <?php endwhile;
                    wp_reset_postdata();
                } else {
                    echo '<h3>No Results Found</h3>';
                }
                die();
            }
            add_action('wp_ajax_data_fetch', 'data_fetch');
            add_action('wp_ajax_nopriv_data_fetch', 'data_fetch');
