/* SECTIONS */

jQuery(document).ready(function () {
  let imagesSlideIndex = 0;
  let drawingsSlidesIndex = 0;

  function setActiveSection(section, clickedElement) {
    const currentActiveSection = jQuery(
      ".content-sections > div.active",
    ).hasClass("images-section")
      ? "images"
      : jQuery(".content-sections > div.active").hasClass("drawings-section")
        ? "drawings"
        : "info";

    if (currentActiveSection === "images") {
      const $sliderImages = jQuery(".slider-images");

      if ($sliderImages.hasClass("slick-initialized")) {
        const slick = $sliderImages.slick("getSlick");

        imagesSlideIndex = slick.currentSlide;
      }
    } else if (currentActiveSection === "drawings") {
      const $sliderDrawings = jQuery(".slider-drawings");

      if ($sliderDrawings.hasClass("slick-initialized")) {
        const slick = $sliderDrawings.slick("getSlick");

        drawingsSlideIndex = slick.currentSlide;
      }
    }

    jQuery(".sections-navigation .single-section").removeClass("active");
    jQuery(".content-sections > div").removeClass("active");

    clickedElement.addClass("active");
    jQuery(".content-sections ." + section + "-section").addClass("active");

    setTimeout(() => {
      window.requestAnimationFrame(() => {
        if (section === "images") {
          jQuery("body").removeClass("no-scroll");

          const $sliderImages = jQuery(".slider-images");
          const $imagesCounter = jQuery(".images-cursor .cursor-counter");

          if ($sliderImages.hasClass("slick-initialized")) {
            const slick = $sliderImages.slick("getSlick");

            const validImagesSlideIndex =
              imagesSlideIndex >= 0 && imagesSlideIndex < slick.slideCount
                ? imagesSlideIndex
                : 0;

            $sliderImages.slick("slickGoTo", validImagesSlideIndex, true);
            $sliderImages.slick("setPosition");

            const current = slick.slideCount > 1 ? slick.currentSlide + 1 : 1;
            const total = slick.slideCount;

            $imagesCounter.text(`${current}/${total}`);
          }
        } else if (section === "drawings") {
          jQuery("body").removeClass("no-scroll");

          const $sliderDrawings = jQuery(".slider-drawings");
          const $drawingsCounter = jQuery(".drawings-cursor .cursor-counter");

          if ($sliderDrawings.hasClass("slick-initialized")) {
            const slick = $sliderDrawings.slick("getSlick");

            const validDrawingsSlideIndex =
              drawingsSlideIndex >= 0 && drawingsSlideIndex < slick.slideCount
                ? drawingsSlideIndex
                : 0;

            $sliderDrawings.slick("slickGoTo", validDrawingsSlideIndex, true);
            $sliderDrawings.slick("setPosition");

            const current = slick.slideCount > 1 ? slick.currentSlide + 1 : 1;
            const total = slick.slideCount;

            $drawingsCounter.text(`${current}/${total}`);
          }
        } else if (section === "info") {
          jQuery("body").addClass("no-scroll");
        }
      });
    }, 150);
  }

  jQuery(".sections-navigation .single-section").click(function () {
    var sectionClass = jQuery(this).attr("class").split(" ")[1];
    var section = sectionClass.replace("section-", "");

    localStorage.setItem("activeSection", section);

    setActiveSection(section, jQuery(this));
  });

  var savedSection = localStorage.getItem("activeSection");

  if (savedSection) {
    setActiveSection(
      savedSection,
      jQuery(".sections-navigation .single-section.section-" + savedSection),
    );
  } else {
    setActiveSection(
      "images",
      jQuery(".sections-navigation .single-section.section-images"),
    );
  }
});

/* SLIDER */

