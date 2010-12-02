<?php
    include "header.php";
?>

        <div id="content">
          <div class="prev_next">
            <!-- MAKE THESE CSS BACKGROUND -->
            <a class="prev browse left" href="javascript:"><img src="images/previous.png" alt="Previous image" /></a>
          </div>
          <div id="curr_img">
            <ul>
            </ul>
            <p></p>
          </div>
          <div class="scrollable">
            <div class="items">
              <div class="section">
                <img src="images/gfda/main.jpg" alt="Main page" />
              </div>
              <div class="section">
                <img src="images/gfda/two.jpg" alt="Logo" />
              </div>
              <div class="section">
                <img src="images/gfda/three.jpg" alt="The page that allows you to pick specific posts and view them" />
              </div>
              <div class="section">
                <img src="images/gfda/four.jpg" alt="My homemade PHP class that made this all work" />
              </div>
              <div class="section">
                <img src="images/gfda/five.jpg" alt="Index page that shows all posts and bagdes which category the current post is from" />
              </div>
            </div>
          </div>
          <div class="prev_next">
            <!-- MAKE THESE CSS BACKGROUND -->
            <a class="next browse right" href="javascript:"><img src="images/next.png" alt="Next image" /></a>
          </div>
          <div class="description">
            <h4>Good Fucking Dating Advice</h4>
            <p>Totally fun and random project as a part of MarkupIsArt. Built an entire open-source PHP class that talks to the database, pulls random posts and displays them based on category you have chosen.</p>
            <span class="launch"><a href="http://goodfuckingdatingadvice.com">Take a peak!</a></span>
          </div>
          <div class="description">
            <h4>Technology</h4>
            <ul class="tech_left">
              <li>HTML/CSS</li>
              <li>PHP</li>
              <li>MySQL</li>
            </ul>
          </div>
        </div>
      </div>

<?php
    include "footer.php";
?>