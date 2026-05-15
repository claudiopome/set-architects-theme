<?php /* Template Name: Design System */ ?>
<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nemesis
 */

get_header();
?>

	<div class="section-container"> 

    <h1>Layout</h1>

    <div class="row">
        <div class="col-sm-4 col-12">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris pellentesque accumsan lorem at dapibus. Vivamus vestibulum aliquet dui, vitae commodo nibh molestie ac. Pellentesque dignissim ullamcorper nibh, sit amet viverra metus sagittis quis. Nunc eget magna placerat, tincidunt neque in, pellentesque lacus.</p>
        </div>
        <div class="col-sm-4 col-12">
          <p>Mauris turpis tellus, tempus ut felis sit amet, mattis dictum nunc. Praesent vitae vulputate nisl. Aliquam feugiat nibh ac mauris pulvinar, ut facilisis velit mollis. Maecenas non augue faucibus, rutrum massa sit amet, aliquet eros. Ut ut enim elementum, euismod ex sed, auctor ex. Sed non enim nec eros gravida mollis et eu libero. Vivamus mattis mi at mollis tristique. Donec quis aliquet justo, sit amet porttitor ligula.</p>
        </div>
        <div class="col-sm-4 col-12">
          <p>Morbi id sapien id dolor interdum sodales. Suspendisse elit ex, egestas ut ultricies et, iaculis at nisi. Quisque consectetur quam id dui luctus, vestibulum lobortis ante mollis. Nulla placerat quam neque, sed volutpat leo porta sit amet. Mauris semper imperdiet congue. Maecenas facilisis mi non est ornare sodales. Nullam quam ex, tincidunt vitae lacus at, eleifend ultricies risus.</p>
        </div>
    </div>

    <hr>

    <h1>H1 heading</h1>
    <h2>H2 heading</h2>
    <h3>H3 heading</h3>
    <h4>H4 heading</h4>
    <h5>H5 heading</h5>
    <h6>H6 heading</h6>

    <hr>

    <h1>List</h1>

    <div class="row">
        <div class="col-sm-6 col-12">

          <p>Unordered list</p>

          <ul>
            <li>Lorem ipsum dolor sit amet</li>
            <li>Consectetur adipiscing elit</li>
            <li>Integer molestie lorem at massa</li>
            <li>Facilisis in pretium nisl aliquet</li>
            <li>Nulla volutpat aliquam velit
              <ul>
                <li>Phasellus iaculis neque</li>
                <li>Purus sodales ultricies</li>
                <li>Vestibulum laoreet porttitor sem</li>
                <li>Ac tristique libero volutpat at</li>
              </ul>
            </li>
            <li>Faucibus porta lacus fringilla vel</li>
            <li>Aenean sit amet erat nunc</li>
            <li>Eget porttitor lorem</li>
          </ul>
          
        </div>
        <div class="col-sm-6 col-12">

          <p>Ordered list</p>

          <ol>
            <li>Lorem ipsum dolor sit amet</li>
            <li>Consectetur adipiscing elit</li>
            <li>Integer molestie lorem at massa</li>
            <li>Facilisis in pretium nisl aliquet</li>
            <li>Nulla volutpat aliquam velit
              <ol>
                <li>Phasellus iaculis neque</li>
                <li>Purus sodales ultricies</li>
                <li>Vestibulum laoreet porttitor sem</li>
                <li>Ac tristique libero volutpat at</li>
              </ol>
            </li>
            <li>Faucibus porta lacus fringilla vel</li>
            <li>Aenean sit amet erat nunc</li>
            <li>Eget porttitor lorem</li>
          </ol>
          
        </div>
    </div>

    <hr>

    <h1>Table</h1>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">First</th>
          <th scope="col">Last</th>
          <th scope="col">Handle</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Jacob</td>
          <td>Thornton</td>
          <td>@fat</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Larry</td>
          <td>the Bird</td>
          <td>@twitter</td>
        </tr>
      </tbody>
    </table>

    <hr>

    <h1>Icons</h1>

    <div class="row">
      <div class="col-md-3 col-sm-3 col-3" style="margin-bottom: 15px;">
        <img class="icon" src="<?php echo get_site_url(); ?>/wp-content/themes/nemesis/assets/build/img/arrow-top.svg">
      </div>
      <div class="col-md-3 col-sm-3 col-3" style="margin-bottom: 15px;">
        <img class="icon" src="<?php echo get_site_url(); ?>/wp-content/themes/nemesis/assets/build/img/arrow-right.svg">
      </div>
      <div class="col-md-3 col-sm-3 col-3" style="margin-bottom: 15px;">
        <img class="icon" src="<?php echo get_site_url(); ?>/wp-content/themes/nemesis/assets/build/img/arrow-bottom.svg">
      </div>
      <div class="col-md-3 col-sm-3 col-3" style="margin-bottom: 15px;">
        <img class="icon" src="<?php echo get_site_url(); ?>/wp-content/themes/nemesis/assets/build/img/arrow-left.svg">
      </div>
      <div class="col-md-3 col-sm-3 col-3" style="margin-bottom: 15px;">
        <img class="icon" src="<?php echo get_site_url(); ?>/wp-content/themes/nemesis/assets/build/img/arrow-top-right.svg">
      </div>
      <div class="col-md-3 col-sm-3 col-3" style="margin-bottom: 15px;">
        <img class="icon" src="<?php echo get_site_url(); ?>/wp-content/themes/nemesis/assets/build/img/arrow-top-left.svg">
      </div>
      <div class="col-md-3 col-sm-3 col-3" style="margin-bottom: 15px;">
        <img class="icon" src="<?php echo get_site_url(); ?>/wp-content/themes/nemesis/assets/build/img/arrow-bottom-left.svg">
      </div>
      <div class="col-md-3 col-sm-3 col-3" style="margin-bottom: 15px;">
        <img class="icon" src="<?php echo get_site_url(); ?>/wp-content/themes/nemesis/assets/build/img/arrow-bottom-right.svg">
      </div>
      <div class="col-md-3 col-sm-3 col-3" style="margin-bottom: 15px;">
        <img class="icon" src="<?php echo get_site_url(); ?>/wp-content/themes/nemesis/assets/build/img/close.svg">
      </div>
    </div>
    
    <hr>

    <h1>Collapse</h1>

    <div class="section-collapse">
      <a class="button collapse-button" data-toggle="collapse" href="#collapse-1" role="button" aria-expanded="false" aria-controls="collapse-1">
          Collapse
      </a>
      <div class="collapse-container">
        <div class="collapse" id="collapse-1">
            <p>Mauris turpis tellus, tempus ut felis sit amet, mattis dictum nunc. Praesent vitae vulputate nisl. Aliquam feugiat nibh ac mauris pulvinar, ut facilisis velit mollis. Maecenas non augue faucibus, rutrum massa sit amet, aliquet eros. Ut ut enim elementum, euismod ex sed, auctor ex. Sed non enim nec eros gravida mollis et eu libero. Vivamus mattis mi at mollis tristique. Donec quis aliquet justo, sit amet porttitor ligula. Mauris turpis tellus, tempus ut felis sit amet, mattis dictum nunc. Praesent vitae vulputate nisl. Aliquam feugiat nibh ac mauris pulvinar, ut facilisis velit mollis. Maecenas non augue faucibus, rutrum massa sit amet, aliquet eros. Ut ut enim elementum, euismod ex sed, auctor ex. Sed non enim nec eros gravida mollis et eu libero. Vivamus mattis mi at mollis tristique. Donec quis aliquet justo, sit amet porttitor ligula.</p>
        </div>
      </div>
    </div>

    <hr>

    <h1>Form</h1>

    <!-- Bootstrap 
    <form>
      <div class="form-group">
        <label for="email-field">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="email" placeholder="Enter email">
        <small id="email" class="form-text">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect1">Example select</label>
        <select class="form-control" id="exampleFormControlSelect1">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Example textarea</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
      <div class="form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
      </div>
      <button type="submit" class="submit-button">Submit</button>
    </form> -->

    <!-- Contact Form 7 -->
    <?php echo do_shortcode('[contact-form-7 id="17" title="Design system form"]'); ?>

    <hr>

    <h1>Button</h1>

    <button class="cta">Button</button>

    <hr>

    <h1>Tabs</h1>

    <div class="section-tabs">
      <ul class="nav nav-pills" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Tab 1</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Tab 2</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Tab 3</a>
        </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris pellentesque accumsan lorem at dapibus. Vivamus vestibulum aliquet dui, vitae commodo nibh molestie ac. Pellentesque dignissim ullamcorper nibh, sit amet viverra metus sagittis quis. Nunc eget magna placerat, tincidunt neque in, pellentesque lacus.</div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">Mauris turpis tellus, tempus ut felis sit amet, mattis dictum nunc. Praesent vitae vulputate nisl. Aliquam feugiat nibh ac mauris pulvinar, ut facilisis velit mollis. Maecenas non augue faucibus, rutrum massa sit amet, aliquet eros. Ut ut enim elementum, euismod ex sed, auctor ex. Sed non enim nec eros gravida mollis et eu libero. Vivamus mattis mi at mollis tristique. Donec quis aliquet justo, sit amet porttitor ligula.</div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">Morbi id sapien id dolor interdum sodales. Suspendisse elit ex, egestas ut ultricies et, iaculis at nisi. Quisque consectetur quam id dui luctus, vestibulum lobortis ante mollis. Nulla placerat quam neque, sed volutpat leo porta sit amet. Mauris semper imperdiet congue. Maecenas facilisis mi non est ornare sodales. Nullam quam ex, tincidunt vitae lacus at, eleifend ultricies risus.</div>
      </div>
    </div>

    <hr>

    <h1>Modal</h1>

    <button type="button" class="modal-button" data-toggle="modal" data-target="#modal-1">
      Modal
    </button>

    <div class="modal fade" id="modal-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <p class="modal-title">Modal title</p>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              Close modal
            </button>
          </div>
          <div class="modal-body">
            <p>Mauris turpis tellus, tempus ut felis sit amet, mattis dictum nunc. Praesent vitae vulputate nisl. Aliquam feugiat nibh ac mauris pulvinar, ut facilisis velit mollis. Maecenas non augue faucibus, rutrum massa sit amet, aliquet eros. Ut ut enim elementum, euismod ex sed, auctor ex. Sed non enim nec eros gravida mollis et eu libero. Vivamus mattis mi at mollis tristique. Donec quis aliquet justo, sit amet porttitor ligula. Mauris turpis tellus, tempus ut felis sit amet, mattis dictum nunc. Praesent vitae vulputate nisl. Aliquam feugiat nibh ac mauris pulvinar, ut facilisis velit mollis. Maecenas non augue faucibus, rutrum massa sit amet, aliquet eros. Ut ut enim elementum, euismod ex sed, auctor ex. Sed non enim nec eros gravida mollis et eu libero. Vivamus mattis mi at mollis tristique. Donec quis aliquet justo, sit amet porttitor ligula.</p>
          </div>
        </div>
      </div>
    </div>

    <hr>

    <h1>Slider</h1>

    <div class="slider-container">
      <div class="prev-button">
        <img src="<?php echo get_site_url(); ?>/wp-content/themes/nemesis/assets/build/img/arrow-left.svg">
      </div>
      <div class="slider">
        <div class="single-slide">
          <img src="https://via.placeholder.com/600x450">
        </div>
        <div class="single-slide">
          <img src="https://via.placeholder.com/500x450">
        </div>
        <div class="single-slide">
          <img src="https://via.placeholder.com/450x600">
        </div>
      </div>
      <div class="next-button">
        <img src="<?php echo get_site_url(); ?>/wp-content/themes/nemesis/assets/build/img/arrow-right.svg">
      </div>
    </div>

    <hr>

    <h1>Lightbox</h1>

    <div class="row">
      <div class="col-sm-4 col-12">
        <a href="https://via.placeholder.com/600x450" class="lightbox-image" data-fancybox="images" data-caption="Image caption 1">
          <img src="https://via.placeholder.com/600x450" alt="image" />
        </a>
      </div>
      <div class="col-sm-4 col-12">
        <a href="https://via.placeholder.com/450x600" class="lightbox-image" data-fancybox="images" data-caption="Image caption 2">
          <img src="https://via.placeholder.com/450x600" alt="image" />
        </a>
      </div>
      <div class="col-sm-4 col-12">
        <a href="https://via.placeholder.com/500x450" class="lightbox-image" data-fancybox="images" data-caption="Image caption 3">
          <img src="https://via.placeholder.com/500x450" alt="image" />
        </a>
      </div>
    </div>

    <hr>

    <h1>Filtri</h1>

    <div class="filters-buttons">

        <button type="button" class="control" data-mixitup-control="" data-filter="all">All</button>
        <button type="button" class="control" data-mixitup-control data-toggle=".cat-1">Cat 1</button>
        <button type="button" class="control" data-mixitup-control data-toggle=".cat-2">Cat 2</button>
        <button type="button" class="control" data-mixitup-control data-toggle=".cat-3">Cat 3</button>

    </div>

    <div class="filters-container row">

      <div class="col-md-2 col-sm-4 mix cat-1">
        <a href="#">
          <div class="filter-item">
            <img src="https://via.placeholder.com/200x200" alt="image" />
            <p>Cat 1</p>
          </div>
        </a>
      </div>

      <div class="col-md-2 col-sm-4 mix cat-2">
        <a href="#">
          <div class="filter-item">
            <img src="https://via.placeholder.com/200x200" alt="image" />
            <p>Cat 2</p>
          </div>
        </a>
      </div>

      <div class="col-md-2 col-sm-4 mix cat-2">
        <a href="#">
          <div class="filter-item">
            <img src="https://via.placeholder.com/200x200" alt="image" />
            <p>Cat 2</p>
          </div>
        </a>
      </div>

      <div class="col-md-2 col-sm-4 mix cat-3">
        <a href="#">
          <div class="filter-item">
            <img src="https://via.placeholder.com/200x200" alt="image" />
            <p>Cat 3</p>
          </div>
        </a>
      </div>

      <div class="col-md-2 col-sm-4 mix cat-1">
        <a href="#">
          <div class="filter-item">
            <img src="https://via.placeholder.com/200x200" alt="image" />
            <p>Cat 1</p>
          </div>
        </a>
      </div>

      <div class="col-md-2 col-sm-4 mix cat-3">
        <a href="#">
          <div class="filter-item">
            <img src="https://via.placeholder.com/200x200" alt="image" />
            <p>Cat 3</p>
          </div>
        </a>
      </div>

      <div class="col-md-2 col-sm-4 mix cat-1">
        <a href="#">
          <div class="filter-item">
            <img src="https://via.placeholder.com/200x200" alt="image" />
            <p>Cat 1</p>
          </div>
        </a>
      </div>

      <div class="col-md-2 col-sm-4 mix cat-2">
        <a href="#">
          <div class="filter-item">
            <img src="https://via.placeholder.com/200x200" alt="image" />
            <p>Cat 2</p>
          </div>
        </a>
      </div>

      <div class="col-md-2 col-sm-4 mix cat-3">
        <a href="#">
          <div class="filter-item">
            <img src="https://via.placeholder.com/200x200" alt="image" />
            <p>Cat 3</p>
          </div>
        </a>
      </div>

    </div>

    <hr>

    <h1>Audio HTML5</h1>

    <audio controls>
      <source src="<?php echo get_site_url(); ?>/wp-content/themes/nemesis/assets/build/audio/audio.mp3" type="audio/mpeg">
      Your browser does not support the audio element.
    </audio>
 
    <hr>

    <h1>Video HTML5</h1>

    <video controls>
      <source src="<?php echo get_site_url(); ?>/wp-content/themes/nemesis/assets/build/video/video.mp4" type="video/mp4">
      Your browser does not support the video tag.
    </video>

    <hr>

    <h1>Video embed</h1>

    <p>Original</p>
    <div class="embed-responsive embed-responsive-original">
      <iframe src="https://www.youtube.com/embed/m_e7jUfvt-I" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>

    <p>16:9</p>
    <div class="embed-responsive embed-responsive-21by9">
      <iframe width="560" height="315" src="https://www.youtube.com/embed/m_e7jUfvt-I" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>

    <p>4:3</p>
    <div class="embed-responsive embed-responsive-4by3">
      <iframe width="560" height="315" src="https://www.youtube.com/embed/m_e7jUfvt-I" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>

	</div>

<?php
get_footer();