jQuery(document).ready(function () {
  const $imagesCursor = jQuery(".images-cursor");
  const $drawingsCursor = jQuery(".drawings-cursor");
  const $imagesCounter = $imagesCursor.find(".cursor-counter");
  const $drawingsCounter = $drawingsCursor.find(".cursor-counter");

  // Helper function to configure slider options based on number of slides
  function getSliderOptions($slider, prevArrow, nextArrow, asNavFor) {
    const slideCount = $slider.children().length;
    return {
      dots: false,
      infinite: slideCount > 1, // only infinite if more than 1 slide
      speed: 0,
      fade: true,
      cssEase: "linear",
      prevArrow: prevArrow,
      nextArrow: nextArrow,
      asNavFor: asNavFor,
      arrows: slideCount > 1, // disable arrows if only 1 slide
    };
  }

  // Initialize Slick sliders with dynamic options
  const $sliderImages = jQuery(".slider-images").slick(
    getSliderOptions(
      jQuery(".slider-images"),
      jQuery(".prev-images-button"),
      jQuery(".next-images-button"),
      jQuery(".slider-drawings"),
    ),
  );

  const $sliderDrawings = jQuery(".slider-drawings").slick(
    getSliderOptions(
      jQuery(".slider-drawings"),
      jQuery(".prev-drawings-button"),
      jQuery(".next-drawings-button"),
      jQuery(".slider-images"),
    ),
  );

  // Function to update counter (adjust for 1 slide)
  function updateCounter($slider, $counter) {
    const slick = $slider.slick("getSlick");
    if (!slick) return;
    const current =
      slick.slideCount > 1 ? $slider.slick("slickCurrentSlide") + 1 : 1;
    const total = slick.slideCount;
    $counter.text(`${current}/${total}`);
  }

  // On init and after change for both sliders
  $sliderImages.on("init reInit afterChange", function () {
    updateCounter($sliderImages, $imagesCounter);
  });

  $sliderDrawings.on("init reInit afterChange", function () {
    updateCounter($sliderDrawings, $drawingsCounter);
  });

  // Trigger initial counter display
  $sliderImages.trigger("init");
  $sliderDrawings.trigger("init");

  // Track mousemove for cursor following
  jQuery(document).on("mousemove", function (e) {
    const x = e.clientX;
    const y = e.clientY;
    $imagesCursor.css({ transform: `translate3d(${x}px, ${y}px, 0)` });
    $drawingsCursor.css({ transform: `translate3d(${x}px, ${y}px, 0)` });
  });

  // Show/hide cursor on hover
  jQuery(".prev-images-button, .next-images-button")
    .on("mouseenter", function () {
      $imagesCursor.show();
    })
    .on("mouseleave", function () {
      $imagesCursor.hide();
    });

  jQuery(".prev-drawings-button, .next-drawings-button")
    .on("mouseenter", function () {
      $drawingsCursor.show();
    })
    .on("mouseleave", function () {
      $drawingsCursor.hide();
    });

  // Enable arrow key navigation
  jQuery(document).on("keydown", function (e) {
    const activeSection = localStorage.getItem("activeSection") || "images";
    const $slider =
      activeSection === "images"
        ? jQuery(".slider-images")
        : jQuery(".slider-drawings");

    if (!$slider.hasClass("slick-initialized")) return;

    if (e.key === "ArrowRight") {
      $slider.slick("slickNext");
    } else if (e.key === "ArrowLeft") {
      $slider.slick("slickPrev");
    }
  });

  // === Mobile-specific tap interaction ===
  function bindTapNavigation($slider) {
    $slider.on("click", function (e) {
      const isMobile = window.matchMedia("(max-width: 768px)").matches;
      if (!isMobile) return;

      const offset = $slider.offset();
      const width = $slider.outerWidth();
      const x = e.pageX - offset.left;

      if (x < width / 2) {
        $slider.slick("slickPrev");
      } else {
        $slider.slick("slickNext");
      }
    });
  }

  bindTapNavigation(jQuery(".slider-images"));
  bindTapNavigation(jQuery(".slider-drawings"));
});

/* FILTERS */

