<style>
  .star-rating {
      font-size: 17px;
  }
  .star-bg {
      position: relative;
      color: #ddd;
  }
  .star-fill {
      position: absolute;
      top: 0;
      left: 0;
      overflow: hidden;
      color: #ffc107;
  }
  .star-bg::before {
      content: "★★★★★";
  }
  .star-fill::before {
      content: "★★★★★";
  }
</style>

<div class="star-rating" style="display:inline-block; vertical-align:middle;">
    <div class="star-bg">
        <div class="star-fill" style="width:<?php echo $average_rating * 20; ?>%"></div>
    </div>
</div>
<p><?php echo $average_rating; ?>></p>
