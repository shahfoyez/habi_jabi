<style>
.coure-dynamic-rating-and-students ul li {
        display: inline-block !important;
        margin-right: 20px !important;
        color: #50617b;
        line-height: 21px;
        font-size: 14px !important;
        font-weight: 400;
        padding: 0 !important;
    }
    .ks-star-rating {
        width: 70px;
    }
    .ks-star-rating .rating__background {
        fill: #bfc3ca;
        stroke: red;
        stroke-width: 1;
        height: 100%;
        width: 100%;
    }
    .ks-star-rating .rating__value {
        fill: #ffb94b;
        height: 100%;
    }
</style>
  <div class="coure-dynamic-rating-and-students">
        <ul>
            <li class="ratings">

                <?php if (!empty($average_rating)) { ?>
                    <div class="ks-star-rating">
                        <svg viewBox="0 0 1000 200" class='rating'>
                            <defs>
                                <polygon id="star" points="100,0 131,66 200,76 150,128 162,200 100,166 38,200 50,128 0,76 69,66 " />
                                <clipPath id="stars">
                                    <use xlink:href="#star" />
                                    <use xlink:href="#star" x="20%" />
                                    <use xlink:href="#star" x="40%" />
                                    <use xlink:href="#star" x="60%" />
                                    <use xlink:href="#star" x="80%" />
                                </clipPath>
                            </defs>
                            <rect class='rating__background' clip-path="url(#stars)"></rect>
                            <!-- Change the width of this rect to change the rating -->
                            <rect width="<?php echo ($average_rating * 20); ?>%" class='rating__value' clip-path="url(#stars)"></rect>
                        </svg>
                    </div>
                <?php } ?>

            </li>
            <li class="students"><img src="<?php echo get_theme_file_uri() ?>/assets/img/students.png" alt="std"> <?php echo  $vibe_students;  ?></li>
        </ul>
    </div>