jQuery(document).ready(function ($) {
  $(".filters-container").each(function () {
    const $container = $(this);

    // Add message after container
    const $message = $(
      '<p class="no-projects-message" style="display: none;">No matching projects found.</p>',
    );
    $container.after($message);

    // Get the parent section (e.g., '.images-section', '.drawings-section', etc.)
    const $sectionWrapper = $container.closest(".content-sections > div");

    const mixer = mixitup(this, {
      controls: {
        toggleDefault: "all",
        toggleLogic: "or",
        scope: "global",
      },
      selectors: {
        control: "[data-mixitup-control]",
      },
      animation: {
        enable: false,
      },
    });

    mixer.on("mixEnd", function (state) {
      const isActiveSection = $sectionWrapper.hasClass("active");
      const nothingToShow = state.totalShow === 0;

      if (isActiveSection && nothingToShow) {
        $message.show();
      } else {
        $message.hide();
      }
    });
  });
});

jQuery(".filters-button").click(function () {
  jQuery(this).toggleClass("active");
  jQuery(".filters-list").toggleClass("visible");
});

jQuery(".filters-list .close-button").click(function () {
  jQuery(".filters-button").removeClass("active");
  jQuery(".filters-list").removeClass("visible");
});

/* LIGHTBOX */

(function ($) {
  Fancybox.bind("[data-fancybox]", {
    Carousel: {
      infinite: false,
      Navigation: {
        nextTpl: "Next",
        prevTpl: "Prev",
      },
    },
    Slideshow: {
      playOnStart: false,
    },
    Toolbar: {
      animated: false,
      items: {
        prev: {
          tpl: '<button class="f-button" title="{{PREV}}" data-fancybox-prev>Prev</button>',
        },
        next: {
          tpl: '<button class="f-button" title="{{NEXT}}" data-fancybox-next>Next</button>',
        },
        close: {
          tpl: '<button data-fancybox-close class="f-button" title="{{CLOSE}}">Close</button>',
        },
      },
      display: {
        left: ["infobar"],
        middle: [],
        right: ["close"],
      },
    },
    Images: {
      zoom: false,
      Panzoom: {
        zoom: false,
      },
    },
  });
})(jQuery);

/* LAZY LOADER */

var lazyLoadInstance = new LazyLoad({
  elements_selector: ".lazy",
});

/* CONTENT HEIGHT CALCULATION */

function contentfooter() {
  var header = jQuery(".site-header").outerHeight();
  var footer = jQuery(".site-footer").outerHeight();
  console.log(header);
  console.log(footer);
  jQuery("#content.site-content").css(
    "min-height",
    "calc(100vh - " + header + "px - " + footer + "px)",
  );
}

jQuery(document).ready(function () {
  contentfooter();
});

jQuery(window).resize(function () {
  contentfooter();
});

/* PROJECTS TABLE */

jQuery(document).ready(function ($) {
  let sortDirection = {};

  $(".info-section .projects-header p, .mobile-filters .sort-project").on(
    "click",
    function () {
      const $this = $(this);
      const sortKey = $this.data("sort");
      const $projects = $(".info-section .projects-list .single-project");

      // Toggle sort direction
      if (!sortDirection[sortKey]) {
        sortDirection[sortKey] = "asc";
      } else {
        sortDirection[sortKey] =
          sortDirection[sortKey] === "asc" ? "desc" : "asc";
      }

      // Sort projects
      const sortedProjects = $projects.sort(function (a, b) {
        const aValue = $(a)
          .find("." + sortKey)
          .text()
          .trim()
          .toLowerCase();
        const bValue = $(b)
          .find("." + sortKey)
          .text()
          .trim()
          .toLowerCase();

        if (aValue < bValue) return sortDirection[sortKey] === "asc" ? -1 : 1;
        if (aValue > bValue) return sortDirection[sortKey] === "asc" ? 1 : -1;
        return 0;
      });

      // Replace the list with sorted items
      $(".info-section .projects-list").html(sortedProjects);

      // Toggle 'active' class
      if ($this.hasClass("active")) {
        $this.removeClass("active");
      } else {
        $(".info-section .projects-header p").removeClass("active");
        $this.addClass("active");
      }
    },
  );
});

/* PROJECTS TEXT HOVERS */
jQuery(document).ready(function () {
  jQuery(".info-section").on("mouseenter", ".single-project", function () {
    var thumbnail = jQuery(this).data("thumbnail");
    jQuery(".single-project-thumbnail#" + thumbnail).addClass("visible");
  });

  jQuery(".info-section").on("mouseleave", ".single-project", function () {
    jQuery(".single-project-thumbnail").removeClass("visible");
  });
});

/* NEWS & PRESS THUMBNAIL LOGIC */
jQuery(document).ready(function () {
  let newsScrollTimer = null;
  let pressScrollTimer = null;

  function clearInteractions() {
    // Remove hover events
    jQuery(".single-news, .single-press").off("mouseenter mouseleave");

    // Remove scroll listeners and clear debounce timers
    jQuery(".news-list").off("scroll");
    clearTimeout(newsScrollTimer);
    newsScrollTimer = null;

    jQuery(".press-list").off("scroll");
    clearTimeout(pressScrollTimer);
    pressScrollTimer = null;
  }

  function useDebouncedScroll(container, handler, delay = 100) {
    let timer = null;
    container.on("scroll", function () {
      clearTimeout(timer);
      timer = setTimeout(handler, delay);
    });
    handler(); // Trigger once initially
  }

  function getSnappedItem($items, $container) {
    let best = null;
    let minDist = Infinity;
    const containerCenter =
      $container[0].getBoundingClientRect().top + $container.height() / 2;

    $items.each(function () {
      const rect = this.getBoundingClientRect();
      const itemCenter = rect.top + rect.height / 2;
      const distance = Math.abs(containerCenter - itemCenter);
      if (distance < minDist) {
        minDist = distance;
        best = jQuery(this);
      }
    });

    return best;
  }

  function initializeInteractions() {
    clearInteractions();

    if (window.innerWidth > 768) {
      // Desktop hover interaction for news
      jQuery(".single-news")
        .on("mouseenter", function () {
          const thumbnail = jQuery(this).data("thumbnail");
          jQuery(".single-news-thumbnail").removeClass("visible");
          jQuery(".single-news-thumbnail#" + thumbnail).addClass("visible");
        })
        .on("mouseleave", function () {
          jQuery(".single-news-thumbnail").removeClass("visible");
        });

      // Desktop hover interaction for press
      jQuery(".single-press")
        .on("mouseenter", function () {
          const thumbnail = jQuery(this).data("thumbnail");
          jQuery(".single-press-thumbnail").removeClass("visible");
          jQuery(".single-press-thumbnail#" + thumbnail).addClass("visible");
        })
        .on("mouseleave", function () {
          jQuery(".single-press-thumbnail").removeClass("visible");
        });
    } else {
      // Mobile scroll interaction (only one thumbnail per snap)

      const $newsContainer = jQuery(".news-list");
      if ($newsContainer.length) {
        useDebouncedScroll(
          $newsContainer,
          () => {
            const closest = getSnappedItem(
              jQuery(".single-news"),
              $newsContainer,
            );
            if (closest && closest.length) {
              const thumbnail = closest.data("thumbnail");
              jQuery(".single-news-thumbnail").removeClass("visible");
              jQuery(`#${thumbnail}`).addClass("visible");
            }
          },
          100,
        );
      }

      const $pressContainer = jQuery(".press-list");
      if ($pressContainer.length) {
        useDebouncedScroll(
          $pressContainer,
          () => {
            const closest = getSnappedItem(
              jQuery(".single-press"),
              $pressContainer,
            );
            if (closest && closest.length) {
              const thumbnail = closest.data("thumbnail");
              jQuery(".single-press-thumbnail").removeClass("visible");
              jQuery(`#${thumbnail}`).addClass("visible");
            }
          },
          100,
        );
      }
    }
  }

  // Initialize on load
  initializeInteractions();

  // Re-initialize on window resize (debounced)
  let resizeTimeout;
  jQuery(window).on("resize", function () {
    clearTimeout(resizeTimeout);
    resizeTimeout = setTimeout(() => {
      initializeInteractions();
    }, 200);
  });
});

/* LOADER */

jQuery(document).ready(function () {
  setTimeout(function () {
    jQuery(".loader").addClass("hidden");
  }, 1000);
});

document.addEventListener("DOMContentLoaded", function () {
  document.cookie =
    "visited_homepage=true; path=/; max-age=" + 60 * 60 * 24 * 365; // 1 year
});

/* MENU MOBILE */

jQuery(".navbar-toggler").click(function () {
  jQuery("body").toggleClass("navigation-opened");
});

/* CREDITS */

function bindCreditsInteraction() {
  var isMobile = window.innerWidth < 992;

  // First, unbind any existing handlers
  jQuery(".credits").off("mouseenter mouseleave click");

  if (isMobile) {
    // Mobile: Toggle on click
    jQuery(".credits").on("click", function () {
      jQuery(".credits-container").toggleClass("visible");
    });
  } else {
    // Desktop: Show on hover
    jQuery(".credits").hover(
      function () {
        jQuery(".credits-container").addClass("visible");
      },
      function () {
        jQuery(".credits-container").removeClass("visible");
      },
    );
  }
}

jQuery(document).ready(function () {
  bindCreditsInteraction();

  // Rebind on window resize
  jQuery(window).on("resize", function () {
    clearTimeout(window.resizedFinished);
    window.resizedFinished = setTimeout(function () {
      bindCreditsInteraction();
    }, 250); // debounce to avoid jitter
  });
});

/* MOBILE BACK BUTTON */

jQuery(document).ready(function () {
  jQuery(".single-projects .navbar-toggler").on("click", function (e) {
    e.preventDefault(); // Optional: prevent default behavior if it's a link or button
    window.history.back();
  });
});

/* SCROLL SNAP */

jQuery(document).ready(function () {
  if (window.innerWidth < 1000) {
    const $container = jQuery(".items-list");
    const $items = jQuery(".single-item");

    function updateActiveSnap() {
      const containerTop = $container.offset().top;

      $items.each(function () {
        const $el = jQuery(this);
        const elTop = $el.offset().top;

        // If the element’s top aligns with container’s top (with a 1px threshold)
        if (Math.abs(elTop - containerTop) <= 1) {
          $el.addClass("active");
        } else {
          $el.removeClass("active");
        }
      });
    }

    // Debounced scroll
    $container.on("scroll", function () {
      clearTimeout($.data(this, "scrollTimer"));
      $.data(this, "scrollTimer", setTimeout(updateActiveSnap, 50));
    });

    // Force scroll to top and trigger detection
    $container.scrollTop(0);
    setTimeout(updateActiveSnap, 50); // allow layout/rendering to complete
  }
});

/* HOVERS HOMEPAGE */

jQuery(document).ready(function () {
  function setOpacity($project, opacity) {
    $project
      .find(".single-featured-project-visual img")
      .css("opacity", opacity);
    $project.find(".single-featured-project-visual p").css("opacity", opacity);
    $project.find(".single-featured-project-info p").css("opacity", opacity);
  }

  jQuery(
    ".single-featured-project-visual img, .single-featured-project-visual p, .single-featured-project-info p",
  ).hover(
    function () {
      const $project = jQuery(this).closest(".single-featured-project");
      setOpacity($project, 0.5);
    },
    function () {
      const $project = jQuery(this).closest(".single-featured-project");
      setOpacity($project, 1);
    },
  );
});
